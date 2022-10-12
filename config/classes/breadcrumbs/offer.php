<?php
	namespace abilive\Bredcrumbs;

	include __DIR__ . '/generator.php';
	use abilive\Bredcrumbs\generator;

	class offer {
		private $ganerator;
		private $page = '';
		private $infos = [];
		private $parents = [];
		public $value;

		//ページを名前とディレクトリを設定
		public function setPage($name,$url)
		{
			array_push($this->infos,['name'=>$name,"url"=>$url]);
		}

		//親ディレクトリを設定
		public function parent($parent)
		{
			array_push($this->parents,$parent);
		}

		// パンクズを生成する用の各情報を返す
		public function generate() {
			//情報をパースする用のクラスを生成
			$this->ganerator = new generator($this->infos,$this->parents);
			return $this->ganerator->getValue();
		}
	}
?>