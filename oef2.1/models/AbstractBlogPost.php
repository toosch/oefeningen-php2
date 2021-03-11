<?php


class AbstractBlogPost
{
    private $title;
    private $text;
    private $author;
    private $publicationDate;
    /**
     * AbstractBlogPost constructor.
     * @param $title
     * @param $text
     * @param $author
     * @param $publicationDate
     */
    public function __construct($title, $text, $author, $publicationDate)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
        $this->publicationDate = $publicationDate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }


    public function getText(): string
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }


    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getPublicationDate(): int
    {
        return $this->publicationDate;
    }

    public function setPublicationDate($publicationDate): void
    {
        $this->publicationDate = $publicationDate;
    }
}