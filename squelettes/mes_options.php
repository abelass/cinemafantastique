<?php
$GLOBALS['taille_des_logs'] = 5000;

define('_DIR_PLUGINS_SUPPL',_DIR_RACINE."squelettes/plugins/");
define('_BOUCLE_PROFILER', 3000) ;

// un POST qui n'est ni une action ni un CVT => SPAM BOT
if ($_SERVER['REQUEST_METHOD']=='POST'
	AND !test_espace_prive()
	AND _IS_BOT
	AND !_request('formulaire_action')
	AND !_request('action')) {

	spip_log($_POST,"spam_post");
	$ecran_securite_raison = "illicit POST";
	if (isset($ecran_securite_raison)) {
		header("HTTP/1.0 403 Forbidden");
		header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-Type: text/html");
		die("<html><title>Error 403: Forbidden</title><body><h1>Error 403</h1><p>You are not authorized to view this page ($ecran_securite_raison)</p></body></html>");
	}
}
