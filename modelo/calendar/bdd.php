<?php
try
{
	$bdd = new PDO("mysql:dbname=peluditos_san_cristobal;host=localhost","root","");

}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
