<?php
namespace controllers;

include_once('includes/View_Loader.php');
include_once('models/Felhasznalok.php');
include_once('models/Jogosultsagok.php');
include_once('includes/classes/Response.php');
include_once('includes/classes/FelhasznaloDAO.php');
include_once('includes/classes/JogosultsagDAO.php');

use includes\classes\FelhasznaloDAO;
use includes\classes\Response;
use includes\Database;
use includes\View_Loader;
use models\Felhasznalok;
use models\Jogosultsagok;

class HomeController {

	private $baseName = 'home';
	private $rightsModel;
	private $userModel;

	public function __construct() {
		$this->userModel = new Felhasznalok(Database::getConnection());
		$this->rightModel = new Jogosultsagok(Database::getConnection());
	}

	/**
	 * index metódus - betölti be a nyitólapot
	 */
	public function index() {
		$view = new View_Loader($this->baseName);
	}

	/**
	 * login metódus - betölti login/regisztrációs oldalt,
	 * illetve kezeli a bejelentkezés és regisztráció során a POST kéréseket
	 */
	public function login() {
		
		if ($_POST) {
			if (isset($_POST['login'])) {
				// Ha login POST...
				$user = $this->userModel->getByUsername($_POST['log_username']);
				if ($user != FALSE) {
					$right = $this->rightModel->getLevelById($user->jog_id);
					$givenPswd = $_POST['log_pswd'];
					if (!password_verify($givenPswd,$user->jelszo)) {
						echo(json_encode(new Response(true, 'Hibás jelszó!')));
						return;
					} else {
						$_SESSION['username'] = $user->bejelentkezes;
						$_SESSION['userlevel'] = $right;
						echo(json_encode(new Response(false, 'Sikeresen bejelentkezett!')));
						return;
					}
				} else {
					echo(json_encode(new Response(true, 'Nincs ilyen felhasználó!')));
					return;
				}
			} elseif (isset($_POST['register'])) {
				// Ha register POST...
				$userDao = new FelhasznaloDAO();
				$userDao->csaladi_nev = $_POST['reg_lastname'];
				$userDao->utonev = $_POST['reg_firstname'];
				$userDao->bejelentkezes = $_POST['reg_username'];
				$userDao->jelszo = password_hash($_POST['reg_pswd'], PASSWORD_DEFAULT);
				$userDao->jog_id = $this->rightModel->getIdByLevel(1);

				if ($this->userModel->getByUsername($userDao->bejelentkezes) != null) {
					echo(json_encode(new Response(true, 'Már létezik ilyen felhasználónév!')));
					return;
				}

				if (!$this->userModel->insert($userDao)) {
					echo(json_encode(new Response(true, 'Nem sikerült a regisztráció!')));
					return;
				}
				echo(json_encode(new Response(false, 'Sikerült a regisztráció!')));
			}
		} else {
			// Ha csak GET volt akkor a login oldalhoz...
			$view = new View_Loader('login');
		}
	}

	/**
	 * logout metódus - nem tölt be oldalt, csak
	 * kijelentkezteti a felhasználót
	 */
	public function logout() {
		if ($_POST) {
			if (isset($_POST['logout'])) {
				session_unset();
				echo(json_encode(new Response(false, 'Ön kijelentkezett az oldalról!')));
				return;
			}
		}
	}

}
