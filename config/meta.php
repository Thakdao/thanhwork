<?php
/*

	meta.php
	メタ情報を管理するファイルです

	$meta['title'] →　title
	$meta['keywords'] →　keywords
	$meta['description'] →　description
	$meta['H1'] →　h1


*/


/*--	Settings
--------------------------------------------------*/

//共通文言
define('TITLE', 'Nguyen Ha Thanh ｜グエンハータン', false);
define('KEYWORDS', 'key,key,key,key,key,key,key,key,key', false);
define('DESCRIPTION', 'デスクリプションが入ります', false);
define('H1', 'ページh1ページh1ページh1', false);


//初期文言
$meta = array(
	'title' => TITLE,
	'keywords' => KEYWORDS,
	'description' => DESCRIPTION,
	'h1' => H1
);


/*--	Main page
--------------------------------------------------*/

#トップページ
if ($page == 'homepage') {
	$meta['title'] = TITLE;
	$meta['keywords'] = KEYWORDS;
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}

#コピー
if ($page == 'copy') {
	$meta['title'] = 'コピー | ' . TITLE;
	$meta['keywords'] = KEYWORDS . ',コピー';
	$meta['description'] = DESCRIPTION;
	$meta['h1'] = H1;
}


/*--    Error page
--------------------------------------------------*/

#error - 403
if ($page == 'misc_403') $meta['title'] = 'Error 403 Forbidden アクセスが制限されています | ' . TITLE;

#error - 404
if ($page == 'misc_404') $meta['title'] = 'Error 404 Page Not Found ページが見つかりません | ' . TITLE;

#error - 500
if ($page == 'misc_500') $meta['title'] = 'Error 500 Internal Server Error サーバーエラーが出ています | ' . TITLE;


?>
