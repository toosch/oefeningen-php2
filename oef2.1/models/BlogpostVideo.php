<?php


class BlogpostVideo extends AbstractBlogPost
{
    private $video;

    /**
     * BlogpostVideo constructor.
     * @param $video
     * @param $title
     * @param $text
     * @param $author
     * @param $publicationDate
     */
    public function __construct($video, $title, $text, $author, $publicationDate)
    {
        parent::__construct( $title, $text, $author, $publicationDate);
        $this->video = $video;
    }

    public function getVideo(): string
    {
        return $this->video;
    }

    public function printBlogpost()
    {
        print '<h1>'. $this->getTitle() .'</h1>';
        print '<p>Geschreven door: '. $this->getAuthor() .'</p>';
        print '<p>'. $this->getPublicationDate() .'</p>';
        print '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/'.$this->getVideo().'?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        print '<p>'. $this->getText() .'</p>';
        print '<hr/>';

    }
}