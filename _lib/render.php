<?php

require_once './_lib/util.php';
require_once './_lib/descriptor.php';
require_once './_lib/parser.php';
require_once './_lib/showFiles.php';


function renderMenu($admin) {
    $folder = getFolder();
    $menuDesc = new descriptor('conf/menu.ini');
    $menuDesc->agregarItem($folder, "current");
	$menuDesc->agregarItem('logoutLink', $admin ? "vistas/logoutLink.html" : '');
    $menuParser = new templateParser($menuDesc->getMenu());
    $menuParser->parseTemplate($menuDesc->getTags());
	return $menuParser->display();
}

function render() {
	
	$file = getPageFile();
	$admin = isset($_SESSION['userid']);

	$desc = new descriptor('conf/conf.ini');
	$desc->agregarItem("menu", renderMenu($admin));
	
	if ($admin) {
		$desc->agregarItem('loginLink', '');
		$desc->agregarItem('username',$_SESSION['userid']);
	    $desc->agregarItem('dialogoLogin', '');
		$desc->agregarItem('dialogoAgregar', 'vistas/dialogoAgregar.html');
		$desc->agregarItem('dialogoEditar', 'vistas/dialogoEditar.html');
		$desc->agregarItem('editar', 'vistas/editar.html');
		$desc->agregarItem('agregar', 'vistas/agregar.html');
	} else {
		$desc->agregarItem('loginLink', "vistas/loginLink.html");
		$desc->agregarItem('dialogoLogin', 'vistas/dialogoLogin.html');
	    $desc->agregarItem('dialogoEditar', '');
	    $desc->agregarItem('dialogoAgregar', '');
		$desc->agregarItem('editar', '');
		$desc->agregarItem('agregar', '');
	}

	$desc->agregarItem('footer', 'vistas/footer.html');
	$desc->agregarItem('header', 'vistas/header.html');
	$desc->agregarItem('leftPanel', 'vistas/leftPanel.html');
	$desc->agregarItem('analytics', 'vistas/analytics.html');

    $parser = new templateParser($desc->getTemplate());
    $parser->parseTemplate($desc->getTags());

    echo $parser->display();

}

?>