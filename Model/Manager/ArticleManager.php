<?php

namespace Model\Manager;

use Model\DB;
use Model\Entity\Article;

class ArticleManager {

    /**
     * Return all article
     */
    public function readArticle(): array {
        $articles = [];
        $request = DB::getInstance()->prepare("SELECT * FROM article");
        $result = $request->execute();
        if($result) {
            $data = $request->fetchAll();
            foreach ($data as $article_data) {
                $articles[] = new Article($article_data['content'], $article_data['id'], $article_data['title'], $article_data['date']);
            }
        }
        return $articles;
    }

    /**
     * Return an Article or null
     * @param $id
     * @return Article
     */
    public function getArticle($id): ?Article {
        $request = DB::getInstance()->prepare("SELECT * FROM article WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        $article = null;

        if($result && $data = $request->fetch()) {
            $article = new Article($data['content'], $data['id'], $data['title'], $data['date']);
        }

        return $article;
    }

    /**
     * Add an article into the database
     * @param Article $article
     * @return bool
     */
    public function addArticle(Article $article): bool {
        // Construction de l'objet article en fonction du formulaire.
        $request = DB::getInstance()->prepare("
            INSERT INTO article (content, title, author_fk)
                VALUES (:content, :title, :author) 
        ");
        echo 'hello';
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':author', $article->getAuthorFk());
        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update an article into the database
     * @param Article $article
     * @return bool
     */
    public function updateArticle(Article $article): bool {
        $request = DB::getInstance()->prepare("UPDATE article SET content = :content, title = :title WHERE id = :id");
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }

    /**
     * Delete an article into the database
     * @param Article $article
     * @return bool
     */
    public function deleteArticle(Article $article): bool {
        $request = DB::getInstance()->prepare("DELETE FROM article WHERE id = :id");
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }

}