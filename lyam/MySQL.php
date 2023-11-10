<?php 
function mysql() {
try
{
     $mysqlConnection = new PDO(
    'mysql:host=;dbname=d34jp_loines;charset=utf8',
    'root',
    ''
); 
return $mysqlConnection;
}
catch (Exception $e)
{
        die('Erreur de connexion au BDD : ' . $e->getMessage());
}
};
?>