<?php
	/**
	 * The abstract PersonGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Person subclass which
	 * extends this PersonGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Person class.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage GeneratedDataObjects
	 * @property integer $PersonId the value for intPersonId (Read-Only PK)
	 * @property string $Sex the value for strSex (Not Null)
	 * @property string $FirstName the value for strFirstName (Not Null)
	 * @property string $LastName the value for strLastName (Not Null)
	 * @property string $EMailAddress the value for strEMailAddress 
	 * @property QDateTime $DateOfBirth the value for dttDateOfBirth 
	 * @property QDateTime $DateOfEntry the value for dttDateOfEntry 
	 * @property integer $RankId the value for intRankId (Not Null)
	 * @property boolean $Active the value for blnActive (Not Null)
	 * @property Rank $Rank the value for the Rank object referenced by intRankId (Not Null)
	 * @property MonthlyService $_MonthlyService the value for the private _objMonthlyService (Read-Only) if set due to an expansion on the monthly_service.person_id reverse relationship
	 * @property MonthlyService[] $_MonthlyServiceArray the value for the private _objMonthlyServiceArray (Read-Only) if set due to an ExpandAsArray on the monthly_service.person_id reverse relationship
	 * @property PersonHasQualification $_PersonHasQualification the value for the private _objPersonHasQualification (Read-Only) if set due to an expansion on the person_has_qualification.person_id reverse relationship
	 * @property PersonHasQualification[] $_PersonHasQualificationArray the value for the private _objPersonHasQualificationArray (Read-Only) if set due to an ExpandAsArray on the person_has_qualification.person_id reverse relationship
	 * @property PersonInChargeForAppointment $_PersonInChargeForAppointment the value for the private _objPersonInChargeForAppointment (Read-Only) if set due to an expansion on the person_in_charge_for_appointment.person_id reverse relationship
	 * @property PersonInChargeForAppointment[] $_PersonInChargeForAppointmentArray the value for the private _objPersonInChargeForAppointmentArray (Read-Only) if set due to an ExpandAsArray on the person_in_charge_for_appointment.person_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class PersonGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column person.person_id
		 * @var integer intPersonId
		 */
		protected $intPersonId;
		const PersonIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.sex
		 * @var string strSex
		 */
		protected $strSex;
		const SexDefault = null;


		/**
		 * Protected member variable that maps to the database column person.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 255;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 255;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column person.e_mail_address
		 * @var string strEMailAddress
		 */
		protected $strEMailAddress;
		const EMailAddressMaxLength = 255;
		const EMailAddressDefault = null;


		/**
		 * Protected member variable that maps to the database column person.date_of_birth
		 * @var QDateTime dttDateOfBirth
		 */
		protected $dttDateOfBirth;
		const DateOfBirthDefault = null;


		/**
		 * Protected member variable that maps to the database column person.date_of_entry
		 * @var QDateTime dttDateOfEntry
		 */
		protected $dttDateOfEntry;
		const DateOfEntryDefault = null;


		/**
		 * Protected member variable that maps to the database column person.rank_id
		 * @var integer intRankId
		 */
		protected $intRankId;
		const RankIdDefault = null;


		/**
		 * Protected member variable that maps to the database column person.active
		 * @var boolean blnActive
		 */
		protected $blnActive;
		const ActiveDefault = null;


		/**
		 * Private member variable that stores a reference to a single MonthlyService object
		 * (of type MonthlyService), if this Person object was restored with
		 * an expansion on the monthly_service association table.
		 * @var MonthlyService _objMonthlyService;
		 */
		private $_objMonthlyService;

		/**
		 * Private member variable that stores a reference to an array of MonthlyService objects
		 * (of type MonthlyService[]), if this Person object was restored with
		 * an ExpandAsArray on the monthly_service association table.
		 * @var MonthlyService[] _objMonthlyServiceArray;
		 */
		private $_objMonthlyServiceArray = array();

		/**
		 * Private member variable that stores a reference to a single PersonHasQualification object
		 * (of type PersonHasQualification), if this Person object was restored with
		 * an expansion on the person_has_qualification association table.
		 * @var PersonHasQualification _objPersonHasQualification;
		 */
		private $_objPersonHasQualification;

		/**
		 * Private member variable that stores a reference to an array of PersonHasQualification objects
		 * (of type PersonHasQualification[]), if this Person object was restored with
		 * an ExpandAsArray on the person_has_qualification association table.
		 * @var PersonHasQualification[] _objPersonHasQualificationArray;
		 */
		private $_objPersonHasQualificationArray = array();

		/**
		 * Private member variable that stores a reference to a single PersonInChargeForAppointment object
		 * (of type PersonInChargeForAppointment), if this Person object was restored with
		 * an expansion on the person_in_charge_for_appointment association table.
		 * @var PersonInChargeForAppointment _objPersonInChargeForAppointment;
		 */
		private $_objPersonInChargeForAppointment;

		/**
		 * Private member variable that stores a reference to an array of PersonInChargeForAppointment objects
		 * (of type PersonInChargeForAppointment[]), if this Person object was restored with
		 * an ExpandAsArray on the person_in_charge_for_appointment association table.
		 * @var PersonInChargeForAppointment[] _objPersonInChargeForAppointmentArray;
		 */
		private $_objPersonInChargeForAppointmentArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column person.rank_id.
		 *
		 * NOTE: Always use the Rank property getter to correctly retrieve this Rank object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Rank objRank
		 */
		protected $objRank;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a Person from PK Info
		 * @param integer $intPersonId
		 * @return Person
		 */
		public static function Load($intPersonId) {
			// Use QuerySingle to Perform the Query
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->PersonId, $intPersonId)
			);
		}

		/**
		 * Load all People
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadAll query
			try {
				return Person::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all People
		 * @return int
		 */
		public static function CountAll() {
			// Call Person::QueryCount to perform the CountAll query
			return Person::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Create/Build out the QueryBuilder object with Person-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'person');
			Person::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('person');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single Person object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Person the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Person object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Person::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return Person::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Person objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Person[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of Person objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Person::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'person_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Person-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Person::GetSelectFields($objQueryBuilder);
				Person::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Person::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Person
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'person';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'person_id', $strAliasPrefix . 'person_id');
			$objBuilder->AddSelectItem($strTableName, 'sex', $strAliasPrefix . 'sex');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'e_mail_address', $strAliasPrefix . 'e_mail_address');
			$objBuilder->AddSelectItem($strTableName, 'date_of_birth', $strAliasPrefix . 'date_of_birth');
			$objBuilder->AddSelectItem($strTableName, 'date_of_entry', $strAliasPrefix . 'date_of_entry');
			$objBuilder->AddSelectItem($strTableName, 'rank_id', $strAliasPrefix . 'rank_id');
			$objBuilder->AddSelectItem($strTableName, 'active', $strAliasPrefix . 'active');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Person from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Person::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Person
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'person_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intPersonId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'person__';


				$strAlias = $strAliasPrefix . 'monthlyservice__month';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMonthlyServiceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMonthlyServiceArray[$intPreviousChildItemCount - 1];
						$objChildItem = MonthlyService::InstantiateDbRow($objDbRow, $strAliasPrefix . 'monthlyservice__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMonthlyServiceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMonthlyServiceArray[] = MonthlyService::InstantiateDbRow($objDbRow, $strAliasPrefix . 'monthlyservice__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'personhasqualification__person_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonHasQualificationArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonHasQualificationArray[$intPreviousChildItemCount - 1];
						$objChildItem = PersonHasQualification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personhasqualification__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonHasQualificationArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonHasQualificationArray[] = PersonHasQualification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personhasqualification__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'personinchargeforappointment__appointment_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonInChargeForAppointmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonInChargeForAppointmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = PersonInChargeForAppointment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personinchargeforappointment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonInChargeForAppointmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonInChargeForAppointmentArray[] = PersonInChargeForAppointment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personinchargeforappointment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'person__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Person object
			$objToReturn = new Person();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'person_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'person_id'] : $strAliasPrefix . 'person_id';
			$objToReturn->intPersonId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'sex', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sex'] : $strAliasPrefix . 'sex';
			$objToReturn->strSex = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'e_mail_address', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'e_mail_address'] : $strAliasPrefix . 'e_mail_address';
			$objToReturn->strEMailAddress = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_of_birth', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_of_birth'] : $strAliasPrefix . 'date_of_birth';
			$objToReturn->dttDateOfBirth = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_of_entry', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_of_entry'] : $strAliasPrefix . 'date_of_entry';
			$objToReturn->dttDateOfEntry = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'rank_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'rank_id'] : $strAliasPrefix . 'rank_id';
			$objToReturn->intRankId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'active', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'active'] : $strAliasPrefix . 'active';
			$objToReturn->blnActive = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'person__';

			// Check for Rank Early Binding
			$strAlias = $strAliasPrefix . 'rank_id__rank_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRank = Rank::InstantiateDbRow($objDbRow, $strAliasPrefix . 'rank_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for MonthlyService Virtual Binding
			$strAlias = $strAliasPrefix . 'monthlyservice__month';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMonthlyServiceArray[] = MonthlyService::InstantiateDbRow($objDbRow, $strAliasPrefix . 'monthlyservice__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMonthlyService = MonthlyService::InstantiateDbRow($objDbRow, $strAliasPrefix . 'monthlyservice__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PersonHasQualification Virtual Binding
			$strAlias = $strAliasPrefix . 'personhasqualification__person_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonHasQualificationArray[] = PersonHasQualification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personhasqualification__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonHasQualification = PersonHasQualification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personhasqualification__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PersonInChargeForAppointment Virtual Binding
			$strAlias = $strAliasPrefix . 'personinchargeforappointment__appointment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonInChargeForAppointmentArray[] = PersonInChargeForAppointment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personinchargeforappointment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonInChargeForAppointment = PersonInChargeForAppointment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personinchargeforappointment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of People from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Person[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Person::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Person::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Person object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Person next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return Person::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Person object,
		 * by PersonId Index(es)
		 * @param integer $intPersonId
		 * @return Person
		*/
		public static function LoadByPersonId($intPersonId, $objOptionalClauses = null) {
			return Person::QuerySingle(
				QQ::Equal(QQN::Person()->PersonId, $intPersonId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Person objects,
		 * by RankId Index(es)
		 * @param integer $intRankId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/
		public static function LoadArrayByRankId($intRankId, $objOptionalClauses = null) {
			// Call Person::QueryArray to perform the LoadArrayByRankId query
			try {
				return Person::QueryArray(
					QQ::Equal(QQN::Person()->RankId, $intRankId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count People
		 * by RankId Index(es)
		 * @param integer $intRankId
		 * @return int
		*/
		public static function CountByRankId($intRankId, $objOptionalClauses = null) {
			// Call Person::QueryCount to perform the CountByRankId query
			return Person::QueryCount(
				QQ::Equal(QQN::Person()->RankId, $intRankId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Person
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `person` (
							`sex`,
							`first_name`,
							`last_name`,
							`e_mail_address`,
							`date_of_birth`,
							`date_of_entry`,
							`rank_id`,
							`active`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strSex) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEMailAddress) . ',
							' . $objDatabase->SqlVariable($this->dttDateOfBirth) . ',
							' . $objDatabase->SqlVariable($this->dttDateOfEntry) . ',
							' . $objDatabase->SqlVariable($this->intRankId) . ',
							' . $objDatabase->SqlVariable($this->blnActive) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intPersonId = $objDatabase->InsertId('person', 'person_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`person`
						SET
							`sex` = ' . $objDatabase->SqlVariable($this->strSex) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`e_mail_address` = ' . $objDatabase->SqlVariable($this->strEMailAddress) . ',
							`date_of_birth` = ' . $objDatabase->SqlVariable($this->dttDateOfBirth) . ',
							`date_of_entry` = ' . $objDatabase->SqlVariable($this->dttDateOfEntry) . ',
							`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . ',
							`active` = ' . $objDatabase->SqlVariable($this->blnActive) . '
						WHERE
							`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Person
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Person with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all People
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`');
		}

		/**
		 * Truncate person table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `person`');
		}

		/**
		 * Reload this Person from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Person object.');

			// Reload the Object
			$objReloaded = Person::Load($this->intPersonId);

			// Update $this's local variables to match
			$this->strSex = $objReloaded->strSex;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strEMailAddress = $objReloaded->strEMailAddress;
			$this->dttDateOfBirth = $objReloaded->dttDateOfBirth;
			$this->dttDateOfEntry = $objReloaded->dttDateOfEntry;
			$this->RankId = $objReloaded->RankId;
			$this->blnActive = $objReloaded->blnActive;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Person::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `person` (
					`person_id`,
					`sex`,
					`first_name`,
					`last_name`,
					`e_mail_address`,
					`date_of_birth`,
					`date_of_entry`,
					`rank_id`,
					`active`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intPersonId) . ',
					' . $objDatabase->SqlVariable($this->strSex) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strEMailAddress) . ',
					' . $objDatabase->SqlVariable($this->dttDateOfBirth) . ',
					' . $objDatabase->SqlVariable($this->dttDateOfEntry) . ',
					' . $objDatabase->SqlVariable($this->intRankId) . ',
					' . $objDatabase->SqlVariable($this->blnActive) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intPersonId
		 * @return Person[]
		 */
		public static function GetJournalForId($intPersonId) {
			$objDatabase = Person::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM person WHERE person_id = ' .
				$objDatabase->SqlVariable($intPersonId) . ' ORDER BY __sys_date');

			return Person::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Person[]
		 */
		public function GetJournal() {
			return Person::GetJournalForId($this->intPersonId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'PersonId':
					// Gets the value for intPersonId (Read-Only PK)
					// @return integer
					return $this->intPersonId;

				case 'Sex':
					// Gets the value for strSex (Not Null)
					// @return string
					return $this->strSex;

				case 'FirstName':
					// Gets the value for strFirstName (Not Null)
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName (Not Null)
					// @return string
					return $this->strLastName;

				case 'EMailAddress':
					// Gets the value for strEMailAddress 
					// @return string
					return $this->strEMailAddress;

				case 'DateOfBirth':
					// Gets the value for dttDateOfBirth 
					// @return QDateTime
					return $this->dttDateOfBirth;

				case 'DateOfEntry':
					// Gets the value for dttDateOfEntry 
					// @return QDateTime
					return $this->dttDateOfEntry;

				case 'RankId':
					// Gets the value for intRankId (Not Null)
					// @return integer
					return $this->intRankId;

				case 'Active':
					// Gets the value for blnActive (Not Null)
					// @return boolean
					return $this->blnActive;


				///////////////////
				// Member Objects
				///////////////////
				case 'Rank':
					// Gets the value for the Rank object referenced by intRankId (Not Null)
					// @return Rank
					try {
						if ((!$this->objRank) && (!is_null($this->intRankId)))
							$this->objRank = Rank::Load($this->intRankId);
						return $this->objRank;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_MonthlyService':
					// Gets the value for the private _objMonthlyService (Read-Only)
					// if set due to an expansion on the monthly_service.person_id reverse relationship
					// @return MonthlyService
					return $this->_objMonthlyService;

				case '_MonthlyServiceArray':
					// Gets the value for the private _objMonthlyServiceArray (Read-Only)
					// if set due to an ExpandAsArray on the monthly_service.person_id reverse relationship
					// @return MonthlyService[]
					return (array) $this->_objMonthlyServiceArray;

				case '_PersonHasQualification':
					// Gets the value for the private _objPersonHasQualification (Read-Only)
					// if set due to an expansion on the person_has_qualification.person_id reverse relationship
					// @return PersonHasQualification
					return $this->_objPersonHasQualification;

				case '_PersonHasQualificationArray':
					// Gets the value for the private _objPersonHasQualificationArray (Read-Only)
					// if set due to an ExpandAsArray on the person_has_qualification.person_id reverse relationship
					// @return PersonHasQualification[]
					return (array) $this->_objPersonHasQualificationArray;

				case '_PersonInChargeForAppointment':
					// Gets the value for the private _objPersonInChargeForAppointment (Read-Only)
					// if set due to an expansion on the person_in_charge_for_appointment.person_id reverse relationship
					// @return PersonInChargeForAppointment
					return $this->_objPersonInChargeForAppointment;

				case '_PersonInChargeForAppointmentArray':
					// Gets the value for the private _objPersonInChargeForAppointmentArray (Read-Only)
					// if set due to an ExpandAsArray on the person_in_charge_for_appointment.person_id reverse relationship
					// @return PersonInChargeForAppointment[]
					return (array) $this->_objPersonInChargeForAppointmentArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Sex':
					// Sets the value for strSex (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSex = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					// Sets the value for strFirstName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'EMailAddress':
					// Sets the value for strEMailAddress 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEMailAddress = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateOfBirth':
					// Sets the value for dttDateOfBirth 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateOfBirth = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateOfEntry':
					// Sets the value for dttDateOfEntry 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateOfEntry = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RankId':
					// Sets the value for intRankId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objRank = null;
						return ($this->intRankId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Active':
					// Sets the value for blnActive (Not Null)
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnActive = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Rank':
					// Sets the value for the Rank object referenced by intRankId (Not Null)
					// @param Rank $mixValue
					// @return Rank
					if (is_null($mixValue)) {
						$this->intRankId = null;
						$this->objRank = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Rank object
						try {
							$mixValue = QType::Cast($mixValue, 'Rank');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Rank object
						if (is_null($mixValue->RankId))
							throw new QCallerException('Unable to set an unsaved Rank for this Person');

						// Update Local Member Variables
						$this->objRank = $mixValue;
						$this->intRankId = $mixValue->RankId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for MonthlyService
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MonthlyServices as an array of MonthlyService objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return MonthlyService[]
		*/ 
		public function GetMonthlyServiceArray($objOptionalClauses = null) {
			if ((is_null($this->intPersonId)))
				return array();

			try {
				return MonthlyService::LoadArrayByPersonId($this->intPersonId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MonthlyServices
		 * @return int
		*/ 
		public function CountMonthlyServices() {
			if ((is_null($this->intPersonId)))
				return 0;

			return MonthlyService::CountByPersonId($this->intPersonId);
		}

		/**
		 * Associates a MonthlyService
		 * @param MonthlyService $objMonthlyService
		 * @return void
		*/ 
		public function AssociateMonthlyService(MonthlyService $objMonthlyService) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMonthlyService on this unsaved Person.');
			if ((is_null($objMonthlyService->Month)) || (is_null($objMonthlyService->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMonthlyService on this Person with an unsaved MonthlyService.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`monthly_service`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
				WHERE
					`month` = ' . $objDatabase->SqlVariable($objMonthlyService->Month) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objMonthlyService->PersonId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objMonthlyService->PersonId = $this->intPersonId;
				$objMonthlyService->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a MonthlyService
		 * @param MonthlyService $objMonthlyService
		 * @return void
		*/ 
		public function UnassociateMonthlyService(MonthlyService $objMonthlyService) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMonthlyService on this unsaved Person.');
			if ((is_null($objMonthlyService->Month)) || (is_null($objMonthlyService->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMonthlyService on this Person with an unsaved MonthlyService.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`monthly_service`
				SET
					`person_id` = null
				WHERE
					`month` = ' . $objDatabase->SqlVariable($objMonthlyService->Month) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objMonthlyService->PersonId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objMonthlyService->PersonId = null;
				$objMonthlyService->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all MonthlyServices
		 * @return void
		*/ 
		public function UnassociateAllMonthlyServices() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMonthlyService on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (MonthlyService::LoadArrayByPersonId($this->intPersonId) as $objMonthlyService) {
					$objMonthlyService->PersonId = null;
					$objMonthlyService->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`monthly_service`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');
		}

		/**
		 * Deletes an associated MonthlyService
		 * @param MonthlyService $objMonthlyService
		 * @return void
		*/ 
		public function DeleteAssociatedMonthlyService(MonthlyService $objMonthlyService) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMonthlyService on this unsaved Person.');
			if ((is_null($objMonthlyService->Month)) || (is_null($objMonthlyService->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMonthlyService on this Person with an unsaved MonthlyService.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`monthly_service`
				WHERE
					`month` = ' . $objDatabase->SqlVariable($objMonthlyService->Month) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objMonthlyService->PersonId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objMonthlyService->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated MonthlyServices
		 * @return void
		*/ 
		public function DeleteAllMonthlyServices() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMonthlyService on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (MonthlyService::LoadArrayByPersonId($this->intPersonId) as $objMonthlyService) {
					$objMonthlyService->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`monthly_service`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');
		}

			
		
		// Related Objects' Methods for PersonHasQualification
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PersonHasQualifications as an array of PersonHasQualification objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PersonHasQualification[]
		*/ 
		public function GetPersonHasQualificationArray($objOptionalClauses = null) {
			if ((is_null($this->intPersonId)))
				return array();

			try {
				return PersonHasQualification::LoadArrayByPersonId($this->intPersonId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PersonHasQualifications
		 * @return int
		*/ 
		public function CountPersonHasQualifications() {
			if ((is_null($this->intPersonId)))
				return 0;

			return PersonHasQualification::CountByPersonId($this->intPersonId);
		}

		/**
		 * Associates a PersonHasQualification
		 * @param PersonHasQualification $objPersonHasQualification
		 * @return void
		*/ 
		public function AssociatePersonHasQualification(PersonHasQualification $objPersonHasQualification) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonHasQualification on this unsaved Person.');
			if ((is_null($objPersonHasQualification->PersonId)) || (is_null($objPersonHasQualification->QualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonHasQualification on this Person with an unsaved PersonHasQualification.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_has_qualification`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->PersonId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->QualificationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPersonHasQualification->PersonId = $this->intPersonId;
				$objPersonHasQualification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PersonHasQualification
		 * @param PersonHasQualification $objPersonHasQualification
		 * @return void
		*/ 
		public function UnassociatePersonHasQualification(PersonHasQualification $objPersonHasQualification) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Person.');
			if ((is_null($objPersonHasQualification->PersonId)) || (is_null($objPersonHasQualification->QualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this Person with an unsaved PersonHasQualification.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_has_qualification`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->PersonId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->QualificationId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPersonHasQualification->PersonId = null;
				$objPersonHasQualification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PersonHasQualifications
		 * @return void
		*/ 
		public function UnassociateAllPersonHasQualifications() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonHasQualification::LoadArrayByPersonId($this->intPersonId) as $objPersonHasQualification) {
					$objPersonHasQualification->PersonId = null;
					$objPersonHasQualification->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_has_qualification`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');
		}

		/**
		 * Deletes an associated PersonHasQualification
		 * @param PersonHasQualification $objPersonHasQualification
		 * @return void
		*/ 
		public function DeleteAssociatedPersonHasQualification(PersonHasQualification $objPersonHasQualification) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Person.');
			if ((is_null($objPersonHasQualification->PersonId)) || (is_null($objPersonHasQualification->QualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this Person with an unsaved PersonHasQualification.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_has_qualification`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->PersonId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->QualificationId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPersonHasQualification->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PersonHasQualifications
		 * @return void
		*/ 
		public function DeleteAllPersonHasQualifications() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonHasQualification::LoadArrayByPersonId($this->intPersonId) as $objPersonHasQualification) {
					$objPersonHasQualification->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_has_qualification`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');
		}

			
		
		// Related Objects' Methods for PersonInChargeForAppointment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PersonInChargeForAppointments as an array of PersonInChargeForAppointment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PersonInChargeForAppointment[]
		*/ 
		public function GetPersonInChargeForAppointmentArray($objOptionalClauses = null) {
			if ((is_null($this->intPersonId)))
				return array();

			try {
				return PersonInChargeForAppointment::LoadArrayByPersonId($this->intPersonId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PersonInChargeForAppointments
		 * @return int
		*/ 
		public function CountPersonInChargeForAppointments() {
			if ((is_null($this->intPersonId)))
				return 0;

			return PersonInChargeForAppointment::CountByPersonId($this->intPersonId);
		}

		/**
		 * Associates a PersonInChargeForAppointment
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment
		 * @return void
		*/ 
		public function AssociatePersonInChargeForAppointment(PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonInChargeForAppointment on this unsaved Person.');
			if ((is_null($objPersonInChargeForAppointment->AppointmentId)) || (is_null($objPersonInChargeForAppointment->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonInChargeForAppointment on this Person with an unsaved PersonInChargeForAppointment.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_in_charge_for_appointment`
				SET
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->AppointmentId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->PersonId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPersonInChargeForAppointment->PersonId = $this->intPersonId;
				$objPersonInChargeForAppointment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PersonInChargeForAppointment
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment
		 * @return void
		*/ 
		public function UnassociatePersonInChargeForAppointment(PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Person.');
			if ((is_null($objPersonInChargeForAppointment->AppointmentId)) || (is_null($objPersonInChargeForAppointment->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this Person with an unsaved PersonInChargeForAppointment.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_in_charge_for_appointment`
				SET
					`person_id` = null
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->AppointmentId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->PersonId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPersonInChargeForAppointment->PersonId = null;
				$objPersonInChargeForAppointment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PersonInChargeForAppointments
		 * @return void
		*/ 
		public function UnassociateAllPersonInChargeForAppointments() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonInChargeForAppointment::LoadArrayByPersonId($this->intPersonId) as $objPersonInChargeForAppointment) {
					$objPersonInChargeForAppointment->PersonId = null;
					$objPersonInChargeForAppointment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_in_charge_for_appointment`
				SET
					`person_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');
		}

		/**
		 * Deletes an associated PersonInChargeForAppointment
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment
		 * @return void
		*/ 
		public function DeleteAssociatedPersonInChargeForAppointment(PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Person.');
			if ((is_null($objPersonInChargeForAppointment->AppointmentId)) || (is_null($objPersonInChargeForAppointment->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this Person with an unsaved PersonInChargeForAppointment.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_in_charge_for_appointment`
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->AppointmentId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->PersonId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPersonInChargeForAppointment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PersonInChargeForAppointments
		 * @return void
		*/ 
		public function DeleteAllPersonInChargeForAppointments() {
			if ((is_null($this->intPersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Person::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonInChargeForAppointment::LoadArrayByPersonId($this->intPersonId) as $objPersonInChargeForAppointment) {
					$objPersonInChargeForAppointment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_in_charge_for_appointment`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($this->intPersonId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Person"><sequence>';
			$strToReturn .= '<element name="PersonId" type="xsd:int"/>';
			$strToReturn .= '<element name="Sex" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="EMailAddress" type="xsd:string"/>';
			$strToReturn .= '<element name="DateOfBirth" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="DateOfEntry" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Rank" type="xsd1:Rank"/>';
			$strToReturn .= '<element name="Active" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Person', $strComplexTypeArray)) {
				$strComplexTypeArray['Person'] = Person::GetSoapComplexTypeXml();
				Rank::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Person::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Person();
			if (property_exists($objSoapObject, 'PersonId'))
				$objToReturn->intPersonId = $objSoapObject->PersonId;
			if (property_exists($objSoapObject, 'Sex'))
				$objToReturn->strSex = $objSoapObject->Sex;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'EMailAddress'))
				$objToReturn->strEMailAddress = $objSoapObject->EMailAddress;
			if (property_exists($objSoapObject, 'DateOfBirth'))
				$objToReturn->dttDateOfBirth = new QDateTime($objSoapObject->DateOfBirth);
			if (property_exists($objSoapObject, 'DateOfEntry'))
				$objToReturn->dttDateOfEntry = new QDateTime($objSoapObject->DateOfEntry);
			if ((property_exists($objSoapObject, 'Rank')) &&
				($objSoapObject->Rank))
				$objToReturn->Rank = Rank::GetObjectFromSoapObject($objSoapObject->Rank);
			if (property_exists($objSoapObject, 'Active'))
				$objToReturn->blnActive = $objSoapObject->Active;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Person::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttDateOfBirth)
				$objObject->dttDateOfBirth = $objObject->dttDateOfBirth->__toString(QDateTime::FormatSoap);
			if ($objObject->dttDateOfEntry)
				$objObject->dttDateOfEntry = $objObject->dttDateOfEntry->__toString(QDateTime::FormatSoap);
			if ($objObject->objRank)
				$objObject->objRank = Rank::GetSoapObjectFromObject($objObject->objRank, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRankId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $PersonId
	 * @property-read QQNode $Sex
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $EMailAddress
	 * @property-read QQNode $DateOfBirth
	 * @property-read QQNode $DateOfEntry
	 * @property-read QQNode $RankId
	 * @property-read QQNodeRank $Rank
	 * @property-read QQNode $Active
	 * @property-read QQReverseReferenceNodeMonthlyService $MonthlyService
	 * @property-read QQReverseReferenceNodePersonHasQualification $PersonHasQualification
	 * @property-read QQReverseReferenceNodePersonInChargeForAppointment $PersonInChargeForAppointment
	 */
	class QQNodePerson extends QQNode {
		protected $strTableName = 'person';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'Person';
		public function __get($strName) {
			switch ($strName) {
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Sex':
					return new QQNode('sex', 'Sex', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'EMailAddress':
					return new QQNode('e_mail_address', 'EMailAddress', 'string', $this);
				case 'DateOfBirth':
					return new QQNode('date_of_birth', 'DateOfBirth', 'QDateTime', $this);
				case 'DateOfEntry':
					return new QQNode('date_of_entry', 'DateOfEntry', 'QDateTime', $this);
				case 'RankId':
					return new QQNode('rank_id', 'RankId', 'integer', $this);
				case 'Rank':
					return new QQNodeRank('rank_id', 'Rank', 'integer', $this);
				case 'Active':
					return new QQNode('active', 'Active', 'boolean', $this);
				case 'MonthlyService':
					return new QQReverseReferenceNodeMonthlyService($this, 'monthlyservice', 'reverse_reference', 'person_id');
				case 'PersonHasQualification':
					return new QQReverseReferenceNodePersonHasQualification($this, 'personhasqualification', 'reverse_reference', 'person_id');
				case 'PersonInChargeForAppointment':
					return new QQReverseReferenceNodePersonInChargeForAppointment($this, 'personinchargeforappointment', 'reverse_reference', 'person_id');

				case '_PrimaryKeyNode':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $PersonId
	 * @property-read QQNode $Sex
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $EMailAddress
	 * @property-read QQNode $DateOfBirth
	 * @property-read QQNode $DateOfEntry
	 * @property-read QQNode $RankId
	 * @property-read QQNodeRank $Rank
	 * @property-read QQNode $Active
	 * @property-read QQReverseReferenceNodeMonthlyService $MonthlyService
	 * @property-read QQReverseReferenceNodePersonHasQualification $PersonHasQualification
	 * @property-read QQReverseReferenceNodePersonInChargeForAppointment $PersonInChargeForAppointment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodePerson extends QQReverseReferenceNode {
		protected $strTableName = 'person';
		protected $strPrimaryKey = 'person_id';
		protected $strClassName = 'Person';
		public function __get($strName) {
			switch ($strName) {
				case 'PersonId':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				case 'Sex':
					return new QQNode('sex', 'Sex', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'EMailAddress':
					return new QQNode('e_mail_address', 'EMailAddress', 'string', $this);
				case 'DateOfBirth':
					return new QQNode('date_of_birth', 'DateOfBirth', 'QDateTime', $this);
				case 'DateOfEntry':
					return new QQNode('date_of_entry', 'DateOfEntry', 'QDateTime', $this);
				case 'RankId':
					return new QQNode('rank_id', 'RankId', 'integer', $this);
				case 'Rank':
					return new QQNodeRank('rank_id', 'Rank', 'integer', $this);
				case 'Active':
					return new QQNode('active', 'Active', 'boolean', $this);
				case 'MonthlyService':
					return new QQReverseReferenceNodeMonthlyService($this, 'monthlyservice', 'reverse_reference', 'person_id');
				case 'PersonHasQualification':
					return new QQReverseReferenceNodePersonHasQualification($this, 'personhasqualification', 'reverse_reference', 'person_id');
				case 'PersonInChargeForAppointment':
					return new QQReverseReferenceNodePersonInChargeForAppointment($this, 'personinchargeforappointment', 'reverse_reference', 'person_id');

				case '_PrimaryKeyNode':
					return new QQNode('person_id', 'PersonId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>