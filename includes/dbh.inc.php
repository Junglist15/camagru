<?php
    try
    {
        $PDO = new PDO("mysql:host=localhost;dbname=camagru_users", "root", "bluebelt1994");
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $name = 'pneethli';
        // $email = 'pneethli@student.wethinkcode.co.za';
    } catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>