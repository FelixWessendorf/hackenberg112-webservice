<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Team class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Team object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TeamMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Team $Team the actual Team data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QTextBox $MembersControl
	 * property-read QLabel $MembersLabel
	 * property QDateTimePicker $CreatedAtControl
	 * property-read QLabel $CreatedAtLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TeamMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Team objTeam
		 * @access protected
		 */
		protected $objTeam;

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

		// Controls that allow the editing of Team's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QTextBox txtMembers;
         * @access protected
         */
		protected $txtMembers;

        /**
         * @var QDateTimePicker calCreatedAt;
         * @access protected
         */
		protected $calCreatedAt;


		// Controls that allow the viewing of Team's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblMembers
         * @access protected
         */
		protected $lblMembers;

        /**
         * @var QLabel lblCreatedAt
         * @access protected
         */
		protected $lblCreatedAt;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TeamMetaControl to edit a single Team object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Team object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TeamMetaControl
		 * @param Team $objTeam new or existing Team object
		 */
		 public function __construct($objParentObject, Team $objTeam) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TeamMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Team object
			$this->objTeam = $objTeam;

			// Figure out if we're Editing or Creating New
			if ($this->objTeam->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TeamMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Team object creation - defaults to CreateOrEdit
 		 * @return TeamMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTeam = Team::Load($intId);

				// Team was found -- return it!
				if ($objTeam)
					return new TeamMetaControl($objParentObject, $objTeam);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Team object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TeamMetaControl($objParentObject, new Team());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TeamMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Team object creation - defaults to CreateOrEdit
		 * @return TeamMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TeamMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TeamMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Team object creation - defaults to CreateOrEdit
		 * @return TeamMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TeamMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objTeam->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objTeam->Name;
			$this->txtName->MaxLength = Team::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objTeam->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QTextBox txtMembers
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtMembers_Create($strControlId = null) {
			$this->txtMembers = new QTextBox($this->objParentObject, $strControlId);
			$this->txtMembers->Name = QApplication::Translate('Members');
			$this->txtMembers->Text = $this->objTeam->Members;
			$this->txtMembers->TextMode = QTextMode::MultiLine;
			return $this->txtMembers;
		}

		/**
		 * Create and setup QLabel lblMembers
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMembers_Create($strControlId = null) {
			$this->lblMembers = new QLabel($this->objParentObject, $strControlId);
			$this->lblMembers->Name = QApplication::Translate('Members');
			$this->lblMembers->Text = $this->objTeam->Members;
			return $this->lblMembers;
		}

		/**
		 * Create and setup QDateTimePicker calCreatedAt
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreatedAt_Create($strControlId = null) {
			$this->calCreatedAt = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreatedAt->Name = QApplication::Translate('Created At');
			$this->calCreatedAt->DateTime = $this->objTeam->CreatedAt;
			$this->calCreatedAt->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calCreatedAt->Required = true;
			return $this->calCreatedAt;
		}

		/**
		 * Create and setup QLabel lblCreatedAt
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreatedAt_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreatedAt = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedAt->Name = QApplication::Translate('Created At');
			$this->strCreatedAtDateTimeFormat = $strDateTimeFormat;
			$this->lblCreatedAt->Text = sprintf($this->objTeam->CreatedAt) ? $this->objTeam->CreatedAt->__toString($this->strCreatedAtDateTimeFormat) : null;
			$this->lblCreatedAt->Required = true;
			return $this->lblCreatedAt;
		}

		protected $strCreatedAtDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Team object.
		 * @param boolean $blnReload reload Team from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTeam->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTeam->Id;

			if ($this->txtName) $this->txtName->Text = $this->objTeam->Name;
			if ($this->lblName) $this->lblName->Text = $this->objTeam->Name;

			if ($this->txtMembers) $this->txtMembers->Text = $this->objTeam->Members;
			if ($this->lblMembers) $this->lblMembers->Text = $this->objTeam->Members;

			if ($this->calCreatedAt) $this->calCreatedAt->DateTime = $this->objTeam->CreatedAt;
			if ($this->lblCreatedAt) $this->lblCreatedAt->Text = sprintf($this->objTeam->CreatedAt) ? $this->objTeam->__toString($this->strCreatedAtDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TEAM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Team instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTeam() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objTeam->Name = $this->txtName->Text;
				if ($this->txtMembers) $this->objTeam->Members = $this->txtMembers->Text;
				if ($this->calCreatedAt) $this->objTeam->CreatedAt = $this->calCreatedAt->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Team object
				$this->objTeam->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Team instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTeam() {
			$this->objTeam->Delete();
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
				case 'Team': return $this->objTeam;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Team fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'MembersControl':
					if (!$this->txtMembers) return $this->txtMembers_Create();
					return $this->txtMembers;
				case 'MembersLabel':
					if (!$this->lblMembers) return $this->lblMembers_Create();
					return $this->lblMembers;
				case 'CreatedAtControl':
					if (!$this->calCreatedAt) return $this->calCreatedAt_Create();
					return $this->calCreatedAt;
				case 'CreatedAtLabel':
					if (!$this->lblCreatedAt) return $this->lblCreatedAt_Create();
					return $this->lblCreatedAt;
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
					// Controls that point to Team fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'MembersControl':
						return ($this->txtMembers = QType::Cast($mixValue, 'QControl'));
					case 'CreatedAtControl':
						return ($this->calCreatedAt = QType::Cast($mixValue, 'QControl'));
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