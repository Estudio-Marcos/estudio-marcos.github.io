<?php

require_once './_lib/util.php';
require_once './_lib/showFiles.php';
require_once './_lib/json_encode.php';

function handle_get() {
	header('Content-type: application/json');


	if (isset($_GET['menu'])) {
		$json = file_get_contents('conf/menu.json');
		echo $json;
	} else {
		$content = array();
		
		$file = getPageFile();
		$content['content'] = file_get_contents($file);

		$seo = getPageFile("seo");
		if (file_exists($seo))
			$content['seo'] = file_get_contents($seo);

		
		$folder = getFolder();
		$directory = "descargas/".$folder."/";
		$subContent = file_exists($directory);
		
		if ($subContent) {
			session_start();
			$admin = isset($_SESSION['userid']);
			$showFiles = new showFiles($admin);
			$content['subcontent'] = $showFiles->showFolder($directory);
		}
		
		echo json_encode($content);
	}
}

?>