<?php

use Controller\ArticleController;
use Model\Manager\ArticleManager;
use Model\User\UserManager;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        <form action="index.php?controller=articles&action=new" method="post">
            <input type="text" placeholder="title" name="title">
            <input type="text" placeholder="rédiger un article" name="content">
        <button type="submit"> Envoyer mon article !</button>
        </form>
    </div>
    <script src="api/article.js"></script>
</body>
</html>

<?php

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'articles':
            $controller = new ArticleController();

            switch ($_GET['action']) {
                case 'new' :
                    $controller->addNew($_POST);
                    break;

                case 'read':
                    if (isset($_GET['article'])) {
                        //$manager->readArticle();
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
                        $manager->create("John");
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
else {
    // Créer un home controller qui ne fait que afficher la vue home.
}
//todo request ajax pour récupérer le contenu de l'article (TITLE, CONTENT )
// connect user
// page admin?!
?>
