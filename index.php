<?php

use Model\Manager\ArticleManager;
use Model\User\UserManager;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

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
        <input type="text" placeholder="title">
        <input type="text" placeholder="rédiger un article">
        <button type="submit"> Editer mon article !</button>
    </div>
    <script src="api/article.js"></script>
</body>
</html>

<?php

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'articles':
            $manager = new ArticleManager();

            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'new' :
                        $manager->addArticle();
                        break;

                    case 'read':
                        if (isset($_GET['article'])) {
                            $manager->readArticle();
                        }
                        break;

                    case 'update':
                        if (isset($_GET['article'])) {
                            $manager->updateArticle($_GET['article']);
                        } else {
                            $manager->updateArticle();
                        }
                        break;

                    case 'delete':
                        $manager->deleteArticle();
                        break;

                    default:
                        break;
                }
            }

            break;

        case 'user':
            $manager = new UserManager();

            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'login':
                        $manager->login();
                        break;

                    case 'create':
                        $manager->create();
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
    header('location=index.php');
}
//todo request ajax pour récupérer le contenu de l'article (TITLE, CONTENT )
// connect user
// page admin?!
?>
