<?php

//Méthode classique.
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'bdd_cours';

    //encapsulation tentative de connexion si il a un problème => capture des potentielles erreurs.
  try{
    //tentative
    $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    //On définit le mode d'erreur de PDO Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>Connecté depuis l'index avec l'objet de base PDO !</p>";
}
    //Capture des expetions si une exception est lancée et on affiche
    catch (PDOException $e){
        //Affichage des message d'erreur géré pas l'objet PDOExecption
        echo "<p>Erreur : " . $e->getMessage() . "</p>";
    }

//Fermeture de la connexion.
$conn = null;

//Méthode objet adaptable directement dans les paramètres de mon objet PDO.
require __DIR__ . '/class/Dbpdo.php';

$connexion = new Dbpdo('localhost', 'root','' , 'bdd_cours');
$connexion->connexion();

//Fermeture de la connexion (tentative) x).
$connexion->setOff(false);
$connexion->getOff();
?>
    <pre>
        <?=var_dump($connexion)?>
    </pre>

<?php

//Méthode singleton avec fichier de config qui consiste à ne pas dupliquer mon objet PDO,
//pour modifier les paramètres passé à mon objet obligé de passé par mon fichier Config.
require __DIR__ . '/class/Config.php';
require __DIR__ . '/class/DbSingleton.php';

$connexionSingleton = DbSingleton::PDO();
$connexionSingleton2 = DbSingleton::PDO();

//J'affiche mes objets pour voire si il se duplique ou pas.
?>
<pre>
        <?=var_dump($connexionSingleton)?>
    </pre>


<pre>
        <?=var_dump($connexionSingleton2)?>
    </pre>