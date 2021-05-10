<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

use Model\Entity\User;
use Model\Manager\ArticleManager;
use Model\User\UserManager;

header('Content-Type: application/json');

$requestType = $_SERVER['REQUEST_METHOD'];
$manager = new ArticleManager();
$data = file_get_contents('php://input');
$data = json_decode($data);

switch($requestType) {

    // Obtention des articles.
    case 'GET':
        $userManager = new UserManager();
        $articles = $manager->getArticle();
        $response = [];
        foreach($articles as $article) {
            $user = $userManager->getUser($article->getAuthorFk());
            if($user->getId()) {
                $response[] = [
                    'id' => $article->getId(),
                    'date' => (new \DateTime($article->getDate()))->format("\L\\e d-m-y à H:i"),
                    'user' => $user->getUsername(),
                    'title'=> $article->getTitle(),
                    'content' => $article->getContent()
                ];
            }
        }
        echo json_encode($response);
        break;

    // Ajout d'un article.
    case 'POST':
        $user = new User();
        $user->setId($_SESSION['id']);
        $user->setUsername($_SESSION['username']);
        $result = $manager->sendArticles($data->article, $user);
        if(!$result) {
            echo json_encode(["error" => "Erreur d'envoi de l'article"]);
        }
        break;

    default:
        break;
}