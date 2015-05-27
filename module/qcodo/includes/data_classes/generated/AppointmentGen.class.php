<?php
	/**
	 * The abstract AppointmentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Appointment subclass which
	 * extends this AppointmentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Appointment class.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage GeneratedDataObjects
	 * @property integer $AppointmentId the value for intAppointmentId (Read-Only PK)
	 * @property QDateTime $Start the value for dttStart (Not Null)
	 * @property QDateTime $End the value for dttEnd 
	 * @property string $Description the value for strDescription (Not Null)
	 * @property string $Location the value for strLocation 
	 * @property string $AdditionalInformation the value for strAdditionalInformation 
	 * @property PersonInChargeForAppointment $_PersonInChargeForAppointment the value for the private _objPersonInChargeForAppointment (Read-Only) if set due to an expansion on the person_in_charge_for_appointment.appointment_id reverse relationship
	 * @property PersonInChargeForAppointment[] $_PersonInChargeForAppointmentArray the value for the private _objPersonInChargeForAppointmentArray (Read-Only) if set due to an ExpandAsArray on the person_in_charge_for_appointment.appointment_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AppointmentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column appointment.appointment_id
		 * @var integer intAppointmentId
		 */
		protected $intAppointmentId;
		const AppointmentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column appointment.start
		 * @var QDateTime dttStart
		 */
		protected $dttStart;
		const StartDefault = null;


		/**
		 * Protected member variable that maps to the database column appointment.end
		 * @var QDateTime dttEnd
		 */
		protected $dttEnd;
		const EndDefault = null;


		/**
		 * Protected member variable that maps to the database column appointment.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 255;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column appointment.location
		 * @var string strLocation
		 */
		protected $strLocation;
		const LocationMaxLength = 255;
		const LocationDefault = null;


		/**
		 * Protected member variable that maps to the database column appointment.additional_information
		 * @var string strAdditionalInformation
		 */
		protected $strAdditionalInformation;
		const AdditionalInformationMaxLength = 255;
		const AdditionalInformationDefault = null;


		/**
		 * Private member variable that stores a reference to a single PersonInChargeForAppointment object
		 * (of type PersonInChargeForAppointment), if this Appointment object was restored with
		 * an expansion on the person_in_charge_for_appointment association table.
		 * @var PersonInChargeForAppointment _objPersonInChargeForAppointment;
		 */
		private $_objPersonInChargeForAppointment;

		/**
		 * Private member variable that stores a reference to an array of PersonInChargeForAppointment objects
		 * (of type PersonInChargeForAppointment[]), if this Appointment object was restored with
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
		 * Load a Appointment from PK Info
		 * @param integer $intAppointmentId
		 * @return Appointment
		 */
		public static function Load($intAppointmentId) {
			// Use QuerySingle to Perform the Query
			return Appointment::QuerySingle(
				QQ::Equal(QQN::Appointment()->AppointmentId, $intAppointmentId)
			);
		}

		/**
		 * Load all Appointments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Appointment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Appointment::QueryArray to perform the LoadAll query
			try {
				return Appointment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Appointments
		 * @return int
		 */
		public static function CountAll() {
			// Call Appointment::QueryCount to perform the CountAll query
			return Appointment::QueryCount(QQ::All());
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
			$objDatabase = Appointment::GetDatabase();

			// Create/Build out the QueryBuilder object with Appointment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'appointment');
			Appointment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('appointment');

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
		 * Static Qcodo Query method to query for a single Appointment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Appointment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Appointment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Appointment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Appointment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Appointment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Appointment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Appointment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Appointment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Appointment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Appointment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Appointment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Appointment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Appointment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'appointment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Appointment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Appointment::GetSelectFields($objQueryBuilder);
				Appointment::GetFromFields($objQueryBuilder);

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
			return Appointment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Appointment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'appointment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'appointment_id', $strAliasPrefix . 'appointment_id');
			$objBuilder->AddSelectItem($strTableName, 'start', $strAliasPrefix . 'start');
			$objBuilder->AddSelectItem($strTableName, 'end', $strAliasPrefix . 'end');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'location', $strAliasPrefix . 'location');
			$objBuilder->AddSelectItem($strTableName, 'additional_information', $strAliasPrefix . 'additional_information');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Appointment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Appointment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Appointment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'appointment_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intAppointmentId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'appointment__';


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
				else if ($strAliasPrefix == 'appointment__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Appointment object
			$objToReturn = new Appointment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'appointment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'appointment_id'] : $strAliasPrefix . 'appointment_id';
			$objToReturn->intAppointmentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'start', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'start'] : $strAliasPrefix . 'start';
			$objToReturn->dttStart = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'end', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'end'] : $strAliasPrefix . 'end';
			$objToReturn->dttEnd = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'location', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location'] : $strAliasPrefix . 'location';
			$objToReturn->strLocation = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'additional_information', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'additional_information'] : $strAliasPrefix . 'additional_information';
			$objToReturn->strAdditionalInformation = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'appointment__';




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
		 * Instantiate an array of Appointments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Appointment[]
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
					$objItem = Appointment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Appointment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Appointment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Appointment next row resulting from the query
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
			return Appointment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Appointment object,
		 * by AppointmentId Index(es)
		 * @param integer $intAppointmentId
		 * @return Appointment
		*/
		public static function LoadByAppointmentId($intAppointmentId, $objOptionalClauses = null) {
			return Appointment::QuerySingle(
				QQ::Equal(QQN::Appointment()->AppointmentId, $intAppointmentId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Appointment objects,
		 * by Start, End Index(es)
		 * @param QDateTime $dttStart
		 * @param QDateTime $dttEnd
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Appointment[]
		*/
		public static function LoadArrayByStartEnd($dttStart, $dttEnd, $objOptionalClauses = null) {
			// Call Appointment::QueryArray to perform the LoadArrayByStartEnd query
			try {
				return Appointment::QueryArray(
					QQ::AndCondition(
					QQ::Equal(QQN::Appointment()->Start, $dttStart),
					QQ::Equal(QQN::Appointment()->End, $dttEnd)
					),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Appointments
		 * by Start, End Index(es)
		 * @param QDateTime $dttStart
		 * @param QDateTime $dttEnd
		 * @return int
		*/
		public static function CountByStartEnd($dttStart, $dttEnd, $objOptionalClauses = null) {
			// Call Appointment::QueryCount to perform the CountByStartEnd query
			return Appointment::QueryCount(
				QQ::AndCondition(
				QQ::Equal(QQN::Appointment()->Start, $dttStart),
				QQ::Equal(QQN::Appointment()->End, $dttEnd)
				)
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
		 * Save this Appointment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `appointment` (
							`start`,
							`end`,
							`description`,
							`location`,
							`additional_information`
						) VALUES (
							' . $objDatabase->SqlVariable($this->dttStart) . ',
							' . $objDatabase->SqlVariable($this->dttEnd) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strLocation) . ',
							' . $objDatabase->SqlVariable($this->strAdditionalInformation) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAppointmentId = $objDatabase->InsertId('appointment', 'appointment_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`appointment`
						SET
							`start` = ' . $objDatabase->SqlVariable($this->dttStart) . ',
							`end` = ' . $objDatabase->SqlVariable($this->dttEnd) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`location` = ' . $objDatabase->SqlVariable($this->strLocation) . ',
							`additional_information` = ' . $objDatabase->SqlVariable($this->strAdditionalInformation) . '
						WHERE
							`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '
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
		 * Delete this Appointment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAppointmentId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Appointment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`appointment`
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Appointments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`appointment`');
		}

		/**
		 * Truncate appointment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `appointment`');
		}

		/**
		 * Reload this Appointment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Appointment object.');

			// Reload the Object
			$objReloaded = Appointment::Load($this->intAppointmentId);

			// Update $this's local variables to match
			$this->dttStart = $objReloaded->dttStart;
			$this->dttEnd = $objReloaded->dttEnd;
			$this->strDescription = $objReloaded->strDescription;
			$this->strLocation = $objReloaded->strLocation;
			$this->strAdditionalInformation = $objReloaded->strAdditionalInformation;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Appointment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `appointment` (
					`appointment_id`,
					`start`,
					`end`,
					`description`,
					`location`,
					`additional_information`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAppointmentId) . ',
					' . $objDatabase->SqlVariable($this->dttStart) . ',
					' . $objDatabase->SqlVariable($this->dttEnd) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->strLocation) . ',
					' . $objDatabase->SqlVariable($this->strAdditionalInformation) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAppointmentId
		 * @return Appointment[]
		 */
		public static function GetJournalForId($intAppointmentId) {
			$objDatabase = Appointment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM appointment WHERE appointment_id = ' .
				$objDatabase->SqlVariable($intAppointmentId) . ' ORDER BY __sys_date');

			return Appointment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Appointment[]
		 */
		public function GetJournal() {
			return Appointment::GetJournalForId($this->intAppointmentId);
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
				case 'AppointmentId':
					// Gets the value for intAppointmentId (Read-Only PK)
					// @return integer
					return $this->intAppointmentId;

				case 'Start':
					// Gets the value for dttStart (Not Null)
					// @return QDateTime
					return $this->dttStart;

				case 'End':
					// Gets the value for dttEnd 
					// @return QDateTime
					return $this->dttEnd;

				case 'Description':
					// Gets the value for strDescription (Not Null)
					// @return string
					return $this->strDescription;

				case 'Location':
					// Gets the value for strLocation 
					// @return string
					return $this->strLocation;

				case 'AdditionalInformation':
					// Gets the value for strAdditionalInformation 
					// @return string
					return $this->strAdditionalInformation;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_PersonInChargeForAppointment':
					// Gets the value for the private _objPersonInChargeForAppointment (Read-Only)
					// if set due to an expansion on the person_in_charge_for_appointment.appointment_id reverse relationship
					// @return PersonInChargeForAppointment
					return $this->_objPersonInChargeForAppointment;

				case '_PersonInChargeForAppointmentArray':
					// Gets the value for the private _objPersonInChargeForAppointmentArray (Read-Only)
					// if set due to an ExpandAsArray on the person_in_charge_for_appointment.appointment_id reverse relationship
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
				case 'Start':
					// Sets the value for dttStart (Not Null)
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttStart = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'End':
					// Sets the value for dttEnd 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttEnd = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Location':
					// Sets the value for strLocation 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLocation = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'AdditionalInformation':
					// Sets the value for strAdditionalInformation 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAdditionalInformation = QType::Cast($mixValue, QType::String));
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

			
		
		// Related Objects' Methods for PersonInChargeForAppointment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PersonInChargeForAppointments as an array of PersonInChargeForAppointment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PersonInChargeForAppointment[]
		*/ 
		public function GetPersonInChargeForAppointmentArray($objOptionalClauses = null) {
			if ((is_null($this->intAppointmentId)))
				return array();

			try {
				return PersonInChargeForAppointment::LoadArrayByAppointmentId($this->intAppointmentId, $objOptionalClauses);
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
			if ((is_null($this->intAppointmentId)))
				return 0;

			return PersonInChargeForAppointment::CountByAppointmentId($this->intAppointmentId);
		}

		/**
		 * Associates a PersonInChargeForAppointment
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment
		 * @return void
		*/ 
		public function AssociatePersonInChargeForAppointment(PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			if ((is_null($this->intAppointmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonInChargeForAppointment on this unsaved Appointment.');
			if ((is_null($objPersonInChargeForAppointment->AppointmentId)) || (is_null($objPersonInChargeForAppointment->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePersonInChargeForAppointment on this Appointment with an unsaved PersonInChargeForAppointment.');

			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_in_charge_for_appointment`
				SET
					`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->AppointmentId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->PersonId) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPersonInChargeForAppointment->AppointmentId = $this->intAppointmentId;
				$objPersonInChargeForAppointment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PersonInChargeForAppointment
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment
		 * @return void
		*/ 
		public function UnassociatePersonInChargeForAppointment(PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			if ((is_null($this->intAppointmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Appointment.');
			if ((is_null($objPersonInChargeForAppointment->AppointmentId)) || (is_null($objPersonInChargeForAppointment->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this Appointment with an unsaved PersonInChargeForAppointment.');

			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_in_charge_for_appointment`
				SET
					`appointment_id` = null
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->AppointmentId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->PersonId) . ' AND
					`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPersonInChargeForAppointment->AppointmentId = null;
				$objPersonInChargeForAppointment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PersonInChargeForAppointments
		 * @return void
		*/ 
		public function UnassociateAllPersonInChargeForAppointments() {
			if ((is_null($this->intAppointmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Appointment.');

			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonInChargeForAppointment::LoadArrayByAppointmentId($this->intAppointmentId) as $objPersonInChargeForAppointment) {
					$objPersonInChargeForAppointment->AppointmentId = null;
					$objPersonInChargeForAppointment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`person_in_charge_for_appointment`
				SET
					`appointment_id` = null
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '
			');
		}

		/**
		 * Deletes an associated PersonInChargeForAppointment
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment
		 * @return void
		*/ 
		public function DeleteAssociatedPersonInChargeForAppointment(PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			if ((is_null($this->intAppointmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Appointment.');
			if ((is_null($objPersonInChargeForAppointment->AppointmentId)) || (is_null($objPersonInChargeForAppointment->PersonId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this Appointment with an unsaved PersonInChargeForAppointment.');

			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_in_charge_for_appointment`
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->AppointmentId) . ' AND
					`person_id` = ' . $objDatabase->SqlVariable($objPersonInChargeForAppointment->PersonId) . ' AND
					`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '
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
			if ((is_null($this->intAppointmentId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePersonInChargeForAppointment on this unsaved Appointment.');

			// Get the Database Object for this Class
			$objDatabase = Appointment::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PersonInChargeForAppointment::LoadArrayByAppointmentId($this->intAppointmentId) as $objPersonInChargeForAppointment) {
					$objPersonInChargeForAppointment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`person_in_charge_for_appointment`
				WHERE
					`appointment_id` = ' . $objDatabase->SqlVariable($this->intAppointmentId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Appointment"><sequence>';
			$strToReturn .= '<element name="AppointmentId" type="xsd:int"/>';
			$strToReturn .= '<element name="Start" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="End" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Location" type="xsd:string"/>';
			$strToReturn .= '<element name="AdditionalInformation" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Appointment', $strComplexTypeArray)) {
				$strComplexTypeArray['Appointment'] = Appointment::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Appointment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Appointment();
			if (property_exists($objSoapObject, 'AppointmentId'))
				$objToReturn->intAppointmentId = $objSoapObject->AppointmentId;
			if (property_exists($objSoapObject, 'Start'))
				$objToReturn->dttStart = new QDateTime($objSoapObject->Start);
			if (property_exists($objSoapObject, 'End'))
				$objToReturn->dttEnd = new QDateTime($objSoapObject->End);
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Location'))
				$objToReturn->strLocation = $objSoapObject->Location;
			if (property_exists($objSoapObject, 'AdditionalInformation'))
				$objToReturn->strAdditionalInformation = $objSoapObject->AdditionalInformation;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Appointment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->dttStart)
				$objObject->dttStart = $objObject->dttStart->__toString(QDateTime::FormatSoap);
			if ($objObject->dttEnd)
				$objObject->dttEnd = $objObject->dttEnd->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AppointmentId
	 * @property-read QQNode $Start
	 * @property-read QQNode $End
	 * @property-read QQNode $Description
	 * @property-read QQNode $Location
	 * @property-read QQNode $AdditionalInformation
	 * @property-read QQReverseReferenceNodePersonInChargeForAppointment $PersonInChargeForAppointment
	 */
	class QQNodeAppointment extends QQNode {
		protected $strTableName = 'appointment';
		protected $strPrimaryKey = 'appointment_id';
		protected $strClassName = 'Appointment';
		public function __get($strName) {
			switch ($strName) {
				case 'AppointmentId':
					return new QQNode('appointment_id', 'AppointmentId', 'integer', $this);
				case 'Start':
					return new QQNode('start', 'Start', 'QDateTime', $this);
				case 'End':
					return new QQNode('end', 'End', 'QDateTime', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'AdditionalInformation':
					return new QQNode('additional_information', 'AdditionalInformation', 'string', $this);
				case 'PersonInChargeForAppointment':
					return new QQReverseReferenceNodePersonInChargeForAppointment($this, 'personinchargeforappointment', 'reverse_reference', 'appointment_id');

				case '_PrimaryKeyNode':
					return new QQNode('appointment_id', 'AppointmentId', 'integer', $this);
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
	 * @property-read QQNode $AppointmentId
	 * @property-read QQNode $Start
	 * @property-read QQNode $End
	 * @property-read QQNode $Description
	 * @property-read QQNode $Location
	 * @property-read QQNode $AdditionalInformation
	 * @property-read QQReverseReferenceNodePersonInChargeForAppointment $PersonInChargeForAppointment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAppointment extends QQReverseReferenceNode {
		protected $strTableName = 'appointment';
		protected $strPrimaryKey = 'appointment_id';
		protected $strClassName = 'Appointment';
		public function __get($strName) {
			switch ($strName) {
				case 'AppointmentId':
					return new QQNode('appointment_id', 'AppointmentId', 'integer', $this);
				case 'Start':
					return new QQNode('start', 'Start', 'QDateTime', $this);
				case 'End':
					return new QQNode('end', 'End', 'QDateTime', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Location':
					return new QQNode('location', 'Location', 'string', $this);
				case 'AdditionalInformation':
					return new QQNode('additional_information', 'AdditionalInformation', 'string', $this);
				case 'PersonInChargeForAppointment':
					return new QQReverseReferenceNodePersonInChargeForAppointment($this, 'personinchargeforappointment', 'reverse_reference', 'appointment_id');

				case '_PrimaryKeyNode':
					return new QQNode('appointment_id', 'AppointmentId', 'integer', $this);
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