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

}
