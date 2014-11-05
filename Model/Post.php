<?php
	
	namespace Model;

	use Cocur\Slugify\Slugify;
	
	class Post extends TextualContent {

		protected $title;
		protected $slug;
		
		public function setTitle($title) {
			$this->title = \Tool\SecurityTool::safeOnSet($title);	
		}

		public function getTitle() {
			return \Tool\SecurityTool::safeOnGet($this->title);
		}

		public function setSlug($title) {
			$slugify = new Slugify();
			$this->slug = $slugify->slugify($title);
		}

		public function getSlug() {
			return \Tool\SecurityTool::safeOnGet($this->slug);
		}

	}

?>