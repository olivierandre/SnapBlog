<?php

	namespace Model;

	class PostValidator extends Validator {

		public function isValid(Post $post) {
			$username = $post->getUsername();
			$email = $post->getEmail();
			$title = $post->getTitle();
			$content = $post->getContent();
			$slug = $post->getSlug();

			$this->validateTitle($title, 'title');
			$this->validateContent($content, 'content');
			$this->validateUsername($username, 'username');
			$this->validateEmail($email, 'email');
			$this->validateSlug($slug, 'title');

			if($this->hasErrors()) {
				return false; 
			}	
				return true;
		}

		public function getIdPostForAddComment($idPost, $field) {
			$postManager = new PostManager();
			if($postManager->isIdPostExist($idPost)) {
				return true;
			}
			$this->addError("Post inexistant !!!", $field);
			return false;
		}

		public function validateSlug($slug, $field) {
			$postManager = new PostManager();

			if(!$postManager->isUniqueSlug($slug)) {
				return true;
			}
			$this->addError("Titre déjà existant !", $field);
			return false;
		}

	}




?>