<?php

define('user','amr');
define('password','12345');
$dsn='mysql:host=localhost;dbname=cardb';
try{
$db=new PDO($dsn,user,password);

}
catch(PDOException $e){
$err_msg=$e->getMessage();
echo "<p>$err_msg</p>";
exit();
}
?>