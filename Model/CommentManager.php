<?php

namespace Model;

	use \PDO;

	class CommentManager {

		public function save(Comment $comment) {

			$database  = Database::connectDatabase();

			$sql = "INSERT INTO comment (postId, content, username, email, published, dateCreated, dateModified)
					VALUES(:postId, :content, :username, :email, 1, NOW(), NOW())";

			$stmt = $database->prepare($sql);
			$stmt->bindValue(':postId', $comment->getPostId());
			$stmt->bindValue(':content', $comment->getContent());
			$stmt->bindValue(':username', $comment->getUsername());
			$stmt->bindValue(':email', $comment->getEmail());

			return $stmt->execute();

		}

		public function getCommentByIdPost($postId) {
			$database = Database::connectDatabase();

			$sql = "SELECT * FROM comment
					WHERE postId = :postId
					AND published = 1
					ORDER BY dateCreated";

			$stmt = $database->prepare($sql);
			$stmt->bindValue(':postId', $postId);
			$stmt->execute();
			$comments = $stmt->fetchAll(PDO::FETCH_CLASS, "\Model\Comment");

			return $comments;
		}

	}


?>