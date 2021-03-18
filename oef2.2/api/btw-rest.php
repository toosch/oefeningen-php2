<?php
header('Access-Control-Allow-Origin: http://localhost:1234');

// api is public
$public_access =  true;

require_once '../lib/autoload.php';
// we will need the DBManager; $container is initialized in /lib/autoload.php
$db = $container->getDBManager();

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request_uri);
// opgelet: parts afhankelijk van # submappen in server...
$request_part = $parts[5];
if ( count($parts) > 6 ) $id = $parts[6];

//GET btw codes
if ( $method == "GET" AND $request_part == "btwcodes" )
{
    $sql = "select * from eu_btw_codes";
    print json_encode( ["data" => $db->GetData($sql)] ) ;
}

//GET btw code van land met id ...
if ( $method == "GET" AND $request_part == "btwcode" )
{
    $sql = "select * from eu_btw_codes where eub_id=$id";
    print json_encode( ["data" => $db->GetData($sql)] ) ;
}

//POST btw code
if ( $method == "POST" AND $request_part == "btwcodes"  )
{
    $naam = $_POST["naam"];
    $code = $_POST["code"];

    $sql = "INSERT INTO eu_btw_codes SET eub_land='$naam', eub_code='$code'";
    $db->ExecuteSQL($sql);

    // find id of last added:
    $sql = "select max(eub_id) as id from eu_btw_codes";
    $newID = $db->getData($sql);

    http_response_code(201);
    print json_encode( [    "eub_id" => $newID[0][0] ,
                            "msg" => "BTW code '$naam' - '$code' aangemaakt"] ) ;
}

//PUT btw code
if ( $method == "PUT" AND $request_part == "btwcode" )
{
    $contents = json_decode( file_get_contents("php://input") );
    $newName = $contents->naam;
    $newCode = $contents->code;

    $sql = "UPDATE eu_btw_codes SET eub_land='$newName', eub_code='$newCode' WHERE eub_id=$id";
    $db->ExecuteSQL($sql);
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier een OK teruggeven
}

//DELETE btw code
if ( $method == "DELETE" AND $request_part == "btwcode" )
{
    $sql = "DELETE FROM eu_btw_codes WHERE eub_id=$id";
    $db->ExecuteSQL($sql);
    print json_encode( [ "msg" => $sql ] ) ; //normaal zou je hier een OK teruggeven
}

?>
