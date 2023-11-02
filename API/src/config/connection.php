<?php 


namespace Connections;
require ("vendor/autoload.php");
use PDO;


class connection{

    function getConnection () {
        $host = 'localhost'; 
        $port = '5432';      
        $dbname = 'Usuarios'; 
        $user = 'postgres';         
        $password = 'Dante2016';       
        

        $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

        
        
        return $pdo;
        
    }
    
}

?>