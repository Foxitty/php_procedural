<?php
namespace Department;

require_once './User.php';

class Department
{
	private User\User $user;

	public function __construct()
	{
		$this->user = new User\User(); // @todo fixme
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
}
?>