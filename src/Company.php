<?php
namespace Company;

class Company
{
	protected int $id;

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
}

?>