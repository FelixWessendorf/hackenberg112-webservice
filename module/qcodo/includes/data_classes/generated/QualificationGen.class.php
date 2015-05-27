<?php
	/**
	 * The abstract QualificationGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Qualification subclass which
	 * extends this QualificationGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Qualification class.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage GeneratedDataObjects
	 * @property integer $QualificationId the value for intQualificationId (Read-Only PK)
	 * @property string $Name the value for strName (Not Null)
	 * @property PersonHasQualification $_PersonHasQualification the value for the private _objPersonHasQualification (Read-Only) if set due to an expansion on the person_has_qualification.qualification_id reverse relationship
	 * @property PersonHasQualification[] $_PersonHasQualificationArray the value for the private _objPersonHasQualificationArray (Read-Only) if set due to an ExpandAsArray on the person_has_qualification.qualification_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class QualificationGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column qualification.qualification_id
		 * @var integer intQualificationId
		 */
		protected $intQualificationId;
		const QualificationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column qualification.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Private member variable that stores a reference to a single PersonHasQualification object
		 * (of type PersonHasQualification), if this Qualification object was restored with
		 * an expansion on the person_has_qualification association table.
		 * @var PersonHasQualification _objPersonHasQualification;
		 */
		private $_objPersonHasQualification;

		/**
		 * Private member variable that stores a reference to an array of PersonHasQualification objects
		 * (of type PersonHasQualification[]), if this Qualification object was restored with
		 * an ExpandAsArray on the person_has_qualification association table.
		 * @var PersonHasQualification[] _objPersonHasQualificationArray;
		 */
		private $_objPersonHasQualificationArray = array();

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
		 * Load a Qualification from PK Info
		 * @param integer $intQualificationId
		 * @return Qualification
		 */
		public static function Load($intQualificationId) {
			// Use QuerySingle to Perform the Query
			return Qualification::QuerySingle(
				QQ::Equal(QQN::Qualification()->QualificationId, $intQualificationId)
			);
		}

		/**
		 * Load all Qualifications
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Qualification[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Qualification::QueryArray to perform the LoadAll query
			try {
				return Qualification::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Qualifications
		 * @return int
		 */
		public static function CountAll() {
			// Call Qualification::QueryCount to perform the CountAll query
			return Qualification::QueryCount(QQ::All());
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
			$objDatabase = Qualification::GetDatabase();

			// Create/Build out the QueryBuilder object with Qualification-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'qualification');
			Qualification::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('qualification');

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
		 * Static Qcodo Query method to query for a single Qualification object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Qualification the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Qualification::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Qualification object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Qualification::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Qualification::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Qualification objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Qualification[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Qualification::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Qualification::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Qualification::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Qualification objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Qualification::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Qualification::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'qualification_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Qualification-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Qualification::GetSelectFields($objQueryBuilder);
				Qualification::GetFromFields($objQueryBuilder);

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
			return Qualification::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Qualification
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'qualification';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'qualification_id', $strAliasPrefix . 'qualification_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Qualification from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Qualification::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Qualification
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'qualification_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intQualificationId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'qualification__';


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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'qualification__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Qualification object
			$objToReturn = new Qualification();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'qualification_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'qualification_id'] : $strAliasPrefix . 'qualification_id';
			$objToReturn->intQualificationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'qualification__';




			// Check for PersonHasQualification Virtual Binding
			$strAlias = $strAliasPrefix . 'personhasqualification__person_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonHasQualificationArray[] = PersonHasQualification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personhasqualification__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPersonHasQualification = PersonHasQualification::InstantiateDbRow($objDbRow, $strAliasPrefix . 'personhasqualification__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Qualifications from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Qualification[]
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
					$objItem = Qualification::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Qualification::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Qualification object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Qualification next row resulting from the query
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
			return Qualification::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Qualification object,
		 * by QualificationId Index(es)
		 * @param integer $intQualificationId
		 * @return Qualification
		*/
		public static function LoadByQualificationId($intQualificationId, $objOptionalClauses = null) {
			return Qualification::QuerySingle(
				QQ::Equal(QQN::Qualification()->QualificationId, $intQualificationId)
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
		 * Save this Qualification
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `qualification` (
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intQualificationId = $objDatabase->InsertId('qualification', 'qualification_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`qualification`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . '
						WHERE
							`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '
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
		 * Delete this Qualification
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intQualificationId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Qualification with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`qualification`
				WHERE
					`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Qualifications
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`qualification`');
		}

		/**
		 * Truncate qualification table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `qualification`');
		}

		/**
		 * Reload this Qualification from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Qualification object.');

			// Reload the Object
			$objReloaded = Qualification::Load($this->intQualificationId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Qualification::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `qualification` (
					`qualification_id`,
					`name`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intQualificationId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intQualificationId
		 * @return Qualification[]
		 */
		public static function GetJournalForId($intQualificationId) {
			$objDatabase = Qualification::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM qualification WHERE qualification_id = ' .
				$objDatabase->SqlVariable($intQualificationId) . ' ORDER BY __sys_date');

			return Qualification::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Qualification[]
		 */
		public function GetJournal() {
			return Qualification::GetJournalForId($this->intQualificationId);
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
				case 'QualificationId':
					// Gets the value for intQualificationId (Read-Only PK)
					// @return integer
					return $this->intQualificationId;

				case 'Name':
					// Gets the value for strName (Not Null)
					// @return string
					return $this->strName;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PersonHasQualification':
					// Gets the value for the private _objPersonHasQualification (Read-Only)
					// if set due to an expansion on the person_has_qualification.qualification_id reverse relationship
					// @return PersonHasQualification
					return $this->_objPersonHasQualification;

				case '_PersonHasQualificationArray':
					// Gets the value for the private _objPersonHasQualificationArray (Read-Only)
					// if set due to an ExpandAsArray on the person_has_qualification.qualification_id reverse relationship
					// @return PersonHasQualification[]
					return (array) $this->_objPersonHasQualificationArray;


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
				case 'Name':
					// Sets the value for strName (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for PersonHasQualification
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PersonHasQualifications as an array of PersonHasQualification objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PersonHasQualification[]
		*/ 
		public function GetPersonHasQualificationArray($objOptionalClauses = null) {
			if ((is_null($this->intQualificationId)))
				return array();

			try {
				return PersonHasQualification::LoadArrayByQualificationId($this->intQualificationId, $objOptionalClauses);
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
			if ((is_null($this->intQualificationId)))
				return 0;

			return PersonHasQualification::CountByQualificationId($this->intQualificationId);
		}

		/**
		 * Associates a PersonHasQualification
		 * @param PersonHasQualification $objPersonHasQualification
		 * @return void
		*/ 
		public function AssociatePersonHasQualification(PersonHasQualification $objPersonHasQualification) {
			if ((is_null($this->intQualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonHasQualification on this unsaved Qualification.');
			if ((is_null($objPersonHasQualification->PersonId)) || (is_null($objPersonHasQualification->QualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonHasQualification on this Qualification with an unsaved PersonHasQualification.');

			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_has_qualification`
				SET
					`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->PersonId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->QualificationId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPersonHasQualification->QualificationId = $this->intQualificationId;
				$objPersonHasQualification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PersonHasQualification
		 * @param PersonHasQualification $objPersonHasQualification
		 * @return void
		*/ 
		public function UnassociatePersonHasQualification(PersonHasQualification $objPersonHasQualification) {
			if ((is_null($this->intQualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Qualification.');
			if ((is_null($objPersonHasQualification->PersonId)) || (is_null($objPersonHasQualification->QualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this Qualification with an unsaved PersonHasQualification.');

			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_has_qualification`
				SET
					`qualification_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->PersonId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->QualificationId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPersonHasQualification->QualificationId = null;
				$objPersonHasQualification->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PersonHasQualifications
		 * @return void
		*/ 
		public function UnassociateAllPersonHasQualifications() {
			if ((is_null($this->intQualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Qualification.');

			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonHasQualification::LoadArrayByQualificationId($this->intQualificationId) as $objPersonHasQualification) {
					$objPersonHasQualification->QualificationId = null;
					$objPersonHasQualification->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_has_qualification`
				SET
					`qualification_id` = null
				WHERE
					`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '
			');
		}

		/**
		 * Deletes an associated PersonHasQualification
		 * @param PersonHasQualification $objPersonHasQualification
		 * @return void
		*/ 
		public function DeleteAssociatedPersonHasQualification(PersonHasQualification $objPersonHasQualification) {
			if ((is_null($this->intQualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Qualification.');
			if ((is_null($objPersonHasQualification->PersonId)) || (is_null($objPersonHasQualification->QualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this Qualification with an unsaved PersonHasQualification.');

			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_has_qualification`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->PersonId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($objPersonHasQualification->QualificationId) . ' AND
					`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '
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
			if ((is_null($this->intQualificationId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonHasQualification on this unsaved Qualification.');

			// Get the Database Object for this Class
			$objDatabase = Qualification::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonHasQualification::LoadArrayByQualificationId($this->intQualificationId) as $objPersonHasQualification) {
					$objPersonHasQualification->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_has_qualification`
				WHERE
					`qualification_id` = ' . $objDatabase->SqlVariable($this->intQualificationId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Qualification"><sequence>';
			$strToReturn .= '<element name="QualificationId" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Qualification', $strComplexTypeArray)) {
				$strComplexTypeArray['Qualification'] = Qualification::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Qualification::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Qualification();
			if (property_exists($objSoapObject, 'QualificationId'))
				$objToReturn->intQualificationId = $objSoapObject->QualificationId;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Qualification::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $QualificationId
	 * @property-read QQNode $Name
	 * @property-read QQReverseReferenceNodePersonHasQualification $PersonHasQualification
	 */
	class QQNodeQualification extends QQNode {
		protected $strTableName = 'qualification';
		protected $strPrimaryKey = 'qualification_id';
		protected $strClassName = 'Qualification';
		public function __get($strName) {
			switch ($strName) {
				case 'QualificationId':
					return new QQNode('qualification_id', 'QualificationId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PersonHasQualification':
					return new QQReverseReferenceNodePersonHasQualification($this, 'personhasqualification', 'reverse_reference', 'qualification_id');

				case '_PrimaryKeyNode':
					return new QQNode('qualification_id', 'QualificationId', 'integer', $this);
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
	 * @property-read QQNode $QualificationId
	 * @property-read QQNode $Name
	 * @property-read QQReverseReferenceNodePersonHasQualification $PersonHasQualification
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeQualification extends QQReverseReferenceNode {
		protected $strTableName = 'qualification';
		protected $strPrimaryKey = 'qualification_id';
		protected $strClassName = 'Qualification';
		public function __get($strName) {
			switch ($strName) {
				case 'QualificationId':
					return new QQNode('qualification_id', 'QualificationId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'PersonHasQualification':
					return new QQReverseReferenceNodePersonHasQualification($this, 'personhasqualification', 'reverse_reference', 'qualification_id');

				case '_PrimaryKeyNode':
					return new QQNode('qualification_id', 'QualificationId', 'integer', $this);
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