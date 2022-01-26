<?php
/**retourne une connexion à la bdd @return PDO 
 * 
 * 
 *
*/

$pdo = Database::getPdo();

class Database
{

   public static function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]   );

    return $pdo;
    }

/*
Retourne la liste des articles classés par dat de création @return array
*/

}