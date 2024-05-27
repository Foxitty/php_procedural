<?php
namespace Company;

class Company
{
	protected int $id;
	protected int $db;

	public function __construct(int $id)
	{
		$this->id = $id;
	}

	public function greetings()
	{
		return "Greetings. Your ID is $this->id";
	}
}

class CompanyClient extends Company
{
	private int $registration;

	public function __construct(int $id, int $registration)
	{
		parent::__construct($id);
		$this->registration = $registration;
	}

	public function greetings()
	{
		return "Greetings. Your ID is $this->id and your registration number is $this->registration.";
	}
	public function setDb($db)
	{
		if (!$db || $db->isClosed()) {
			return false;
		}

		if ($db->debug) {
			$db->setGeneralLog('on');
			error_log($db);
		}

		if ($db->profiling) {
			$db->setSlowLog('on');
		}

		$this->db = $db;
	}
}

?>