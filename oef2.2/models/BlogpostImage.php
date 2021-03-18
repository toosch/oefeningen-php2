<?php


class BlogpostImage extends AbstractBlogPost
{
    private $image;

    /**
     * BlogpostVideo constructor.
     * @param $image
     * @param $title
     * @param $text
     * @param $author
     * @param $publicationDate
     */
    public function __construct($image, $title, $text, $author, $publicationDate)
    {
        parent::__construct($title, $text, $author, $publicationDate);
        $this->image = $image;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function printBlogpost()
    {
        print '<h1>'. $this->getTitle() .'</h1>';
        print '<p>Geschreven door: '. $this->getAuthor() .'</p>';
        print '<p>'. $this->getPublicationDate() .'</p>';
        print '<img src="'.$this->getImage().'" class="img-fluid" >';
        print '<p>'. $this->getText() .'</p>';
        print '<hr/>';
    }
}