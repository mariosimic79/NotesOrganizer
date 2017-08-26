<?php


  /*      $dsn = 'mysql:host=localhost; dbname=punzalog_organizator_biljezaka; charset=utf8';
        $username = 'punzalog_organizator_biljezaka';
        $password = 'admin12345';
*/


        $dsn = 'mysql:host=localhost; dbname=organizator_biljezaka; charset=utf8';
        $username = 'root';
        $password = '';

        try
           {
              $conn = new PDO($dsn, $username, $password);
           }
        catch (PDOException $e)
            {
              echo 'Connection failed: '.$e->getMessage();
              exit;
            }
                            
                            
        
    
        

