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
    if (isset($_GET['page']))
        $result = $_GET['page'];
    
    return ($result == null || $result === '') ? "home" : $result;
}

?>