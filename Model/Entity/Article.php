<?php
namespace Model\Entity;

class Article {

    private ?int $id;
    private ?string $content;
    private ?string $title;
    private ?int $author_fk;
    private ?string $date;

    /**
     * Article constructor.
     * @param string|null $content
     * @param int|null $id
     * @param string|null $title
     * @param int|null $author_fk
     * @param string $date
     */
    public function __construct(string $content = null, int $id = null, string $title = null, int $author_fk = null, string  $date = null) {
        $this->id = $id;
        $this->content = $content;
        $this->title = $title;
        $this->author_fk = $author_fk;
        $this->date = $date;
    }

    /**
     * Return the id of Article
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Return the content of Article
     * @return string
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * Set the content of Article
     * @param string $content
     * @return Article
     */
    public function setContent(string $content): Article {
        $this->content = $content;
        return $this;
    }

    /**
     * Return the title of Article
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the title of Article
     * @param string|null $title
     * @return Article
     */
    public function setTitle(?string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAuthorFk(): ?int
    {
        return $this->author_fk;
    }

    /**
     * @param int|null $author_fk
     */
    public function setAuthorFk(?int $author_fk): void
    {
        $this->author_fk = $author_fk;
    }


    /**
     * Return the date of Article
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set the date of Article
     * @param string|null $date
     * @return Article
     */
    public function setDate(?string $date): Article
    {
        $this->date = $date;
        return $this;
    }

}