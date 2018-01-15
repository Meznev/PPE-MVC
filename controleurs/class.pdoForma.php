<?php
/** 
 * Classe d'accès aux données. 
 * Utilise les services de la classe PDO
 * pour l'application Vanille
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoVanille qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author slam5
 * @version    1.0

 */

class PdoForma
{   		
      	private static $monPdo;
		private static $monPdoForma = null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct()
	{
    		PdoForma::$monPdo = new PDO('mysql:host=127.0.0.1;dbname=formappe', 'root', ''); 
			PdoForma::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct()
	{
		PdoForma::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoFORMA = PdoForma::getPdoFORMA();
 *  l'unique objet de la classe PdoVanille
 */
	public  static function getPdoForma()
	{
		if(PdoForma::$monPdoForma == null)
		{
			PdoForma::$monPdoForma = new PdoForma();
		}
		return PdoForma::$monPdoForma;  
	}

	public static function admin($login, $mdp)
	{
		$req = "Select *  FROM participant WHERE PASS = '$mdp' AND LOGIN = '$login'";
		$result = PdoForma::$monPdo->query($req);
		$ligne = $result->fetch();		
		
		$mdpBDD = $ligne['pass'];
		$loginBDD = $ligne['login'];

		if($mdpBDD == $mdp && $loginBDD == $login)
		{
			$log = true;
		}
		else
		{
			$log = false;
		}

		return $log;
		
	}

	
}
?>