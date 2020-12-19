<?php

$bdd = new mysqli('localhost', 'root', '', 'classes');

if($bdd->connect_errno){
	echo 'Connexion échouée'.$bdd->connect_errno.'|'.$bdd->connect_error;
}

class user{
	private $id;
	public $login;
	public $email;
	public $firstname;
	public $lastname;
	
	public function register($login, $password, $email, $firstname, $lastname){
		$queryregister = $bdd->prepare('INSERT INTO utilisateurs(login, password, email, firstname, lastname) VALUES("'.$login.'","'.$password.'","'.$email.'","'.$firstname.'","'.$lastname.'")');
		$table = $bdd->query('SELECT * FROM utilisateurs WHERE login ="'.$login.'"')
		$queryregister->execute();
		
		echo '<table>';
		while($ligne = $table->fetch_assoc()){
			echo '<tr><td>'.$ligne['login'].$ligne['password'].$ligne['email'].$ligne['firstname'].$ligne['lastname'].'</td></tr>';
		}
		echo '</table>';
	}
	
	public function connect($login, $password){
		$queryconnect = $bdd->query('SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'"');
		$table2 = $bdd->query('SELECT login, password FROM utilisateurs WHERE login ="'.$login.'"')
		
		if(mysqli_num_rows($table) == 0){
			echo 'login ou mot de passe incorrect';
		}
		else{
			$login = $_POST['login'];
			$password = $_POST['password'];
		}
		
		echo '<table>';
		while($ligne2 = $table2->fetch_assoc()){
			echo '<tr><td>'.$ligne2['login'].$ligne2['password'].'</td></tr>';
		}
		echo '</table>';
	}
	
	public function disconnect(){
		session_destroy();
	}
	
	public function delete(){
		$querydelete = $bdd->prepare('DELETE FROM utilisateurs WHERE login = "'.$login.'"');
		$querydelete->execute();
		
		session_destroy();
	}
	
	public function update($login, $password, $email, $firstname, $lastname){
		$queryupdate = $bdd->prepare('UPDATE utilisateurs SET login = "'.$login.'", password = "'.$password.'", email = "'.$email.'", firstname = "'.$firstname.'", lastname = "'.$lastname.'"');
		$queryupdate->execute();
	}
	
	public function isConnected(){
		if(!empty($login)){return true;}
		else{return false;}
	}
	
	public function getAllInfos(){
		$table3 = $bdd->query('SELECT * FROM utilisateurs');
		
		echo '<table>';
		while($ligne3 = $table->fetch_assoc()){
			echo '<tr><td>'.$ligne3['login'].$ligne3['password'].$ligne3['email'].$ligne3['firstname'].$ligne3['lastname'].'</td></tr>';
		}
		echo '</table>';
	}
	
	public function getLogin(){
		return $login;
	}
	
	public function getEmail(){
		return $email;
	}
	
	public function getFirstname(){
		return $firstname;
	}
	
	public function getLastname(){
		return $lastname;
	}
	
	public function refresh(){
		$queryrefresh = $bdd->query('SELECT * FROM utilisateurs');
		
		while($ligne4 = $queryrefresh->fetch_assoc()){
			$login = $ligne4['login'];
			$password = $ligne4['password'];
			$email = $ligne4['email'];
			$firstname = $ligne4['firstname'];
			$lastname = $ligne4['lastname'];
		}
	}
}

?>