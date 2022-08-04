<?php

require(__DATAGEN_CLASSES__ . '/TeamGen.class.php');

class Team extends TeamGen {

	/**
	 * @param string $name
	 * @param array $members
	 * @throws QCallerException
	 * @api
	 */
	public static function Create(string $name, array $members): void {

		$_name = trim($name);
		if (strlen($_name) === 0) {
			MyError::Register('name', 'Bitte den Namen des Teams angeben');
		}

		if (self::QueryCount(QQ::Equal(QQN::Team()->Name, $_name)) > 0) {
			MyError::Register('name', 'Es existiert bereits ein Team mit diesem Namen');
		}

		$_members = array_filter(array_map('trim', $members), 'strlen');
		if (count($_members) < 4 || 9 < count($_members)) {
			MyError::Register('members', 'Bitte mindestens vier und maximal neun Teilnehmer angeben');
		}

		if (MyError::Count() === 0) {
			$team = new self;
			$team->Name = $_name;
			$team->Members = json_encode($_members);
			$team->CreatedAt = QDateTime::Now();
			$team->Save();
		}

	}

	/**
	 * Loads a list of all registered teams
	 * @api
	 * @return stdClass[]
	 */
	public static function ListAll(): array {
		$query_result = self::GetDatabase()->Query(
			"
			SELECT
				team.id, team.name, team.members, COALESCE(SUM(amount), 0) AS amount, team.created_at
			FROM
				team
				LEFT JOIN booking ON team.id = booking.team_id
			GROUP BY
				team.id, team.name
			ORDER BY
				team.name
			"
		);
		$result = [];
		while ($row = $query_result->FetchArray()) {
			$result[] = [
				'id' => intval($row['id']),
				'name' => $row['name'],
				'members' => json_decode($row['members']),
				'amount' => intval($row['amount']),
				'created_at' => date('c', strtotime($row['created_at']))
			];
		}
		return  $result;
	}

	/**
	 * Books $amount beverages onto team with id $id
	 * @api
	 * @param int $id
	 * @param int $amount
	 * @throws QCallerException
	 */
	public static function Book(int $id, int $amount) {
		$team = self::Load($id);
		if ($team === null) {
			MyError::Register('id', sprintf('Es existiert kein Team mit der Id „%d“', $id));
		} else {
			$booking = new Booking();
			$booking->TeamId = $id;
			$booking->Amount = $amount;
			$booking->CreatedAt = QDateTime::Now();
			$booking->Save();
		}
	}

}
