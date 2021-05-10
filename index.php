<?php

use Controller\ArticleController;
use Model\Manager\ArticleManager;
use Model\User\UserManager;
use Model\Entity\Role;
require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'articles':
            $controller = new ArticleController();

            switch ($_GET['action']) {
                case 'new' :
                    $controller->addNew($_POST);
                    break;

                case 'read':
                    if (isset($_GET['articles'])) {
                       // $controller->readNow();
                    }
                    break;

                case 'update':
                    if (isset($_GET['article'])) {
                        //$manager->updateArticle($_GET['article']);
                    } else {
                        //$manager->updateArticle();
                    }
                    break;

                case 'delete':
                    // $manager->deleteArticle();
                    break;

                default:
                    break;
            }

            break;

        case 'user':
            $manager = new UserManager();

            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'login':
                        $manager->login("");
                        break;

                    case 'create':
                        $manager->create("");
                        break;

                    case 'logout':
                        $manager->logOut();
                        break;

                    default:
                        break;
                }
            }
            break;

       }

    }
else{
    // Créer un home controller qui ne fait que afficher la vue home.
    $controller = new HomeController();
    $controller->index();
}
//if admin ===>page admin
if ($username["Elodie"]->getAdmin($id) === 1) {
    session_start();
    $controller = new AdminController();
    $controller->gotoAdminPage();
}

//todo request ajax pour récupérer le contenu de l'article (TITLE, CONTENT )
// connect user

