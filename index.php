<?php
require './class/Dbpdo.php';


$server = 'localhost';
$user = 'root';
$password = '';
$db = 'bdd_cours';


  try{
    //tentative
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    //On définit le mode d'erreur de PDO Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>!!!</p>";
}
    //Capture des expetions si une exception est lancée et on affiche
    catch (PDOException $e){
        //Affichage di message d'erreur géré pas l'objet PDOExecption
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }

//Fermeture de la connexion.
$conn = null;



$connexion = new Dbpdo('localhost', 'root','' , 'bdd_cours');

$connexion->connexion();

//Fermeture de la connexion (tentative) x).

$connexion->setOff(false);
$connexion->getOff();
?>
    <pre>
        <?=var_dump($connexion)?>
    </pre>
