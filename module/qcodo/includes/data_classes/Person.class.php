<?php
require(__DATAGEN_CLASSES__ . '/PersonGen.class.php');

class Person extends PersonGen {

	/**
	 * @api
	 * @return stdClass[]
	 * @throws Exception
	 */
	public static function ListAll(){
		$aryResult = array();
		foreach(Person::QueryArray(QQ::All(),QQ::OrderBy(QQN::Person()->LastName)) as $Person) $aryResult[] = $Person->ToStdClass(true);
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

}