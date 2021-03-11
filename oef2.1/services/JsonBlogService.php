<?php


class JsonBlogService implements BlogServiceInterface
{
    private $filename;

    public function __construct($pathToJson)
    {
        $this->filename = $pathToJson;
    }

    public function CreateBlogposts()
    {
        $jsonContents = file_get_contents($this->filename);
        $decodedJson = json_decode($jsonContents, true);
        foreach ($decodedJson as $post) {
            // TODO: Validate the JSONs
            // if post is (probably) of BlogpostImage type
            if (isset($post["image"]))
            {
                $postToPrint = new BlogpostImage($post["image"], $post["title"], $post["text"], $post["author"], $post["publicationDate"]);
                $postToPrint->printBlogpost();
            }
            // if post is (probably) of BlogpostVideo type
            else if (isset($post["video"]))
            {
                $postToPrint = new BlogpostVideo($post["video"], $post["title"], $post["text"], $post["author"], $post["publicationDate"]);
                $postToPrint->printBlogpost();
            }
        }
    }

    public function CreateBlogpost($id)
    {
        $jsonContents = file_get_contents($this->filename);
        $decodedJson = json_decode($jsonContents, true);
        $post = $decodedJson[$id];
            // TODO: Validate the JSONs
            if (isset($post["image"]))
            {
                $postToPrint = new BlogpostImage($post["image"], $post["title"], $post["text"], $post["author"], $post["publicationDate"]);
                $postToPrint->printBlogpost();
            }
            else if (isset($post["video"]))
            {
                $postToPrint = new BlogpostVideo($post["video"], $post["title"], $post["text"], $post["author"], $post["publicationDate"]);
                $postToPrint->printBlogpost();
            }

    }
}