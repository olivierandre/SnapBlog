<?php
	
	namespace Model;
	
	class Post extends TextualContent {

		protected $title;
		
		public function setTitle($title) {
			$this->title = $title;	
		}

		public function getTitle() {
			return $this->title;
		}

		

	}

?>