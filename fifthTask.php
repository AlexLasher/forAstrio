<?php
	class Cookies{
		private static $_instance = null;

		private function __construct() {
		}
		protected function __clone() {
		}
		//с помощью нанной функции получается доступ к классу
		static public function getInstance() {
			if(is_null(self::$_instance)){
				self::$_instance = new self();
			}
		return self::$_instance;
		}
		//функция для установки куки
		public function setCookie($name,$value,$duration = 3600*24*365) {
			setcookie($name,$value,time()+$duration);
		}
		//функция для изменения куки
		public function resetCookie($name,$value,$duration = 3600*24*365) {
			setcookie($name,$value,time()+$duration);
		}
		//функция для получения куки
		public function getCookie($name){
			return $_COOKIE[$name] || null;
		}
		//функция для удаления куки
		public function deleteCookie($name) {
			setcookie($name,"delete",time()-1);
		}
	}
?>