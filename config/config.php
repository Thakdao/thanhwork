<?php

/*	Constant
--------------------------------------------------------------*/
//ローカル&テスト
if (empty($_SERVER['HTTPS'])) {
	define('LOCATION', 'http://' . $_SERVER['SERVER_NAME'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__) . "/.."))) . '/', false);
} else {
	define('LOCATION', 'https://' . $_SERVER['SERVER_NAME'] . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__) . "/.."))) . '/', false);
}

// 公開の際は絶対パスへ
// if(empty($_SERVER['HTTPS'])){
// 	define('LOCATION','http://www.example.com/', false);
// } else {
// 	define('LOCATION','https://www.example.com/', false);
// }

define('LOCATION_FILE', LOCATION . 'files/', false);

define('LOCATION_ROOT_DIR', realpath(__DIR__ . '/../'), false);
define('LOCATION_FILE_DIR', realpath(__DIR__ . '/../files/'), false);
/* normalPages */
$PageList = array(
	'contact',            #お問い合わせ(contact/index.php)
	'copy',                #コピー1　(copy/index.php)
	'copy__copy',        #コピー2 (copy/copy.php)
	'copy_copy',        #コピー3 (copy/copy/index.php)
	'copy_copy__copy'    #コピー4 (copy/copy/copy.php)
);

definitionLink($PageList, false);

/* Reservations */
define('LOCATION_RSV', '', false);
define('LOCATION_PLAN', '', false);
define('LOCATION_CHANGE', '', false);
define('LOCATION_CANCEL', '', false);
define('LOCATION_LOGIN', '', false);

/* リンク振り分け */
if (!$phone) {
	//pcSite
	define('LOCATION_XXX', '', false);
} else {
	//spSite
	define('LOCATION_XXX', '', false);
}

/* Other */
define('FB_APPID', '', false);
define('LOCATION_TEL', 'tel:00000000000', false);
define('PLACEHOLDER_IMAGE', 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==', false);

?>
