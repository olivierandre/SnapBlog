<?php

	class Validator {

		protected $errors = array();

		public function getErrors() {
			return $this->errors;
		}

		public function addError($error, $field) {
			$this->errors[$field][] = $error;
		}

		public function validateEmail($string, $field) {
			if(!filter_var($string, FILTER_VALIDATE_EMAIL)) {
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