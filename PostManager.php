<?php
	
	class PostManager {

		public function save(Post $post) {

			$database  = Database::connectDatabase();

			$sql = "INSERT INTO post (title, content, username, email, published, dateCreated, dateModified)
					VALUES(:title, :content, :username, :email, 1, NOW(), NOW())";

			$stmt = $database->prepare($sql);
			$stmt->bindValue(':title', $post->getTitle());
			$stmt->bindValue(':content', $post->getContent());
			$stmt->bindValue(':username', $post->getUsername());
			$stmt->bindValue(':email', $post->getEmail());
			//$stmt->bindValue(':published', $post->getPublished());

			return $stmt->execute();

		}

		public function delete(Post $post) {
			$database  = Database::connectDatabase();

			$sql = "DELETE post 
					WHERE id = :id";

			$stmt = $database->prepare($sql);
			$stmt->bindValue(':id', $post->getId());

			return $stmt->execute();
		}

		public function findAll() {
			$database  = Database::connectDatabase();

			$sql = "SELECT * FROM post"; 

			$stmt = $database->prepare($sql);
			$tab = $stmt->execute();
			$posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');

			return $posts;
			
		}

		public function findLatest() {
			$database = Database::connectDatabase();

			$sql = "SELECT * FROM post
					WHERE published = 1
					ORDER BY dateCreated DESC
					LIMIT 10"; 

			$stmt = $database->prepare($sql);
			$stmt->execute();
			$posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');

			return $posts;
		}

		public function findPostById($id) {
			$database = Database::connectDatabase();

			$sql = "SELECT * FROM post
					WHERE id = :id"; 

			$stmt = $database->prepare($sql);
			$stmt->bindValue(':id', $id);
			/*$stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');*/
			$stmt->execute();
			$post = $stmt->fetchObject('Post');

			return $post;
		}

		public function update(Post $post) {
			$database  = Database::connectDatabase();

			$sql = "UPDATE post 
					SET title = :title,
					 	content = :content,
					 	username = :username,
					 	email = :email,
					 	published = :published,
					 	dateModified = NOW()
					WHERE id = :id";

			$stmt = $database->prepare($sql);
			$stmt->bindValue(':id', $post->getId());
			$stmt->bindValue(':title', $post->getTitle());
			$stmt->bindValue(':content', $post->getContent());
			$stmt->bindValue(':username', $post->getUsername());
			$stmt->bindValue(':email', $post->getEmail());
			$stmt->bindValue(':published', $post->getPublished());

			return $stmt->execute();
		}

	}


?>