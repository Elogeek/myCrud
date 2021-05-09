<?php

namespace Controller;

use Model\Entity\Article;
use Model\Manager\ArticleManager;

class ArticleController
{
    public function addNew(array $articleData)
    {
        $article = new Article();

        if(isset($articleData['title']) && isset($articleData['content'])) {
            $article->setAuthorFk(1);
            $article->setTitle($articleData['title']);
            $article->setContent($articleData['content']);
            $manager = new ArticleManager();
            $result = $manager->addArticle($article);
            if($result) {
                require_once './View/add.article.php';
            }
        }
    }
}