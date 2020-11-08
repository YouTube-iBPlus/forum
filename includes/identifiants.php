<?php
try
{
$sql["driver"] = "mysql";
$sql["host"] = "";
$sql["user"] = "";
$sql["pass"] = "";
$sql["base"] = "";
$db = new PDO($sql["driver"] .":host=". $sql["host"] .";dbname=". $sql["base"], $sql["user"], $sql["pass"]);
}
catch (Exception $e)
{
        die("Erreur : " . $e->getMessage());
}
