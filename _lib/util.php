<?php 
function getArchivoExtention($archivo) {
	$dot = strrpos($archivo, '.');
	$ext = "";
	if($dot !== false)
		return array(substr($archivo, 0, $dot), substr($archivo, $dot+1));
	return array($archivo, '');

}

function getPageFile($extension = "html") {

    $page = getUrl();
    $pages = explode("-", $page);

    if (sizeof($pages) > 1)
        $content = "paginas/".$pages[0]."/".$pages[1].".".$extension;
    else
        $content = "paginas/".$pages[0].".".$extension;

    return $content;
}

function getFolder() {
    $page = getUrl();
    $pages = explode("-", $page);
    return $pages[0];
}

function getUrl() {
    $result = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $_POST['pagina'];
    } else if (isset($_GET['page']))
        $result = $_GET['page'];
    
    return ($result == null || $result === '') ? "home" : $result;
}

function backup() {
	
	// delete old backup file
	unlink('backup.zip');
	
	// increase script timeout value
	ini_set("max_execution_time", 300);
	// create object
	$zip = new ZipArchive();
	// open archive
	if ($zip->open("backup.zip", ZIPARCHIVE::CREATE) !== TRUE) {
		die ("Could not open archive");
	}
	
	// initialize an iterator
	// pass it the directory to be processed
	$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("./"));
	// iterate over the directory
	// add each file found to the archive
	foreach ($iterator as $key=>$value) {
		$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
	}
	// close and save archive
	$zip->close();
	return 'backup.zip';
}

?>