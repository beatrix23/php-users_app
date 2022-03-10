<?php

class Utilizator{
	private $user_name, $passw, $sex, $civila, $nume, $prenume, $email, $poza, $data_reg;
    
    function __construct($user_name, $passw, $sex, $civila, $nume, $prenume, $email, $poza, $data_reg){
		$this->user_name=$user_name;
		$this->passw=$passw;
		$this->sex=$sex;
		$this->civila=$civila;
		$this->nume=$nume;
		$this->prenume=$prenume;
		$this->email=$email;
		$this->poza=$poza;
		$this->data_reg=$data_reg;
	}

	function getNume(){
		return $this->nume;
	}
	function getPrenume(){
		return $this->prenume;
	}

	function getUserName() {
		return $this->user_name;
	}

	function getSexUser() {
		return $this->sex;
	}

	function getStareCivila() {
		return $this->civila;
	}

	function getEmail() {
		return $this->email;
	}

	function getDataInrg() {
		return $this->data_reg;
	}
	function getPoza() {
		return $this->poza;
	}

	function toCSV(){
		return "$this->user_name, $this->passw, $this->sex, $this->civila, $this->nume,$this->prenume,$this->email, $this->poza, $this->data_reg\r\n";
	}
	
}

?>