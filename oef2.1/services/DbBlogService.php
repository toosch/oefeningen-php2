<?php


class DbBlogService implements BlogServiceInterface
{
    private $DbManager;

    public function __construct($DbManager)
    {
        $this->DbManager = $DbManager;
    }

    public function CreateBlogpost($id)
    {
        // TODO: Implement CreateBlogpost() method.
    }

    public function CreateBlogposts()
    {
        $statement = 'SELECT * FROM blogposts';
        $result = $this->DbManager->GetData($statement);
        foreach ($result as $post) {
            if (isset($post["blog_video"])) {
                //blogpost has video
                $postToPrint = new BlogpostVideo($post["blog_video"], $post["blog_title"], $post["blog_text"], $post["blog_author"], $post["blog_publicationDate"]);
                $postToPrint->printBlogpost();

            }
            else if (isset($post["blog_image"])) {
                //blogpost has image
                $postToPrint = new BlogpostImage($post["blog_image"], $post["blog_title"], $post["blog_text"], $post["blog_author"], $post["blog_publicationDate"]);
                $postToPrint->printBlogpost();

            }
        }

    }
}