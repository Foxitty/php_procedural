<?php
require_once './User.php';
require_once './Department.php';
require_once './Company.php';

function setDb($object, $db)
{
	if ($object instanceof User\User || $object instanceof Department\Department || $object instanceof Company\Company) {
		$object->setDb($db);
	} else {
		throw new InvalidArgumentException('O objeto fornecido não é uma instância de User\User, Department\Department ou Company\Company.');
	}
}
?>