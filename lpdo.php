<?php

class lpdo{
	public $host = 'localhost';
	public $username = 'root';
	public $password = '';
	public $db = 'classes';
	
	public function __construct($host, $username, $password, $db){
		$bdd = new mysqli($host, $username, $password, $db);
		
		if($bdd->connect_errno){
			echo 'Connexion échouée'.$bdd->connect_errno.'|'.$bdd->connect_error;
		}
	}
	
	public function connect($host, $username, $password, $db){
		if(!empty($bdd)){
			$bdd->close();
			
			$bdd = new mysqli($host, $username, $password, $db);
		}
	}
	
	public function __destruct(){
		$bdd->close();
	}
	
	public function close(){
		$bdd->close();
	}
	
	public function execute($query){
		$query->execute();
		
		echo '<table><tr><td>'.$this->$query.'</td></tr></table>';
	}
	
	public function getLastQuery(){
		if(!empty($query)){
			echo $bdd->info;
		}
		else{return false;}
	}
	
	public function getLastResult(){
		
	}
	
	public function getTables(){
	}
	
	public function getFields($table){
	}
}

?>