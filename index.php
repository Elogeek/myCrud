<?php

use Model\Manager\ArticleManager;
use Model\User\UserManager;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';
$_SESSION('admin');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet-back</title>
</head>
<body>
    <div class="container">
        <input type="text" placeholder="rédiger un commentaire">
        <button type="submit"> Envoyer mon com !</button>
    </div>
</body>
</html>

<?php
if(isset($_GET['Manager'])) {
    switch($_GET['Manager']) {
        case 'articles':
            $manager = new ArticleManager();

            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $manager->add();
                        break;

                    case 'read':
                        $manager->getAll();
                        break;

                    case 'update':
                        if(isset($_GET['article'])) {
                            $manager->update($_GET['article']);
                        }
                        else {
                            $manager->update();
                        }
                        break;

                    case 'delete':
                        $manager->delete();
                        break;

                    default:
                        break;
                }
            }
            break;


        case 'user':
            $manager = new UserManager();

            if(isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'login':
                        $manager->login();
                        break;

                    case 'create':
                        $manager->create();
                        break;

                    default:
                        break;
                }
            }
            break;

       }
   }

//todo request ajax pour récupérer le contenu de l'article
?>
