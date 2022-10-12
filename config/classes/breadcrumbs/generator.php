<?php
	namespace abilive\Bredcrumbs;
	/**
	 * 
	 * offer.phpから設定情報を受け取って
	 * パンクズを作るための各情報を返却するクラス
	 * 
	 */
	class generator {
		protected $infos = [];
		protected $parents = [];
		protected $value = [];
		protected $err_flag = false;
		const URL_HOME = '';

		/**
		 * 
		 * コンストラクタ
		 * 
		 */
		public function __construct($infos,$parents){
			$this->infos = $infos;
			$this->parents = $parents;
		}

	/**
		 * 
		 * 設定情報を受け取ってパースする
		 * 
		 */
		public function getValue(){
			//パンくず設定の総数を保存
			$_count = count($this->infos);
			$_count_p = count($this->parents);
			// 現在URLを取得
			$_val_top = 0;
			for ($ti = 0; $ti < $_count; $ti++) {
				if($this->parents[$ti] === null) {
					$_val_top = $ti;
					$this->URL_HOME = $this->infos[$ti]['url'];
				}
			}
			//LOCATIONがスラッシュ指定だった場合
			if(strcmp($this->URL_HOME,'/') === 0) {
				$_host = '';
				if(empty($_SERVER['HTTPS'])){
					$_host = 'http://';
				} else {
					$_host = 'https://';
				}
				$this->infos[$_val_top]['url'] = $_host.$_SERVER['SERVER_NAME'].str_replace($_SERVER['DOCUMENT_ROOT']).'/';
				$this->URL_HOME = $_host.$_SERVER['SERVER_NAME'].str_replace($_SERVER['DOCUMENT_ROOT']).'/';
			}
			$_dirparts = '';
			// アクセス中のホスト以降の情報を保存
			$_path_parts = htmlspecialchars( strip_tags( $_SERVER["REQUEST_URI"] ));
			$_loc2 = str_replace('http://','',$this->URL_HOME);
			$_loc2 = str_replace('https://','',$_loc2);
			$_loc2 = str_replace($_SERVER['SERVER_NAME'],'',$_loc2);
			$_loc2 = rtrim($_loc2, '/');
			if($_loc2) {
				// URIのLOCATION以降の文字を保存
				$_dirparts = str_replace($_loc2.'/','',$_path_parts);
			}else {
				//先頭のスラッシュを削除
				$_dirparts = mb_substr($_path_parts,1);
			}
			//現在のデイレクトリ以下の文字列を保存
			foreach( $this->parents as $key => $value) {
				//TOPページの情報を保存
				if($value == null) {
					$this->push($this->infos[$key]['name'],$this->infos[$key]['url'],null,false);
				}	
			}
			$_depth_arr = [];
			$_result = $_dirparts;
			$_str = '';
			$_c = 0;
			$_dir_p = '';
			//現在の階層を調査して階層を配列に保存する
			while ($_str !== false) {
				$_str = strstr($_result,'/',true);
				$_result0 = str_replace($_str.'/','',$_result);
				if(strpos($_result0,'?')) {
					$_result = strstr($_result0,'?',true); 
				}else {
					$_result = $_result0; 
				}
				$_c1 = 0;
				$_c2 = 0;
				$_str2 = '';
				$_parent_url = '';
				if($_str !== false) {
					//アクセスしたページ２階層なら
					if(strpos($_result,'.php') !== false && strpos($_result,'index.php') === false && strpos($_result,'/') === false && $_c < 1){
						// index.php以外のページだったら = 現在のURLに　.phpがついてるので　index以外は親を振り分ける必要がある
						array_push($_depth_arr,$_str.'/'.$_result);
						foreach($this->parents as &$value) {	
							if(strcmp($this->infos[$_c1]['url'],$_str.'/'.$_result) === 0) {
								//親ページの情報を保存する
								for ($i=0; $i < $_count-1; $i++) {
									$_str2 = $this->infos[$i]['url'];
									if(strpos($_str2,'.php') === false && strcmp($_str2,$this->URL_HOME) !== 0) {
										$_str2 = $this->retSlushStringAddRmove($this->infos[$i]['url'],true);
									}else if(strpos($_str2,'index.php') !== false) {
										$_str2 = strstr($_str2,'/',true);
									}
									if(strpos($value,'index.php') !== false){
										$value = strstr($value,'/',true);
									}
									if(strcmp($value,$_str2) === 0) {
										if($this->parents[$i] !== null){
											//push
											$this->push($this->infos[$i]['name'],$this->infos[$i]['url'],$this->parents[$i],false);
											$_parent_url = $this->parents[$i];
											break;
										}
									}
									$_c2++;
								}
								//自ページの情報を保存する
								$_parent_url_parts = $this->retSlushStringAddRmove($value);
								$_parent_url .= $_parent_url_parts;
								//push
								$this->push($this->infos[$_c1]['name'],$this->infos[$_c2]['url'],$_parent_url,true);
								break;
							}
							$_c1++;
						}
					}else if(strpos($_result,'.php') !== false && strpos($_result,'index.php') === false && strpos($_result,'/') === false) {
						$_result_plus = $this->retSlushStringAddRmove($_str);
						//push
						array_push($_depth_arr,$_str);
						array_push($_depth_arr,$_result_plus.$_result);
					} else {
						//push
						array_push($_depth_arr,$_str);
						// 親ページの指定に .phpが含まれていた場合は別で登録する
						if($_c > 1) {
							for ($l=0; $l < $_count; $l++) {
								if(strpos($this->parents[$l],'.php') !== false) {
									if(strpos($this->parents[$l],'index.php') === false ) {
										$_dir_p = $this->parents[$l];
									}
									if(strcmp($_dir_p,$this->infos[$l]['url']) === 0 && strcmp($_str,$this->infos[$l]['url']) === 0) {
										$_dir_p = '';
										//push
										array_push($_depth_arr,$this->infos[$l]['url']);
										break;
									}
									$_dir_p2 = $this->parents[$l].$this->infos[$l]['url'];
									$_dir_p2 = str_replace($this->URL_HOME,'',$_dir_p2);
									$_dir_p2 = str_replace('index.php','',$_dir_p2);
									$_dir_p2 = str_replace('/','',$_dir_p2);
									$_dir_p3 = str_replace('/','',$this->parents[$l].$_result);
									$_dir_p3 = str_replace($this->URL_HOME,'',$_dir_p3);
									if(strcmp($_dir_p2,$_dir_p3) === 0 && strcmp($_dir_p2,'') !== 0 && strcmp($_dir_p3,'') !== 0) {
										for ($ll=0; $ll < $_count; $ll++) {
											if(strcmp($this->parents[$l],$this->infos[$ll]['url']) === 0) {
												//push
												array_push($_depth_arr,$this->infos[$ll]['url']);
												break;
											}
										}
										break;
									}
								}
							}
						}
					}
				}
				$_c++;
			}
			// var_dump($_depth_arr);
			$this->checkUrlError($_depth_arr);
			//階層数を保存
			$_depth = count($_depth_arr);
			//返却する情報の一時保存用
			$_url_depth = '';
			$_str_parent = '';
			$_str_parent_old = '';
			for ($i=0; $i < $_depth; $i++) {
				//configで設定した項目を調べる
				$_dir = $_depth_arr[$i];
				$_str_dir = '';
				$_str_dir2 = '';
				$_str_dir3 = '';
				$_c1 = 0;
				$_last = false;
				//pushから受け取った情報をパースする	
				foreach($this->infos as &$value) {
					//ページ特定のためページのパスを整える
					if(strpos($value['url'],'index.php') !== false){
						$_str_dir = strstr($value['url'],'/',true);
					}else if(strpos($value['url'],'.php') !== false) {
						$_str_dir3 = $value['url'];
					}else {
						$_str_dir = $this->retSlushStringAddRmove($value['url']	,true);
					}
					//ページ特定のため親ページパスを保存
					if($i > 0) {
						$_str_dir2 = $_depth_arr[$i-1];
					}else {
						$_str_dir2 = $this->URL_HOME;
					}
					//LOCATIONがスラッシュ指定だった場合
					if(strcmp($this->parents[$_c1],'/') === 0) {
						$this->parents[$_c1] = $this->URL_HOME;
					}
					if(strcmp($_dir,$_str_dir) === 0 && strcmp($_str_dir2,$this->parents[$_c1]) === 0 || strcmp($_dir,$_str_dir3) === 0) {
						if(strpos($value['url'],'.php') !== false && strpos($value['url'],'index.php') === false) {
							//index以外のphpが指定されてた且つ2階層以降の場合
							if($_depth > 1) {
								$_str_pp = rtrim($_str_parent, '/');
								$_str_pp = substr($_str_pp, strrpos($_str_pp, '/'));
								$_str_pp = str_replace('/','',$_str_pp);
								$_str_pp2 = strstr($this->parents[$_c1],'/',true);
								$_str_parent .= $this->retSlushStringAddRmove($this->parents[$_c1]);
								if(strcmp($_str_pp2,$_str_pp) === 0) {
									$_str_pp3 = rtrim(str_replace($this->parents[$_c1],'',$_str_parent), '/');
									$_str_pp4 = strstr($this->parents[$_c1],'/',false);
									$_str_parent = $_str_pp3 . $_str_pp4;
									if($_depth - 1 === $i) {
										$_last = true;
									}
									if(strpos($this->parents[$_c1],'.php') !== false && strpos($this->parents[$_c1],'index.php') === false){
										$_str_pp5 = $this->parents[$_c1];
										for ($ii=0; $ii < $_count; $ii++) {
											if(strcmp($this->infos[$ii]['url'],$_str_pp5) === 0) {
												$_cv = count($this->value);
												$this->value[$_cv-1]['name'] = $this->infos[$ii]['name'];
											}
										}
									}
									$this->push($value['name'],$value['url'],$_str_parent,$_last);
								}else if(strcmp($_str_pp,$this->parents[$_c1]) === 0) {
									$_str_pp3 = rtrim(str_replace($this->parents[$_c1],'',$_str_parent), '/').'/';
									$_str_parent = $_str_pp3 . $_str_pp;
									$_cv = count($this->value);
									// 親がダブってる場合は、親要素を自分の情報に上書きする
									$this->value[$_cv-1]['name'] = $value['name'];
									$this->value[$_cv-1]['url'] = $value['url'];
									if($_depth - 1 === $i) {
										$this->value[$_cv-1]['last'] = true;
									}
								} else {
									if($_depth - 1 === $i) {
										$_last = true;
									}
									$this->push($value['name'],$value['url'],$_str_parent,$_last);
								}
							}
							break;
						} else if(strpos($value['url'],'index.php') !== false) {
							//index.phpが指定されてた場合
							$_str_parent = $this->loopPparser($_str_parent,$_c1);
							if($_depth - 1 === $i) {
								$_last = true;
							}
							$this->push($value['name'],$value['url'],$_str_parent,$_last);
							break;
						}else {
							//ディレクトリ が指定されてた場合
							$_str_parent = $this->loopPparser($_str_parent,$_c1);
							if($_depth - 1 === $i) {
								$_last = true;
							}
							$this->push($value['name'],$value['url'],$_str_parent,$_last);
							break;
						}
					}
					$_c1++;
				}
				//親のパスに.phpがあれば取り除く
				$_str_parent = preg_replace('/\/[^\/]*$/', '', $_str_parent) . '/';
				//configで親パスの指定に間違いがあった場合エラーを表示する
				if(strcmp($_str_parent,$_str_parent_old) === 0) {
					$this->throwError('<p style="font-size:1.2em;">親のパス指定がが間違っています。<span style="font-weight:bold;color:red;">config/config.php</span>を確認してください。</p><span style="font-weight:bold;color:red;">'.$_str_parent.'</span>までは正しく指定されています。それ以降のページで正しく<span style="font-weight:bold;color:red;">一つ上の親ページのパス</span>を指定してください。');
				}
				$_str_parent_old = $_str_parent;
			}
			return $this->value;
		}

		/**
		 * 
		 * パース処理ループ部分
		 * 
		 */
		private function loopPparser($_str_parent,$_c1) {
			$_ret_str = '';
			$_str_pp = rtrim($_str_parent, '/');
			$_str_pp = substr($_str_pp, strrpos($_str_pp, '/'));
			$_str_pp = str_replace('/','',$_str_pp);
			$_str_pp2 = strstr($this->parents[$_c1],'/',true);
			$_str_parent .= $this->retSlushStringAddRmove($this->parents[$_c1]);
			if(strcmp($_str_pp2,$_str_pp) === 0) {
				$_str_pp3 = rtrim(str_replace($this->parents[$_c1],'',$_str_parent), '/');
				$_str_pp4 = strstr($this->parents[$_c1],'/',false);
				$_str_parent = $_str_pp3 . $_str_pp4;
			}
			$_ret_str = $_str_parent;
			return $_ret_str;
		}

		/**
		 * 
		 * パースした情報を返却する配列に保存する
		 * 
		 */
		private function push($_name,$_url,$_parent_url,$_last) {
			$_arr = ['name'=>$_name,'url'=>$_url,'parent_url'=>$_parent_url,'last'=>$_last];
			array_push($this->value,$_arr);
		}

		/**
		 * 
		 * 文字列にスラッシュがついていなければつけて返す
		 * 第二引数を true でスラッシュがあれば削除
		 * 
		 */
		private function retSlushStringAddRmove($_str,$_remove = false) {
			$_ret_str = $_str;
			if(strpos($_ret_str,'/') === false && !$_remove) {
				$_ret_str = $_ret_str . '/';
			}else if($_remove) {
				$_ret_str = str_replace('/','',$_ret_str);
			}
			return $_ret_str;
		}

		/**
		 * 
		 * configでのurl入力エラーを監視する
		 * 
		 */
		private function checkUrlError($_arr){
			$_count = count($this->infos);
			$_count_depth = count($_arr);
			$_count_arr_dp = 0;
			$_str_arr = '';
			$_arr_dp = [];
			for ($i=0; $i < $_count_depth; $i++) {
				for ($ii=0; $ii < $_count; $ii++) {
					$_str_url = $this->infos[$ii]['url'];
					if(strpos($_str_url,'index.php') !== false) {
						$_str_url = str_replace('index.php','',$_str_url);
						$_str_url = str_replace('/','',$_str_url);
					}
					if( $_str_url === $_arr[$i]) {
						array_push($_arr_dp,$_arr[$i]);
					}
				}
			}
			$_count_arr_dp = count($_arr_dp);
			if($_count_arr_dp < $_count_depth) {
				$this->err_flag = true;
				for ($l=0; $l < $_count_depth; $l++) {
					if(isset($_arr_dp[$l])) {
						if(strcmp($_arr[$l],$_arr_dp[$l]) !== 0) {
							$_str_arr .= ' ' . $_arr[$l] . ' ';
							break;
						}
					}else {
						$_str_arr .=  ' ' . $_arr[$l] . ' ';
					}
				}
			}else if($_count_arr_dp > $_count_depth) {
				$this->err_flag = true;
				$_str_arr = '';
				for ($k=0; $k < $_count_arr_dp; $k++) {
					if($k === ($_count_arr_dp - 1)) {
						$_str_arr = $_arr_dp[$k];
					}
				}
				if($this->err_flag) {
					$this->throwError('<p style="font-size:1.2em;">重複したディレクトリ名<span style="font-weight:bold;color:red;">'.$_str_arr.'</span>が指定されています。ディレクトリ名を変えるか、共通パンくずの利用をやめ、静的なパンくずを設置するなど仕様を検討してください。</p>');
				}
			}
			if($this->err_flag) {
				$this->throwError('<p style="font-size:1.2em;">URL<span style="font-weight:bold;color:red;">'.$_str_arr.'</span>breadcrumbs.phpで指定されていません。<span style="font-weight:bold;color:red;">templates/breadcrumbs.php</span>を確認してください。</p>');
			}
		}

		/**
		 * 
		 * エラー出力用
		 * 
		 */
		private function throwError($_str) {
			echo $_str;
			throw new \Exception('breadcrumbs.phpの設定エラー');
		}
	}
?>