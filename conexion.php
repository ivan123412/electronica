<?php

try
        
        {
            $conexion = new PDO ('mysql:host=localhost; dbname=electronica','root','');
        }

        catch (PDOException $e)
        
        {
            echo "Error ". $e -> getMessage();
        }

?>