<?php
require_once 'controller/IngressoController.php';

$controller = new IngressoController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST, $_FILES);
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update($_POST, $_FILES);
        break;
    case 'destroy':
        $controller->destroy($_GET['id']);
        break;
    default:
        $controller->index();
}

