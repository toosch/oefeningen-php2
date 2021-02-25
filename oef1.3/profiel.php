<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Profiel", $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php
            //get data
            // oef1.2: Gebruik $_SESSION['user'] object
            //$db_data = GetData( "select * from user where usr_id=" . $_SESSION['user']->getID() );
            $data[0]['usr_id'] = $_SESSION['user']->getId();
            $data[0]['usr_voornaam'] = $_SESSION['user']->getVoornaam();
            $data[0]['usr_naam'] = $_SESSION['user']->getNaam();
            $data[0]['usr_email'] = $_SESSION['user']->getEmail();
            $data[0]['usr_telefoon'] = $_SESSION['user']->getTelefoon();

            //get template
            $output = file_get_contents("templates/profiel.html");

            //add extra elements
            $extra_elements['csrf_token'] = GenerateCSRF( "profiel.php"  );

            //merge
            $output = MergeViewWithData( $output, $data );
            $output = MergeViewWithExtraElements( $output, $extra_elements );
            $output = MergeViewWithErrors( $output, $errors );
            $output = RemoveEmptyErrorTags( $output, $data );

            print $output;
        ?>

    </div>
</div>

</body>
</html>