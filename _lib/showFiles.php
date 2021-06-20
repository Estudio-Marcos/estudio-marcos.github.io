<?php

require_once './_lib/descriptor.php';
require_once './_lib/parser.php';

/**
 * Description of showFiles
 *
 * @author tucky
 */
class showFiles {

	var $admin;
	
    function showFiles($admin) {
		$this->admin = $admin;
    }
    
    function showFolder($directory) {
        $output = "<ul>";
        $archivos = glob($directory . "*.info");
        foreach($archivos as $info) {
            $output .= $this->showFile($info);
        }
        $output .= "</ul>";
        return $output;
    }
    
    function showFile($info) {
		$downloadDesc = new descriptor('conf/download.ini');
        $downloadDesc->cargaArchivo($info);
        $extension = ".".$downloadDesc->getExtension();
        $archivo = str_replace(".info", $extension, $info);
        $archivo = str_replace(" ", "%20", $archivo);
        $downloadDesc->agregarItem("url", $archivo);
		if ($this->admin)
			$downloadDesc->agregarItem("eliminar", "vistas/eliminar.html");
		else
    	    $downloadDesc->agregarItem("eliminar", "");
			
        $downloadParser = new templateParser($downloadDesc->getDownload());
        $downloadParser->parseTemplate($downloadDesc->getTags());
        return $downloadParser->display();
    }
}

?>
