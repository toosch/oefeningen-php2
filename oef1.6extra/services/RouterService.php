<?php


class RouterService
{
    public function GoToNoAccess( $app_root )
    {
        header("Location: " . $app_root . "/no_access.php");
        exit;
    }

    public function GoHome( $app_root )
    {
        header("Location: " . $app_root . "/steden.php");
        exit;
    }

    public function GoToPage( $app_root, $page )
    {
        header("Location: " . $app_root . "/$page");
        exit;
    }
}









