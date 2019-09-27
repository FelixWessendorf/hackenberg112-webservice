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

}