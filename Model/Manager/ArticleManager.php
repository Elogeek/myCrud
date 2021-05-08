<?php

namespace Model\Manager;

use DB;
use Model\Entity\Article;
use PDO;

class ArticleManager {
    /**
     * @var PDO|null
     */
    private ?PDO $db;
    /** ArticleManager constructor*/
    public function __construct() {
        $this->db = DB::getInstance();
    }
    /**
     * Return all article
     */
    public function getAll(): array {
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
    public function get($id): ?Article {
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
    public function add(Article $article): bool {
        $request = DB::getInstance()->prepare("
            INSERT INTO article (content, title, date, author_fk)
                VALUES (:content, :title, :date, :author) 
        ");
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':date', $article->getDate());
        $request->bindValue(':author', $article->getAuthorFk());

        return $request->execute() && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update an article into the database
     * @param Article $article
     * @return bool
     */
    public function update(Article $article): bool {
        $request = DB::getInstance()->prepare("UPDATE article SET content = :content, title = :title, date = :date WHERE id = :id");
        $request->bindValue(':content', $article->getContent());
        $request->bindValue(':title', $article->getTitle());
        $request->bindValue(':date', $article->getDate());
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }

    /**
     * Delete an article into the database
     * @param Article $article
     * @return bool
     */
    public function delete(Article $article): bool {
        $request = DB::getInstance()->prepare("DELETE FROM article WHERE id = :id");
        $request->bindValue(':id', $article->getId());

        return $request->execute();
    }

}