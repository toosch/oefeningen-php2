<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Blog" ,
    $subtitle = "" );
PrintNavbar();



?>

<div class="container">

    <?php
    // left these tests here for debugging purposes...
    //$testBlogpostVideo = new BlogpostVideo("QhaSeJu_mVs", "Natte voeten in Venetië", "Want de dam was kapot :(", "Fons Deschrijver", 1615233110);
    //$testBlogpostVideo->printBlogpost();
    //$testBlogpostImage = new BlogpostImage("http://bolivianing.com/wp-content/uploads/2015/02/carnavaloruro-.taringa.net_.jpg",
    //"Het is carnaval in Oruro", "En dat schijnt een dit feestje te zijn!", "Fons Deschrijver", 1615233952);
    //$testBlogpostImage->printBlogpost();


    $JsonBlogService = $container->getJsonBlogService();
    $JsonBlogService->CreateBlogposts();

    $DbBlogService = $container->getDbBlogService();
    $DbBlogService->CreateBlogposts();
    ?>

</div>

</body>
</html>