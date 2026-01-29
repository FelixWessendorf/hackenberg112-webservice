<?php
require(__DATAGEN_CLASSES__ . '/PersonGen.class.php');

class Person extends PersonGen {

	/**
	 * @api
	 * @param bool $bolIncludeInactive
	 * @return stdClass[]
	 * @throws Exception
	 */
	public static function ListAll($bolIncludeInactive=false){
		$aryResult = array();
		$Condition = $bolIncludeInactive ? QQ::All() : QQ::Equal(QQN::Person()->Active,true);
		foreach(Person::QueryArray($Condition,QQ::OrderBy(QQN::Person()->LastName)) as $Person) $aryResult[] = $Person->ToStdClass(true);
		return $aryResult;
	}

	/**
	 * @param bool $bolPublic
	 * @return stdClass
	 */
	public function ToStdClass($bolPublic=false){
		$stdPerson = new stdClass();
		$stdPerson->personId = $this->PersonId;
		$stdPerson->sex = $this->Sex;
		$stdPerson->firstName = $bolPublic ? substr($this->FirstName,0,1)."." : $this->FirstName;
		$stdPerson->lastName = $this->LastName;
		if(!$bolPublic) $stdPerson->eMailAddress = $this->EMailAddress;
		if(!$bolPublic) $stdPerson->dateOfBirth = is_null($this->DateOfBirth) ? null : $this->DateOfBirth->getTimestamp();
		if(!$bolPublic) $stdPerson->dateOfEntry = is_null($this->DateOfEntry) ? null : $this->DateOfEntry->getTimestamp();
		if(!$bolPublic) $stdPerson->active = $this->Active;
		$stdPerson->rank = $this->Rank->ToStdClass();
		return $stdPerson;
	}
	
	/**
	 * @api
	 * @return mixed[]
	 * @throws Exception
	 */
	public static function GetStatistics(){
		
		$QueryResult = Person::GetDatabase()->Query("select AVG(date_format(now(),'%Y')-date_format(date_of_birth, '%Y')-(date_format(now(),'%m%d')<date_format(date_of_birth,'%m%d'))) from person where active=1");
		$aryRow = $QueryResult->FetchRow();
		$fltAverageAge = floatval($aryRow[0]);
		
		$QueryResult = Person::GetDatabase()->Query("select AVG(date_format(now(),'%Y')-date_format(date_of_entry, '%Y')-(date_format(now(),'%m%d')<date_format(date_of_entry,'%m%d'))) from person where active=1");
		$aryRow = $QueryResult->FetchRow();
		$fltAverageTimeOnDuty = floatval($aryRow[0]);
		
		$QueryResult = Person::GetDatabase()->Query("select group_concat(name separator ' / ') from `rank` where sort=(select ROUND(AVG(sort)) from person join `rank` using(rank_id))");
		$aryRow = $QueryResult->FetchRow();
		$strAverageRankName = $aryRow[0];
		
		return array($fltAverageAge,$fltAverageTimeOnDuty,$strAverageRankName);
	
	}

}
