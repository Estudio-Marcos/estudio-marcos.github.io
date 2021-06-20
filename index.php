<?php

require_once './_lib/admin.php';
require_once './_lib/render.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	handle_post();
} else if (count($_GET) > 0) {
	handle_get();
} else {
	render();
}
?>