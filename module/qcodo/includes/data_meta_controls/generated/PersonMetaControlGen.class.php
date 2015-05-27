<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Person class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Person object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Person $Person the actual Person data class being edited
	 * property QLabel $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QTextBox $SexControl
	 * property-read QLabel $SexLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $EMailAddressControl
	 * property-read QLabel $EMailAddressLabel
	 * property QDateTimePicker $DateOfBirthControl
	 * property-read QLabel $DateOfBirthLabel
	 * property QDateTimePicker $DateOfEntryControl
	 * property-read QLabel $DateOfEntryLabel
	 * property QListBox $RankIdControl
	 * property-read QLabel $RankIdLabel
	 * property QCheckBox $ActiveControl
	 * property-read QLabel $ActiveLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PersonMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Person objPerson
		 * @access protected
		 */
		protected $objPerson;

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

		// Controls that allow the editing of Person's individual data fields
        /**
         * @var QLabel lblPersonId;
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QTextBox txtSex;
         * @access protected
         */
		protected $txtSex;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtEMailAddress;
         * @access protected
         */
		protected $txtEMailAddress;

        /**
         * @var QDateTimePicker calDateOfBirth;
         * @access protected
         */
		protected $calDateOfBirth;

        /**
         * @var QDateTimePicker calDateOfEntry;
         * @access protected
         */
		protected $calDateOfEntry;

        /**
         * @var QListBox lstRank;
         * @access protected
         */
		protected $lstRank;

        /**
         * @var QCheckBox chkActive;
         * @access protected
         */
		protected $chkActive;


		// Controls that allow the viewing of Person's individual data fields
        /**
         * @var QLabel lblSex
         * @access protected
         */
		protected $lblSex;

        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblEMailAddress
         * @access protected
         */
		protected $lblEMailAddress;

        /**
         * @var QLabel lblDateOfBirth
         * @access protected
         */
		protected $lblDateOfBirth;

        /**
         * @var QLabel lblDateOfEntry
         * @access protected
         */
		protected $lblDateOfEntry;

        /**
         * @var QLabel lblRankId
         * @access protected
         */
		protected $lblRankId;

        /**
         * @var QLabel lblActive
         * @access protected
         */
		protected $lblActive;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PersonMetaControl to edit a single Person object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Person object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param Person $objPerson new or existing Person object
		 */
		 public function __construct($objParentObject, Person $objPerson) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PersonMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Person object
			$this->objPerson = $objPerson;

			// Figure out if we're Editing or Creating New
			if ($this->objPerson->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param integer $intPersonId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
 		 * @return PersonMetaControl
		 */
		public static function Create($objParentObject, $intPersonId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intPersonId)) {
				$objPerson = Person::Load($intPersonId);

				// Person was found -- return it!
				if ($objPerson)
					return new PersonMetaControl($objParentObject, $objPerson);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Person object with PK arguments: ' . $intPersonId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PersonMetaControl($objParentObject, new Person());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
		 * @return PersonMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intPersonId = QApplication::PathInfo(0);
			return PersonMetaControl::Create($objParentObject, $intPersonId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Person object creation - defaults to CreateOrEdit
		 * @return PersonMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intPersonId = QApplication::QueryString('intPersonId');
			return PersonMetaControl::Create($objParentObject, $intPersonId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblPersonId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblPersonId_Create($strControlId = null) {
			$this->lblPersonId = new QLabel($this->objParentObject, $strControlId);
			$this->lblPersonId->Name = QApplication::Translate('Person Id');
			if ($this->blnEditMode)
				$this->lblPersonId->Text = $this->objPerson->PersonId;
			else
				$this->lblPersonId->Text = 'N/A';
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QTextBox txtSex
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSex_Create($strControlId = null) {
			$this->txtSex = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSex->Name = QApplication::Translate('Sex');
			$this->txtSex->Text = $this->objPerson->Sex;
			$this->txtSex->Required = true;
			return $this->txtSex;
		}

		/**
		 * Create and setup QLabel lblSex
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSex_Create($strControlId = null) {
			$this->lblSex = new QLabel($this->objParentObject, $strControlId);
			$this->lblSex->Name = QApplication::Translate('Sex');
			$this->lblSex->Text = $this->objPerson->Sex;
			$this->lblSex->Required = true;
			return $this->lblSex;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objPerson->FirstName;
			$this->txtFirstName->Required = true;
			$this->txtFirstName->MaxLength = Person::FirstNameMaxLength;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objPerson->FirstName;
			$this->lblFirstName->Required = true;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objPerson->LastName;
			$this->txtLastName->Required = true;
			$this->txtLastName->MaxLength = Person::LastNameMaxLength;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objPerson->LastName;
			$this->lblLastName->Required = true;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtEMailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEMailAddress_Create($strControlId = null) {
			$this->txtEMailAddress = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEMailAddress->Name = QApplication::Translate('E Mail Address');
			$this->txtEMailAddress->Text = $this->objPerson->EMailAddress;
			$this->txtEMailAddress->MaxLength = Person::EMailAddressMaxLength;
			return $this->txtEMailAddress;
		}

		/**
		 * Create and setup QLabel lblEMailAddress
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEMailAddress_Create($strControlId = null) {
			$this->lblEMailAddress = new QLabel($this->objParentObject, $strControlId);
			$this->lblEMailAddress->Name = QApplication::Translate('E Mail Address');
			$this->lblEMailAddress->Text = $this->objPerson->EMailAddress;
			return $this->lblEMailAddress;
		}

		/**
		 * Create and setup QDateTimePicker calDateOfBirth
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateOfBirth_Create($strControlId = null) {
			$this->calDateOfBirth = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateOfBirth->Name = QApplication::Translate('Date Of Birth');
			$this->calDateOfBirth->DateTime = $this->objPerson->DateOfBirth;
			$this->calDateOfBirth->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateOfBirth;
		}

		/**
		 * Create and setup QLabel lblDateOfBirth
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateOfBirth_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateOfBirth = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateOfBirth->Name = QApplication::Translate('Date Of Birth');
			$this->strDateOfBirthDateTimeFormat = $strDateTimeFormat;
			$this->lblDateOfBirth->Text = sprintf($this->objPerson->DateOfBirth) ? $this->objPerson->DateOfBirth->__toString($this->strDateOfBirthDateTimeFormat) : null;
			return $this->lblDateOfBirth;
		}

		protected $strDateOfBirthDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calDateOfEntry
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateOfEntry_Create($strControlId = null) {
			$this->calDateOfEntry = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateOfEntry->Name = QApplication::Translate('Date Of Entry');
			$this->calDateOfEntry->DateTime = $this->objPerson->DateOfEntry;
			$this->calDateOfEntry->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateOfEntry;
		}

		/**
		 * Create and setup QLabel lblDateOfEntry
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateOfEntry_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateOfEntry = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateOfEntry->Name = QApplication::Translate('Date Of Entry');
			$this->strDateOfEntryDateTimeFormat = $strDateTimeFormat;
			$this->lblDateOfEntry->Text = sprintf($this->objPerson->DateOfEntry) ? $this->objPerson->DateOfEntry->__toString($this->strDateOfEntryDateTimeFormat) : null;
			return $this->lblDateOfEntry;
		}

		protected $strDateOfEntryDateTimeFormat;

		/**
		 * Create and setup QListBox lstRank
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstRank_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstRank = new QListBox($this->objParentObject, $strControlId);
			$this->lstRank->Name = QApplication::Translate('Rank');
			$this->lstRank->Required = true;
			if (!$this->blnEditMode)
				$this->lstRank->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objRankCursor = Rank::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objRank = Rank::InstantiateCursor($objRankCursor)) {
				$objListItem = new QListItem($objRank->__toString(), $objRank->RankId);
				if (($this->objPerson->Rank) && ($this->objPerson->Rank->RankId == $objRank->RankId))
					$objListItem->Selected = true;
				$this->lstRank->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstRank;
		}

		/**
		 * Create and setup QLabel lblRankId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRankId_Create($strControlId = null) {
			$this->lblRankId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRankId->Name = QApplication::Translate('Rank');
			$this->lblRankId->Text = ($this->objPerson->Rank) ? $this->objPerson->Rank->__toString() : null;
			$this->lblRankId->Required = true;
			return $this->lblRankId;
		}

		/**
		 * Create and setup QCheckBox chkActive
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkActive_Create($strControlId = null) {
			$this->chkActive = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkActive->Name = QApplication::Translate('Active');
			$this->chkActive->Checked = $this->objPerson->Active;
			return $this->chkActive;
		}

		/**
		 * Create and setup QLabel lblActive
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActive_Create($strControlId = null) {
			$this->lblActive = new QLabel($this->objParentObject, $strControlId);
			$this->lblActive->Name = QApplication::Translate('Active');
			$this->lblActive->Text = ($this->objPerson->Active) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblActive;
		}



		/**
		 * Refresh this MetaControl with Data from the local Person object.
		 * @param boolean $blnReload reload Person from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPerson->Reload();

			if ($this->lblPersonId) if ($this->blnEditMode) $this->lblPersonId->Text = $this->objPerson->PersonId;

			if ($this->txtSex) $this->txtSex->Text = $this->objPerson->Sex;
			if ($this->lblSex) $this->lblSex->Text = $this->objPerson->Sex;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objPerson->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objPerson->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objPerson->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objPerson->LastName;

			if ($this->txtEMailAddress) $this->txtEMailAddress->Text = $this->objPerson->EMailAddress;
			if ($this->lblEMailAddress) $this->lblEMailAddress->Text = $this->objPerson->EMailAddress;

			if ($this->calDateOfBirth) $this->calDateOfBirth->DateTime = $this->objPerson->DateOfBirth;
			if ($this->lblDateOfBirth) $this->lblDateOfBirth->Text = sprintf($this->objPerson->DateOfBirth) ? $this->objPerson->__toString($this->strDateOfBirthDateTimeFormat) : null;

			if ($this->calDateOfEntry) $this->calDateOfEntry->DateTime = $this->objPerson->DateOfEntry;
			if ($this->lblDateOfEntry) $this->lblDateOfEntry->Text = sprintf($this->objPerson->DateOfEntry) ? $this->objPerson->__toString($this->strDateOfEntryDateTimeFormat) : null;

			if ($this->lstRank) {
					$this->lstRank->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstRank->AddItem(QApplication::Translate('- Select One -'), null);
				$objRankArray = Rank::LoadAll();
				if ($objRankArray) foreach ($objRankArray as $objRank) {
					$objListItem = new QListItem($objRank->__toString(), $objRank->RankId);
					if (($this->objPerson->Rank) && ($this->objPerson->Rank->RankId == $objRank->RankId))
						$objListItem->Selected = true;
					$this->lstRank->AddItem($objListItem);
				}
			}
			if ($this->lblRankId) $this->lblRankId->Text = ($this->objPerson->Rank) ? $this->objPerson->Rank->__toString() : null;

			if ($this->chkActive) $this->chkActive->Checked = $this->objPerson->Active;
			if ($this->lblActive) $this->lblActive->Text = ($this->objPerson->Active) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PERSON OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Person instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePerson() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtSex) $this->objPerson->Sex = $this->txtSex->Text;
				if ($this->txtFirstName) $this->objPerson->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objPerson->LastName = $this->txtLastName->Text;
				if ($this->txtEMailAddress) $this->objPerson->EMailAddress = $this->txtEMailAddress->Text;
				if ($this->calDateOfBirth) $this->objPerson->DateOfBirth = $this->calDateOfBirth->DateTime;
				if ($this->calDateOfEntry) $this->objPerson->DateOfEntry = $this->calDateOfEntry->DateTime;
				if ($this->lstRank) $this->objPerson->RankId = $this->lstRank->SelectedValue;
				if ($this->chkActive) $this->objPerson->Active = $this->chkActive->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Person object
				$this->objPerson->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Person instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePerson() {
			$this->objPerson->Delete();
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
				case 'Person': return $this->objPerson;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Person fields -- will be created dynamically if not yet created
				case 'PersonIdControl':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'SexControl':
					if (!$this->txtSex) return $this->txtSex_Create();
					return $this->txtSex;
				case 'SexLabel':
					if (!$this->lblSex) return $this->lblSex_Create();
					return $this->lblSex;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'EMailAddressControl':
					if (!$this->txtEMailAddress) return $this->txtEMailAddress_Create();
					return $this->txtEMailAddress;
				case 'EMailAddressLabel':
					if (!$this->lblEMailAddress) return $this->lblEMailAddress_Create();
					return $this->lblEMailAddress;
				case 'DateOfBirthControl':
					if (!$this->calDateOfBirth) return $this->calDateOfBirth_Create();
					return $this->calDateOfBirth;
				case 'DateOfBirthLabel':
					if (!$this->lblDateOfBirth) return $this->lblDateOfBirth_Create();
					return $this->lblDateOfBirth;
				case 'DateOfEntryControl':
					if (!$this->calDateOfEntry) return $this->calDateOfEntry_Create();
					return $this->calDateOfEntry;
				case 'DateOfEntryLabel':
					if (!$this->lblDateOfEntry) return $this->lblDateOfEntry_Create();
					return $this->lblDateOfEntry;
				case 'RankIdControl':
					if (!$this->lstRank) return $this->lstRank_Create();
					return $this->lstRank;
				case 'RankIdLabel':
					if (!$this->lblRankId) return $this->lblRankId_Create();
					return $this->lblRankId;
				case 'ActiveControl':
					if (!$this->chkActive) return $this->chkActive_Create();
					return $this->chkActive;
				case 'ActiveLabel':
					if (!$this->lblActive) return $this->lblActive_Create();
					return $this->lblActive;
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
					// Controls that point to Person fields
					case 'PersonIdControl':
						return ($this->lblPersonId = QType::Cast($mixValue, 'QControl'));
					case 'SexControl':
						return ($this->txtSex = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'EMailAddressControl':
						return ($this->txtEMailAddress = QType::Cast($mixValue, 'QControl'));
					case 'DateOfBirthControl':
						return ($this->calDateOfBirth = QType::Cast($mixValue, 'QControl'));
					case 'DateOfEntryControl':
						return ($this->calDateOfEntry = QType::Cast($mixValue, 'QControl'));
					case 'RankIdControl':
						return ($this->lstRank = QType::Cast($mixValue, 'QControl'));
					case 'ActiveControl':
						return ($this->chkActive = QType::Cast($mixValue, 'QControl'));
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