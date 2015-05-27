<?php
require(__DATAGEN_CLASSES__ . '/MonthlyServiceGen.class.php');

class MonthlyService extends MonthlyServiceGen {

	/**
	 * @api
	 * @return stdClass[]
	 * @throws Exception
	 */
	public static function LoadCurrentlyOnDuty(){
		$aryResult = array();
		foreach(Person::QueryArray(QQ::Equal(QQN::Person()->MonthlyService->Month,strftime("%Y%m"))) as $Person) $aryResult[] = $Person->ToStdClass(true);
		return $aryResult;
	}

}