<?php

require_once './_lib/util.php';
require_once './_lib/showFiles.php';
require_once './_lib/json_encode.php';


function handle_post() {
	$file = getPageFile();
	$admin = isset($_SESSION['userid']);

	if (isset($_POST['user'])) {
		if ($_POST['user'] === 'guillermo' && $_POST['pass'] === 'spoti' ||
			$_POST['user'] === 'fer' && $_POST['pass'] === 'popp') {
			$_SESSION['userid'] = $_POST['user'];
			echo "true";
		} else {
			echo "usuario o clave inválidas.";
		}
	} else if ($admin) {
		if (isset($_POST['delete'])) {
			list($archivo, $ext) = getArchivoExtention($_POST['archivo']);
			$file = getcwd().'/descargas/'.getFolder().'/'.$archivo.'.'.$ext;
			$info = getcwd().'/descargas/'.getFolder().'/'.$archivo.".info";
			unlink($info);
			unlink($file);
			if (!file_exists($file))
				echo "true";
			else
				echo "No se pudo borrar el archivo";
		} else if (isset($_POST['data'])) {
			if (get_magic_quotes_gpc())
				$save = stripslashes($_POST['data']) ;
			else
				$save = $_POST['data'];
			file_put_contents($file, $save);
			echo "true";
		} else if (isset($_POST['pagina'])) {
			$archivo = $_POST['archivo'];
			list($archivo, $ext) = getArchivoExtention($archivo);
			$datafile = getcwd().'/descargas/'.getFolder().'/'.$archivo.".info";
			$content = "titulo=".$_POST['titulo']."\nlugar=".$_POST['lugar']."\nfecha=".$_POST['fecha']."\nextension=".$ext;
			file_put_contents($datafile, $content);
			echo "true";
		}
	}
}

function handle_get() {
	header('Content-type: application/json');


	if (isset($_GET['logout'])) {
		session_destroy();
		header("Location: ./");
	} else if (isset($_GET['menu'])) {
		$json = file_get_contents('conf/menu.json');
		echo $json;
	} else if (isset($_GET['backup'])) {
		$file = backup();
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: '. filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
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