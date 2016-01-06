<?php

	class User{
		private $data = array();

		public function __construct($name, $email){
			$this->data['name'] = $name;
			$this->data['email'] = $email;
		}

		public function __set($name, $value){
			$this->data[$name] = $value;
 		}

		public function __get($name){
			return $this->data[$name];
		}
	}
?>