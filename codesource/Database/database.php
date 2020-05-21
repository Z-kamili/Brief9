<?php
class Database
{
   private static  $dbHost = "localhost";
   private static  $dbname = "shopping";
   private static $dbUser = "user1";
   private static  $dbUserPassword = "yes";
   private static  $connection = null; 
 public static   function connect(){
        try{
   self::$connection = new PDO("mysql:host=". self::$dbHost . ";dbname=" . self::$dbname, self::$dbUser, self::$dbUserPassword);
}catch(PDOException $e){
    die($e->getMessage);   
}
        return  self::$connection;
    }
    
  public static  function disconnect(){
        
        
         self::$connection = null;
        
    }


    
    
}

Database::connect();
?>



