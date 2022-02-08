<?php
class DbSingleton
{
    //méthode statique qui me permet de l'invoquer sans avoir créé d’instance avant.
    private static ?PDO $pdoObject = null;
    //Le Data Source Name (DSN)
    private static string $dsn = "mysql:host=%s;dbname=%s;charset=%s";


    public static function PDO(): ?PDO{
        //Si mon pdoObject n'existe pas il est créé.
        if  (self::$pdoObject === null){
            try{
                //J'utilise ma classe config pour passer les paramètres requis pour la connexion.
                //J'utilise la fonction sprintf pour retourner une chaîne formatée.
                $dsn = sprintf(self::$dsn, Config::DB_HOST, Config::DB_NAME, Config::DB_CHARSET);
                self::$pdoObject = new PDO($dsn, Config::DB_USER, Config::DB_PASS);
                self::$pdoObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            //En cas d'erreur j'arrête !
            catch (PDOException $error){
                die("I'm dead");
            }
        }
        //Si je suis ici tout c'est bien passé je peux retourner mon objet créé.
        return self::$pdoObject;
    }
}