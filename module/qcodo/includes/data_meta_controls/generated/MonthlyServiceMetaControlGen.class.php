<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the MonthlyService class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single MonthlyService object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a MonthlyServiceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read MonthlyService $MonthlyService the actual MonthlyService data class being edited
	 * property QIntegerTextBox $MonthControl
	 * property-read QLabel $MonthLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class MonthlyServiceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var MonthlyService objMonthlyService
		 * @access protected
		 */
		protected $objMonthlyService;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of MonthlyService's individual data fields
        /**
         * @var QIntegerTextBox txtMonth;
         * @access protected
         */
		protected $txtMonth;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;


		// Controls that allow the viewing of MonthlyService's individual data fields
        /**
         * @var QLabel lblMonth
         * @access protected
         */
		protected $lblMonth;

        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * MonthlyServiceMetaControl to edit a single MonthlyService object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single MonthlyService object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MonthlyServiceMetaControl
		 * @param MonthlyService $objMonthlyService new or existing MonthlyService object
		 */
		 public function __construct($objParentObject, MonthlyService $objMonthlyService) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this MonthlyServiceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked MonthlyService object
			$this->objMonthlyService = $objMonthlyService;

			// Figure out if we're Editing or Creating New
			if ($this->objMonthlyService->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this MonthlyServiceMetaControl
		 * @param integer $intMonth primary key value
		 * @param integer $intPersonId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing MonthlyService object creation - defaults to CreateOrEdit
 		 * @return MonthlyServiceMetaControl
		 */
		public static function Create($objParentObject, $intMonth = null, $intPersonId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intMonth) && strlen($intPersonId)) {
				$objMonthlyService = MonthlyService::Load($intMonth, $intPersonId);

				// MonthlyService was found -- return it!
				if ($objMonthlyService)
					return new MonthlyServiceMetaControl($objParentObject, $objMonthlyService);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a MonthlyService object with PK arguments: ' . $intMonth . ', ' . $intPersonId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new MonthlyServiceMetaControl($objParentObject, new MonthlyService());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MonthlyServiceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MonthlyService object creation - defaults to CreateOrEdit
		 * @return MonthlyServiceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intMonth = QApplication::PathInfo(0);
			$intPersonId = QApplication::PathInfo(1);
			return MonthlyServiceMetaControl::Create($objParentObject, $intMonth, $intPersonId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this MonthlyServiceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing MonthlyService object creation - defaults to CreateOrEdit
		 * @return MonthlyServiceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intMonth = QApplication::QueryString('intMonth');
			$intPersonId = QApplication::QueryString('intPersonId');
			return MonthlyServiceMetaControl::Create($objParentObject, $intMonth, $intPersonId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtMonth
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtMonth_Create($strControlId = null) {
			$this->txtMonth = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtMonth->Name = QApplication::Translate('Month');
			$this->txtMonth->Text = $this->objMonthlyService->Month;
			$this->txtMonth->Required = true;
			return $this->txtMonth;
		}

		/**
		 * Create and setup QLabel lblMonth
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblMonth_Create($strControlId = null, $strFormat = null) {
			$this->lblMonth = new QLabel($this->objParentObject, $strControlId);
			$this->lblMonth->Name = QApplication::Translate('Month');
			$this->lblMonth->Text = $this->objMonthlyService->Month;
			$this->lblMonth->Required = true;
			$this->lblMonth->Format = $strFormat;
			return $this->lblMonth;
		}

		/**
		 * Create and setup QListBox lstPerson
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstPerson_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstPerson = new QListBox($this->objParentObject, $strControlId);
			$this->lstPerson->Name = QApplication::Translate('Person');
			$this->lstPerson->Required = true;
			if (!$this->blnEditMode)
				$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objPersonCursor = Person::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objPerson = Person::InstantiateCursor($objPersonCursor)) {
				$objListItem = new QListItem($objPerson->__toString(), $objPerson->PersonId);
				if (($this->objMonthlyService->Person) && ($this->objMonthlyService->Person->PersonId == $objPerson->PersonId))
					$objListItem->Selected = true;
				$this->lstPerson->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstPerson;
		}

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person');
			$this->lblPersonId->Text = ($this->objMonthlyService->Person) ? $this->objMonthlyService->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}



		/**
		 * Refresh this MetaControl with Data from the local MonthlyService object.
		 * @param boolean $blnReload reload MonthlyService from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objMonthlyService->Reload();

			if ($this->txtMonth) $this->txtMonth->Text = $this->objMonthlyService->Month;
			if ($this->lblMonth) $this->lblMonth->Text = $this->objMonthlyService->Month;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->PersonId);
					if (($this->objMonthlyService->Person) && ($this->objMonthlyService->Person->PersonId == $objPerson->PersonId))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objMonthlyService->Person) ? $this->objMonthlyService->Person->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC MONTHLYSERVICE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's MonthlyService instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveMonthlyService() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtMonth) $this->objMonthlyService->Month = $this->txtMonth->Text;
				if ($this->lstPerson) $this->objMonthlyService->PersonId = $this->lstPerson->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the MonthlyService object
				$this->objMonthlyService->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's MonthlyService instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteMonthlyService() {
			$this->objMonthlyService->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'MonthlyService': return $this->objMonthlyService;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to MonthlyService fields -- will be created dynamically if not yet created
				case 'MonthControl':
					if (!$this->txtMonth) return $this->txtMonth_Create();
					return $this->txtMonth;
				case 'MonthLabel':
					if (!$this->lblMonth) return $this->lblMonth_Create();
					return $this->lblMonth;
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
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
			try {
				switch ($strName) {
					// Controls that point to MonthlyService fields
					case 'MonthControl':
						return ($this->txtMonth = QType::Cast($mixValue, 'QControl'));
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>