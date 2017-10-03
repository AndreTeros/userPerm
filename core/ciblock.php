<?php
namespace Core;

Class CIBlock {

	private $id;
	private $name;
	private $code;
	private $date;
	private $short_desc;

	private $user = null;

	public function setUser(User\CUser $user) {
		$this->user = $user;
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		if($this->user === null) {
			throw new noUserException("User is not defined");
		} elseif(!$this->user->checkPerm(__CLASS__, "name", "get")) {
			throw new userAccessException(__METHOD__." access denied");
		}
		return $this->name;
	}

	public function setName($name) {
		if($this->user === null) {
			throw new noUserException("User is not defined");
		} elseif(!$this->user->checkPerm(__CLASS__, "name", "set")) {
			throw new userAccessException(__METHOD__." access denied");
		}
		$this->name = $name;
	}

	public function getCode() {
		if($this->user === null) {
			throw new noUserException("User is not defined");
		} elseif(!$this->user->checkPerm(__CLASS__, "code", "get")) {
			throw new userAccessException(__METHOD__." access denied");
		}
		return $this->code;
	}

	public function setCode($code) {
		if($this->user === null) {
			throw new noUserException("User is not defined");
		} elseif(!$this->user->checkPerm(__CLASS__, "code", "set")) {
			throw new userAccessException(__METHOD__." access denied");
		}
		$this->code = $code;
	}

	public function getDate() {
		return $this->date;
	}

	public function setDate($date) {
		$this->date = $date;
	}

	public function getShortDesc() {
		return $this->short_desc;
	}

	public function setShortDesc($short_desc) {
		$this->short_desc = $short_desc;
	}

	public function __construct() {
		echo "ky";
	}

}

Class noUserException extends \Exception{}

Class userAccessException extends \Exception{}


