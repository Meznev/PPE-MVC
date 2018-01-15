<?php

// Controleur Principal du site Forma 2017

session_start();
require_once('util/fonctions.inc.php');
require_once("util/class.pdoForma.inc.php");
include("vues/v_entete.php");
include("vues/v_bandeau.php");

$dateActuelle = date('Y-m-d ');

echo " La salade ";
$_SESSION['DateActuelle'] = $dateActuelle;
if(isset($_SESSION['message']))
{
    include('vues/v_erreurs.php');
    unset($_SESSION['message']);
}



if(!isset($_REQUEST['Chemin']))
{
    $Chemin = 'accueil';
}
else
{
    $Chemin = $_REQUEST['Chemin'];

/* Création de l'instance d'accès à la base de données */
}
$pdo = PdoForma::getPdoForma();


switch($Chemin)
{
    case 'accueil' :
    {include("vues/v_accueil.php");break;}

    case 'GestionADM' :
    {include("controleurs/c_gestionPERSO.php");break;}

    case'GestionInscrit':
    {include("controleurs/c_gestionInscriptions.php");break;}

    case'GestionFormation':
    {include("controleurs/c_gestionformations.php");break;}
    
}

?>