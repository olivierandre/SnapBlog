<?php

	namespace Model;

	class Validator {

		protected $errors = array();

		public function getErrors() {
			return $this->errors;
		}

		public function addError($error, $field) {
			$this->errors[$field][] = $error;
		}

		public function hasErrors() {
			if(empty($this->errors)) {
				return false;
			} 
			return true;
		}

		public function validateTitle($string, $field) {
			$tailleString = strlen($string);

			if($tailleString < 2 || $tailleString > 255)  {
				$this->addError("Titre incorrecte !", $field);
				return false;
			}
			return true;
		}

		public function validateUsername($string, $field) {

			$tailleString = strlen($string);

			if(($tailleString < 4 || $tailleString > 30 || !preg_match('/^[a-z0-9]*$/i', $string)))  {
				$this->addError("Username incorrecte !", $field);
				return false;
			}
			return true;
		}

		public function validateContent($string, $field) {
			$tailleString = strlen($string);

			if($tailleString < 10)  {
				$this->addError("Contenu trop restreint !", $field);
				return false;
			}
			return true;
		}

		public function validateEmail($string, $field) {

			$tailleString = strlen($string);

			if(!filter_var($string, FILTER_VALIDATE_EMAIL) || $tailleString > 50) {
				$this->addError("Email invalide !", $field);
				return false;
			}
			return true;
		}

		public function validateMinLength($string, $field, $minLength) {
			if(strlen($string) < $minLength) {
				$this->addError("Chaîne trop courte !", $field);
				return false;
			}
			return true;
		}

		public function isValid() {
			if(empty($this->errors)) {
				return true;
			}
			return false;
		}

	}



?>