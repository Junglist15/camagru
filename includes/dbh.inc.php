<?php
    try
    {
        $PDO = new PDO("mysql:host=localhost;dbname=camagru_users", "root", "bluebelt1994");

        $name = 'pneethli';
        $email = 'pneethli@student.wethinkcode.co.za';
    } catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>