<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "autoload.php";

$user = $container->getLoginChecker()->LoginCheck();

if ( $user )
{
    $_SESSION['user'] = $user;
    $container->getMessageService()->AddMessage("infos", "Welkom, " . $_SESSION['user']->getVoornaam());
    $container->getRouterService()->GoHome( $app_root );
}
else
{
    unset( $_SESSION['user'] );
    $container->getRouterService()->GoToNoAccess( $app_root );
}


