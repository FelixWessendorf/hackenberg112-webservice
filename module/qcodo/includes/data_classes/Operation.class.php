<?php
require(__DATAGEN_CLASSES__ . '/OperationGen.class.php');

class Operation extends OperationGen {

	/**
	 * @api
	 * @return stdClass[]
	 * @throws Exception
	 */
	public static function LoadLatest5(){
		$aryLast5 = array();
		foreach(Operation::QueryArray(QQ::All(),array(QQ::OrderBy(QQN::Operation()->Date,"DESC"),QQ::LimitInfo(5))) as $Operation) $aryLast5[] = $Operation->ToStdClass();
		return $aryLast5;
	}

	/**
	 * @api
	 * @return stdClass[]
	 * @throws QCallerException
	 */
	public static function LoadOperations(){
		$aryOperations = array();
		foreach(Operation::QueryArray(QQ::All(),QQ::OrderBy(QQN::Operation()->Date,"DESC")) as $Operation) $aryOperations[] = $Operation->ToStdClass();
		return $aryOperations;
	}

	/**
	 * @return stdClass
	 */
	public function ToStdClass(){
		$stdOperation = new stdClass();
		$stdOperation->operationId = $this->OperationId;
		$stdOperation->date = $this->Date->getTimestamp();
		$stdOperation->description = $this->Description;
		return $stdOperation;
	}
	/**
	 * @param string $date
	 * @param string $description
	 * @param string $password
	 * @throws QCallerException
	 * @api
	 */

	public static function newMission(string $date, string $description, string $password): void {
		if ($password !== MISSSION_PASSWORD) {
			MyError::Register('password', 'Passwort falsch');
		} else {
			$_description = trim($description);
			if (strlen($_description) === 0) {
				MyError::Register('description', 'Bitte einen Einsatz angeben');
			}
			if (strlen($date) === 0) {
				MyError::Register('date', 'Bitte ein Datum angeben');
			}
			if (MyError::Count() === 0) {
				$mission = new self;
				$mission->Date = new QDateTime($date);
				$mission->Description = $_description;
				$mission->Save();
			}
		}
	}
}