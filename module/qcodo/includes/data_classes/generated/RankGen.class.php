<?php
	/**
	 * The abstract RankGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Rank subclass which
	 * extends this RankGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Rank class.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage GeneratedDataObjects
	 * @property integer $RankId the value for intRankId (Read-Only PK)
	 * @property string $Name the value for strName (Not Null)
	 * @property integer $Sort the value for intSort (Not Null)
	 * @property string $Sex the value for strSex (Not Null)
	 * @property Person $_Person the value for the private _objPerson (Read-Only) if set due to an expansion on the person.rank_id reverse relationship
	 * @property Person[] $_PersonArray the value for the private _objPersonArray (Read-Only) if set due to an ExpandAsArray on the person.rank_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RankGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column rank.rank_id
		 * @var integer intRankId
		 */
		protected $intRankId;
		const RankIdDefault = null;


		/**
		 * Protected member variable that maps to the database column rank.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column rank.sort
		 * @var integer intSort
		 */
		protected $intSort;
		const SortDefault = null;


		/**
		 * Protected member variable that maps to the database column rank.sex
		 * @var string strSex
		 */
		protected $strSex;
		const SexMaxLength = 2;
		const SexDefault = null;


		/**
		 * Private member variable that stores a reference to a single Person object
		 * (of type Person), if this Rank object was restored with
		 * an expansion on the person association table.
		 * @var Person _objPerson;
		 */
		private $_objPerson;

		/**
		 * Private member variable that stores a reference to an array of Person objects
		 * (of type Person[]), if this Rank object was restored with
		 * an ExpandAsArray on the person association table.
		 * @var Person[] _objPersonArray;
		 */
		private $_objPersonArray = array();

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
		 * Load a Rank from PK Info
		 * @param integer $intRankId
		 * @return Rank
		 */
		public static function Load($intRankId) {
			// Use QuerySingle to Perform the Query
			return Rank::QuerySingle(
				QQ::Equal(QQN::Rank()->RankId, $intRankId)
			);
		}

		/**
		 * Load all Ranks
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Rank[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Rank::QueryArray to perform the LoadAll query
			try {
				return Rank::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Ranks
		 * @return int
		 */
		public static function CountAll() {
			// Call Rank::QueryCount to perform the CountAll query
			return Rank::QueryCount(QQ::All());
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
			$objDatabase = Rank::GetDatabase();

			// Create/Build out the QueryBuilder object with Rank-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'rank');
			Rank::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('rank');

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
		 * Static Qcodo Query method to query for a single Rank object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Rank the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Rank::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Rank object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Rank::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Rank::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Rank objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Rank[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Rank::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Rank::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Rank::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Rank objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Rank::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Rank::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'rank_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Rank-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Rank::GetSelectFields($objQueryBuilder);
				Rank::GetFromFields($objQueryBuilder);

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
			return Rank::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Rank
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'rank';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'rank_id', $strAliasPrefix . 'rank_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'sort', $strAliasPrefix . 'sort');
			$objBuilder->AddSelectItem($strTableName, 'sex', $strAliasPrefix . 'sex');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Rank from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Rank::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Rank
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'rank_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intRankId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'rank__';


				$strAlias = $strAliasPrefix . 'person__person_id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPersonArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPersonArray[$intPreviousChildItemCount - 1];
						$objChildItem = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPersonArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPersonArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'rank__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Rank object
			$objToReturn = new Rank();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'rank_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'rank_id'] : $strAliasPrefix . 'rank_id';
			$objToReturn->intRankId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'sort', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sort'] : $strAliasPrefix . 'sort';
			$objToReturn->intSort = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'sex', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sex'] : $strAliasPrefix . 'sex';
			$objToReturn->strSex = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'rank__';




			// Check for Person Virtual Binding
			$strAlias = $strAliasPrefix . 'person__person_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPersonArray[] = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPerson = Person::InstantiateDbRow($objDbRow, $strAliasPrefix . 'person__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Ranks from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Rank[]
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
					$objItem = Rank::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Rank::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Rank object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Rank next row resulting from the query
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
			return Rank::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Rank object,
		 * by RankId Index(es)
		 * @param integer $intRankId
		 * @return Rank
		*/
		public static function LoadByRankId($intRankId, $objOptionalClauses = null) {
			return Rank::QuerySingle(
				QQ::Equal(QQN::Rank()->RankId, $intRankId)
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
		 * Save this Rank
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `rank` (
							`name`,
							`sort`,
							`sex`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intSort) . ',
							' . $objDatabase->SqlVariable($this->strSex) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intRankId = $objDatabase->InsertId('rank', 'rank_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`rank`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`sort` = ' . $objDatabase->SqlVariable($this->intSort) . ',
							`sex` = ' . $objDatabase->SqlVariable($this->strSex) . '
						WHERE
							`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '
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
		 * Delete this Rank
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intRankId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Rank with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`rank`
				WHERE
					`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Ranks
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`rank`');
		}

		/**
		 * Truncate rank table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `rank`');
		}

		/**
		 * Reload this Rank from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Rank object.');

			// Reload the Object
			$objReloaded = Rank::Load($this->intRankId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->intSort = $objReloaded->intSort;
			$this->strSex = $objReloaded->strSex;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Rank::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `rank` (
					`rank_id`,
					`name`,
					`sort`,
					`sex`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intRankId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->intSort) . ',
					' . $objDatabase->SqlVariable($this->strSex) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intRankId
		 * @return Rank[]
		 */
		public static function GetJournalForId($intRankId) {
			$objDatabase = Rank::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM rank WHERE rank_id = ' .
				$objDatabase->SqlVariable($intRankId) . ' ORDER BY __sys_date');

			return Rank::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Rank[]
		 */
		public function GetJournal() {
			return Rank::GetJournalForId($this->intRankId);
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
				case 'RankId':
					// Gets the value for intRankId (Read-Only PK)
					// @return integer
					return $this->intRankId;

				case 'Name':
					// Gets the value for strName (Not Null)
					// @return string
					return $this->strName;

				case 'Sort':
					// Gets the value for intSort (Not Null)
					// @return integer
					return $this->intSort;

				case 'Sex':
					// Gets the value for strSex (Not Null)
					// @return string
					return $this->strSex;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Person':
					// Gets the value for the private _objPerson (Read-Only)
					// if set due to an expansion on the person.rank_id reverse relationship
					// @return Person
					return $this->_objPerson;

				case '_PersonArray':
					// Gets the value for the private _objPersonArray (Read-Only)
					// if set due to an ExpandAsArray on the person.rank_id reverse relationship
					// @return Person[]
					return (array) $this->_objPersonArray;


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

				case 'Sort':
					// Sets the value for intSort (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intSort = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

			
		
		// Related Objects' Methods for Person
		//-------------------------------------------------------------------

		/**
		 * Gets all associated People as an array of Person objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Person[]
		*/ 
		public function GetPersonArray($objOptionalClauses = null) {
			if ((is_null($this->intRankId)))
				return array();

			try {
				return Person::LoadArrayByRankId($this->intRankId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated People
		 * @return int
		*/ 
		public function CountPeople() {
			if ((is_null($this->intRankId)))
				return 0;

			return Person::CountByRankId($this->intRankId);
		}

		/**
		 * Associates a Person
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function AssociatePerson(Person $objPerson) {
			if ((is_null($this->intRankId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePerson on this unsaved Rank.');
			if ((is_null($objPerson->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePerson on this Rank with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->PersonId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPerson->RankId = $this->intRankId;
				$objPerson->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Person
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function UnassociatePerson(Person $objPerson) {
			if ((is_null($this->intRankId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this unsaved Rank.');
			if ((is_null($objPerson->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this Rank with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`rank_id` = null
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->PersonId) . ' AND
					`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPerson->RankId = null;
				$objPerson->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all People
		 * @return void
		*/ 
		public function UnassociateAllPeople() {
			if ((is_null($this->intRankId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this unsaved Rank.');

			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Person::LoadArrayByRankId($this->intRankId) as $objPerson) {
					$objPerson->RankId = null;
					$objPerson->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person`
				SET
					`rank_id` = null
				WHERE
					`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '
			');
		}

		/**
		 * Deletes an associated Person
		 * @param Person $objPerson
		 * @return void
		*/ 
		public function DeleteAssociatedPerson(Person $objPerson) {
			if ((is_null($this->intRankId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this unsaved Rank.');
			if ((is_null($objPerson->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this Rank with an unsaved Person.');

			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`person_id` = ' . $objDatabase->SqlVariable($objPerson->PersonId) . ' AND
					`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPerson->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated People
		 * @return void
		*/ 
		public function DeleteAllPeople() {
			if ((is_null($this->intRankId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePerson on this unsaved Rank.');

			// Get the Database Object for this Class
			$objDatabase = Rank::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Person::LoadArrayByRankId($this->intRankId) as $objPerson) {
					$objPerson->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person`
				WHERE
					`rank_id` = ' . $objDatabase->SqlVariable($this->intRankId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Rank"><sequence>';
			$strToReturn .= '<element name="RankId" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Sort" type="xsd:int"/>';
			$strToReturn .= '<element name="Sex" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Rank', $strComplexTypeArray)) {
				$strComplexTypeArray['Rank'] = Rank::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Rank::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Rank();
			if (property_exists($objSoapObject, 'RankId'))
				$objToReturn->intRankId = $objSoapObject->RankId;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Sort'))
				$objToReturn->intSort = $objSoapObject->Sort;
			if (property_exists($objSoapObject, 'Sex'))
				$objToReturn->strSex = $objSoapObject->Sex;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Rank::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQNode $RankId
	 * @property-read QQNode $Name
	 * @property-read QQNode $Sort
	 * @property-read QQNode $Sex
	 * @property-read QQReverseReferenceNodePerson $Person
	 */
	class QQNodeRank extends QQNode {
		protected $strTableName = 'rank';
		protected $strPrimaryKey = 'rank_id';
		protected $strClassName = 'Rank';
		public function __get($strName) {
			switch ($strName) {
				case 'RankId':
					return new QQNode('rank_id', 'RankId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Sort':
					return new QQNode('sort', 'Sort', 'integer', $this);
				case 'Sex':
					return new QQNode('sex', 'Sex', 'string', $this);
				case 'Person':
					return new QQReverseReferenceNodePerson($this, 'person', 'reverse_reference', 'rank_id');

				case '_PrimaryKeyNode':
					return new QQNode('rank_id', 'RankId', 'integer', $this);
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
	 * @property-read QQNode $RankId
	 * @property-read QQNode $Name
	 * @property-read QQNode $Sort
	 * @property-read QQNode $Sex
	 * @property-read QQReverseReferenceNodePerson $Person
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRank extends QQReverseReferenceNode {
		protected $strTableName = 'rank';
		protected $strPrimaryKey = 'rank_id';
		protected $strClassName = 'Rank';
		public function __get($strName) {
			switch ($strName) {
				case 'RankId':
					return new QQNode('rank_id', 'RankId', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Sort':
					return new QQNode('sort', 'Sort', 'integer', $this);
				case 'Sex':
					return new QQNode('sex', 'Sex', 'string', $this);
				case 'Person':
					return new QQReverseReferenceNodePerson($this, 'person', 'reverse_reference', 'rank_id');

				case '_PrimaryKeyNode':
					return new QQNode('rank_id', 'RankId', 'integer', $this);
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