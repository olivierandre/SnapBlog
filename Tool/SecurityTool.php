<?php

	namespace Tool;

	class SecurityTool {

		public static function safeOnSet($string) {
			return strip_tags($string);
		}

		public static function safeOnGet($string) {
			return htmlspecialchars($string);
		}

	}


?>