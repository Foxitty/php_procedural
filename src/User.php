<?php
namespace User;

class User
{
	private $db;

	public function g($ids)
	{
		if (empty($ids)) {
			return [];
		}

		$ids = array_map('intval', $ids);
		$idList = implode(',', $ids);

		$result = $this->db->q('SELECT id, username FROM user WHERE id IN (' . $idList . ')');

		$users = [];
		foreach ($result as $row) {
			$users[] = $row['username'];
		}

		return $users;
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