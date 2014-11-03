<?php
	
	class Post {

		protected $id;
		protected $title;
		protected $content;
		protected $username;
		protected $email;
		protected $published;
		protected $dateCreated;
		protected $dateModified;


		// Getters & Setters
		public function setId($id) {
			$this->id = $id;	
		}

		public function getId() {
			return $this->id;
		}

		public function setTitle($title) {
			$this->title = $title;	
		}

		public function getTitle() {
			return $this->title;
		}

		public function setContent($content) {
			$this->content = $content;	
		}

		public function getContent() {
			return $this->content;
		}

		public function setUsername($username) {
			$this->username = $username;	
		}

		public function getUsername() {
			return $this->username;
		}

		public function setEmail($email) {
			$this->email = $email;	
		}

		public function getEmail() {
			return $this->email;
		}

		public function setPublished($published) {
			$this->published = $published;	
		}

		public function getPublished() {
			return $this->published;
		}

		public function setDateCreated($dateCreated) {
			$this->dateCreated = $dateCreated;
		}

		public function getDateCreated() {
			return $this->dateCreated;
		}

		public function setDateModified($dateModified) {
			$this->dateModified = $dateModified;	
		}

		public function getDateModified() {
			return $this->dateModified;
		}

		public function isValidToInsert() {
			// Validation
			$validator = new Validator();
			$validator->validateEmail($this->getEmail(), 'email');

			if($validator->isValid()) {
				return true;
			}
			return false;
		}

	}

?>