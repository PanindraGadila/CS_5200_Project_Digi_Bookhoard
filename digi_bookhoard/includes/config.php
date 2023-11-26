<?php 
try
{
$pdo = new PDO("mysql:host=localhost;dbname=digi_bookhoard","php", "phpdb");
}
catch (PDOException $e)
{
    echo ("connection failed ".$e->getMessage());
    die("unable to connect the database the configuration is settled up till now
    <pre>
        'please follow the sql extension file in-order to connect to the database and create essential databases and table by running all the commands'
    </pre>  
    ");
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>