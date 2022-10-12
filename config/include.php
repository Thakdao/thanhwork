<?php
	
	//関数の定義やその他設定
	include __DIR__.'/setting.php';

	//パンくず生成
	include __DIR__.'/classes/breadcrumbs/offer.php';
	use abilive\Bredcrumbs;
	$bredcrumb = new abilive\Bredcrumbs\offer();

	//定数の定義 パンくずの設定
	include __DIR__.'/config.php';

	//metaタグに関する設定
	include __DIR__.'/meta.php';

	//headの読み込み
	include __DIR__.'/../templates/head.php';

?>