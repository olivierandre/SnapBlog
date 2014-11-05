<?php

	namespace Model;


	class CommentValidator extends Validator {

		public function isValid(Comment $comment) {
			$username = $comment->getUsername();
			$email = $comment->getEmail();
			$content = $comment->getContent();
			$id = $comment->getPostId();
			
			$this->validateContent($content, 'content');
			$this->validateUsername($username, 'username');
			$this->validateEmail($email, 'email');
			$this->getIdPostForAddComment($id, 'exist');
			
			if($this->hasErrors()) {
				return false; 
			}	
				return true;
			}
	}