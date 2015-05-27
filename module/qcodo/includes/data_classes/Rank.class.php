<?php
require(__DATAGEN_CLASSES__ . '/RankGen.class.php');

class Rank extends RankGen {

	/**
	 * @return stdClass
	 */
	public function ToStdClass(){
		$stdRank = new stdClass();
		$stdRank->rankId = $this->RankId;
		$stdRank->name = $this->Name;
		$stdRank->sort = $this->Sort;
		$stdRank->sex = $this->Sex;
		return $stdRank;
	}

}