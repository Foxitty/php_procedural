<?php
namespace Department;

require_once './User.php';

class Department
{
	private $db;

	private User\User $user;

	public function __construct($db)
	{
		$this->setDb($db);
		$this->user = new User\User();
	}

	public function getLargestDepartmentsForUsers()
	{
		$query = '
            SELECT ud.user, d.name AS department_name, MAX(d.employees) AS max_employees
            FROM user_department ud
            INNER JOIN department d ON ud.department = d.id
            GROUP BY ud.user;
        ';

		$result = $this->db->q($query);

		$largestDepartments = [];
		foreach ($result as $row) {
			$largestDepartments[$row['user']] = [
				'department_name' => $row['department_name'],
				'max_employees' => $row['max_employees']
			];
		}

		return $largestDepartments;
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