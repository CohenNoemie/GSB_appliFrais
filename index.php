<?php
/**
 * Index du projet GSB
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 */

require_once 'includes/fct.inc.php';//le suffixe _once sert à limiter cette inclusion à une seule par page.cette bibliotheque est necessaire pour le php
require_once 'includes/class.pdogsb.inc.php';
session_start();//Cette fonction retourne TRUE si une session a été démarrée avec succès, sinon FALSE.
$pdo = PdoGsb::getPdoGsb();//variable=nomclasse::Fonction- statique qui crée l'unique instance de la classe Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();//Teste si un quelconque visiteur est connecté

require 'vues/v_entete.php';//c'est l'entete . message d'erreur si il n'arrive pas à l'inclure.
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);//filtre le contenue qui est envoye pr qu'il soit que en string pr pouvoir l'exploiter
if ($uc && !$estConnecte) {   //$uc= ici il s'agit d'une demandeconnexion
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
}
require 'vues/v_pied.php';
