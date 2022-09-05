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
	 * @throws Exception
	 * @api
	 */
	public static function newOperation(string $date, string $description, string $password): void {
		if ($password !== MISSSION_PASSWORD) {
			MyError::Register('password', 'Passwort falsch');
		} else {
			if (strlen(trim($description)) === 0) {
				MyError::Register('description', 'Bitte einen Einsatz angeben');
			}
			if (strlen($date) === 0 || !preg_match('/^\d{4}-\d{2}-\d{2}$/',$date)) {
				MyError::Register('date', 'Bitte ein korrektes Datum angeben');
			}
			if (MyError::Count() === 0) {
				$mission = new self;
				$mission->Date = new QDateTime($date);
				$mission->Description = trim($description);
				$mission->Save();
			}
		}
	}

	/**
	 * @api
	 * @return stdClass[]
	 * @throws Exception
	 */
	public static function loadOperationNames(){
		$query_result = self::GetDatabase()->Query(
			"
			SELECT DISTINCT
				description
			FROM
				operation
			ORDER BY
				description
			"
		);
		$result = [];
		while ($row = $query_result->FetchArray()) {
		$result[] = $row['description'];
		}
		return  $result;
	}
}