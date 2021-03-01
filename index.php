<?php

/**
 * 1. Importez la table user dans une base de données que vous aurez créée au préalable via PhpMyAdmin
 * 2. En utilisant l'objet de connexion qui a déjà été défini =>
 *    --> Remplacez les informations de connexion ( nom de la base et vérifiez les paramètres d'accès ). ??????????????????
 *    --> Supprimez le dernier utilisateur de la liste, faites une capture d'écran dans PhpMyAdmin pour me montrer que vous avez supprimé l'entrée et pushez la avec votre code.
 *    --> Faites un truncate de la base de données, les auto incréments présents seront remis à 0
 *    --> Insérez un nouvel utilisateur dans la table ( faites un screenshot et ajoutez le au repo )
 *    --> Finalement, vous décidez de supprimer complètement la table
 *    --> Et pour finir, comme vous n'avez plus de table dans la base de données, vous décidez de supprimer aussi la base de données.
 */

require "Classes/DB.php";

$bdd = DB::getInstance();

//2.2

$userId = $bdd->lastInsertId();
$deleteLastId = "DELETE FROM user WHERE id = $userId";

if($bdd->exec($deleteLastId) !== false) {
    echo "Le dernier utilisateur a été supprimé ! <br>";
}

//2.3
$sql = "TRUNCATE TABLE user";
if ($bdd->exec($sql) !== false) {
    echo "Le contenu de la table user supprimé ! <br>";
}


//2.4
$sql1 = ( " INSERT INTO user VALUES (null, 'Ard', 'Chloé', 'ruelle vitou', 4, 59186, 'Anor', 'France', 'chlochlo.ard@mail.fr') ");

$bdd->exec($sql1);

//2.5
$sql2 = "DROP TABLE user";

if ($bdd->exec($sql2) !== false) {
    echo "table user supprimée <br>";
}

//2.6
$sql3 = "DROP DATABASE live3";

if($bdd->exec($sql3) !== false) {
    echo "Base de données complétement supprimés. <br>";
}


