<?php
namespace Core\User;

Class CUser {

	private $permission;

	public function __construct() {
		$this->loadUserPermission();
	}


	/**
	 * f - full
	 * w - write only
	 * r - read only
	 * d - denied
	 */
	private function loadUserPermission() {
		$this->permission = array(
			"core" => array(
				"ciblock" => array(
					"name" => "f",
					"code" => "w",
					"date" => "r",
					"short_desc" => "d"
				)
			)
		);
	}

	public function checkPerm($class, $field, $action) {
		$class_perm = self::getK($this->permission,$class);
		$field_perm = $class_perm[$field];
		if(!$field_perm || $field_perm == "d") return false;
		if($field_perm == "w" && $action != "set") return false;
		if($field_perm == "r" && $action != "get") return false;

		return true;
	}

	private static function getK(array $arr, $path) {
		$pathEx = explode("\\",$path);
		$r = $arr;
		foreach($pathEx as $key) {
			$key = strtolower($key);
			$r = $r[$key];
		}
		return $r;
	}
}

