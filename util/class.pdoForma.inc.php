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
	public function _destruct(){
		PdoForma::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 * Appel : $instancePdoFORMA = PdoForma::getPdoFORMA();
 * @return l'unique objet de la classe PdoVanille
 */
	public  static function getPdoForma()
	{
		if(PdoForma::$monPdoForma == null)
		{
			PdoForma::$monPdoForma= new PdoForma();
		}
		return PdoForma::$monPdoForma;  
	}

/** Fonction static qui permet d'identifier le participant
*
* Appel : $login ,$mdp entrées du participant
* @return Vrai ou Faux
*/
	public static function Connexion($login, $mdp)
	{
		$req = "Select *  FROM participant WHERE PASS = '$mdp' AND LOGIN = '$login'";
		$result = PdoForma::$monPdo->query($req);
		$ligne = $result->fetch();		
		
		$mdpBDD = $ligne['PASS'];
		$loginBDD = $ligne['LOGIN'];

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
/** Fonction static qui permet de recupere l'id du participant en fonction de son nom
*
*	Appel : $nom 
* @return l'id du participant
**/
	public static function RecupIdPerso($nom)
	{
		$req = "Select ID_PARTI from participant where LOGIN = '$nom'";
		$result = PdoForma::$monPdo->query($req);
		$ligne = $result->fetch();

		$IdPerso = $ligne['ID_PARTI'];

		return $IdPerso;
	}
/** Fonction static qui permet de savoir si l'utilisateur est admin ou pas 
*
*  Appel : $login
* @return $admin , si 1 = admin , si 0 =/ admin
**/

	public static function Admin($login)
	{
		$reqSql = "Select * from participant Where login ='$login'";
		$res = PdoForma::$monPdo->query($reqSql);
		$ligne = $res->fetch();

		$admin = $ligne['admin'];

		if($admin == 1)
		{
			$admin = true;
			
		}
		else
		{
			$admin = false;
			
		}

		return $admin;
	}
/** Fonction static qui permet de recuperer toute la table formation en fonction d'un numéro de domaine
*
*	Appel : $iddomaine
* @return $ligneFormation : Tableau associatif
**/
	public static function AfficheFormations($iddomaine)
	{
		$reqSQL = "Select * from formation where NUM_DOMAINE = '$iddomaine'";
		$res = PdoForma::$monPdo->query($reqSQL);
		$ligneFormation = $res->fetch();

		return $ligneFormation;
	}
/** Fonction static qui recupère toute la table domaine
*
*	Appel : Procédure
* @return $ligne : Tableau associatif
**/
	public static function recupdomaine()
	{
		$reqSql = "Select * from domaine";
		$result = PdoForma::$monPdo->query($reqSql);
		$ligne = $result->fetchAll();
		return $ligne;
	}
/** Fonction static qui recupère les formations en fonction des domaine
*
*	Appel : $idDomaine
* @return $LigneForm : Tableau Associatif
**/
	public static function recupFormation($idDomaine)
	{
		$SQL = "Select  NUM_DOMAINE , NUM_FORMA , LIBELLE_FORMA , COUT_FORMA , PUBLIC_FORMA , OBJ_FORMA , CONTENU_FORMA from formation WHERE NUM_DOMAINE = '$idDomaine'";
		$result = PdoForma::$monPdo->query($SQL);
		$LigneForm = $result->fetchAll();

		return $LigneForm;
	}
/** Fonction static qui recupère le libelle du domaine
*
*	Appel : $idDomaine
* @return $Ligne : Tableau Associatif
**/
	public static function recupLibelleDomaine($idDomaine)
	{
		$SQL = "Select Libelle_DOMAINE from Domaine where NUM_DOMAINE='$idDomaine'";
		$result = PdoForma::$monPdo->query($SQL);
		$Ligne = $result->fetch();

		return $Ligne;
	}
/** Fonction static qui recupère les sessions d'une formation
*
*	Appel : $idformation , $numdomaine
*	@return $Lignes : Tableau Associatif
**/
	public static function recupSessiondeFormation($idformation , $numDomaine)
	{
		$SQL = "Select * FROM SESSION WHERE NUM_FORMA = '$idformation' AND NUM_DOMAINE = '$numDomaine'";
		$result = PdoForma::$monPdo->query($SQL);
		$Ligne = $result->fetchAll();

		return $Ligne;
	}
/** Fonction static qui insert un participant a une session de formation 
*
*	Appel : $numSession , $numFormation , $numDomaine , $IdParti , $date
*	@return $Lignes : Tableau Associatif
**/
	public static function InsertionInscrit($numSession , $numFormation , $numDomaine , $IdParti , $date)
	{
		
		$SQL = "INSERT INTO INSCRIRE VALUE ($numDomaine , $numFormation ,  $numSession , $IdParti , NOW() , 'ENR')";
		$result  = PdoForma::$monPdo->exec($SQL);
	}
/** Fonction static qui recup les sessions auxquelle le participant est inscrit 
*
*	Appel : $idParti
*	@return $Lignes : Tableau Associatif
**/
	public static function recupSessionParti($idParti)
	{
		$SQL = "Select * from inscrire where ID_PARTI = '$idParti'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetchAll();

		return $Lignes;
	}

	
/** Fonction static qui recup le libelle d'une formation
*
*	Appel : $idFormation
* @return $Lignes : Tableau Associatif
**/
	public static function recupLibelleFormation($idFormation)
	{
		$SQL = "Select LIBELLE_FORMA from formation where NUM_FORMA = '$idFormation'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetch();

		return $Lignes;
	}
/** Fonction static qui recupère le nom et le prénom d'un participant
*
*	Appel : $idParti
* @return $Lignes : Tableau Associatif 
**/
	public static function recupNomPrenom($idParti)
	{
		$SQL = "Select NOM_PARTI , PRENOM_PARTI from Participant where ID_PARTI = '$idParti'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetchAll();

		return $Lignes;
	}
/** Fonction static qui recupère le libelle d'un lieu
*
*	Appel : $idLieu
* @return Lignes : Tableau Association
**/
	public static function recupLibelleLieu($idLieu)
	{
		$SQL = "Select NOM_SALLE from lieu where NUM_LIEU = '$idLieu'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetch();

		return $Lignes;
	}
/** Fonction static qui recupère le numéro d'un lieu en fonction d'un idSession sur la table Session 
*
*	Appel : $idSession
* @return $Lignes : Tableau Associatif
**/
	public static function recupDonnees($idSession)
	{
		$SQL = "Select NUM_LIEU from SESSION where ID_SESSION = '$idSession'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetchAll();

		return $Lignes;
	}
/** Fonction static qui recupère le nombre de formation d'un participant
*
*	Appel : $idParti
*	@return $Lignes : Tableau Associatif
**/
	public static function RecupNbForm($idParti)
	{
		$SQL = "Select count(id_parti) from inscrire where id_parti = '$idParti'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetch();

		return $Lignes;
	}
/** Fonction static qui recupère le nombre de domaine auxquelle le participant participe
*
*	Appel : $idParti , $numDomaine
* @return $Lignes : Tableau Associatif
**/
	public static function RecupNbDom($idParti , $numdomaine)
	{
		$SQL = "select count(id_parti) from inscrire where num_domaine = '$numdomaine' and id_parti = '$idParti'";
		$result = PdoForma::$monPdo->query($SQL);
		$Lignes = $result->fetch();

		return $Lignes;
	}

	
}
?>