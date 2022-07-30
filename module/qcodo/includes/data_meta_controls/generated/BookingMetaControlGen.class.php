<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Booking class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Booking object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a BookingMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Booking $Booking the actual Booking data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $TeamIdControl
	 * property-read QLabel $TeamIdLabel
	 * property QIntegerTextBox $AmountControl
	 * property-read QLabel $AmountLabel
	 * property QDateTimePicker $CreatedAtControl
	 * property-read QLabel $CreatedAtLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class BookingMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Booking objBooking
		 * @access protected
		 */
		protected $objBooking;

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

		// Controls that allow the editing of Booking's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstTeam;
         * @access protected
         */
		protected $lstTeam;

        /**
         * @var QIntegerTextBox txtAmount;
         * @access protected
         */
		protected $txtAmount;

        /**
         * @var QDateTimePicker calCreatedAt;
         * @access protected
         */
		protected $calCreatedAt;


		// Controls that allow the viewing of Booking's individual data fields
        /**
         * @var QLabel lblTeamId
         * @access protected
         */
		protected $lblTeamId;

        /**
         * @var QLabel lblAmount
         * @access protected
         */
		protected $lblAmount;

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
		 * BookingMetaControl to edit a single Booking object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Booking object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BookingMetaControl
		 * @param Booking $objBooking new or existing Booking object
		 */
		 public function __construct($objParentObject, Booking $objBooking) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this BookingMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Booking object
			$this->objBooking = $objBooking;

			// Figure out if we're Editing or Creating New
			if ($this->objBooking->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this BookingMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Booking object creation - defaults to CreateOrEdit
 		 * @return BookingMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objBooking = Booking::Load($intId);

				// Booking was found -- return it!
				if ($objBooking)
					return new BookingMetaControl($objParentObject, $objBooking);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Booking object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new BookingMetaControl($objParentObject, new Booking());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BookingMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Booking object creation - defaults to CreateOrEdit
		 * @return BookingMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return BookingMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BookingMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Booking object creation - defaults to CreateOrEdit
		 * @return BookingMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return BookingMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objBooking->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstTeam
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTeam_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTeam = new QListBox($this->objParentObject, $strControlId);
			$this->lstTeam->Name = QApplication::Translate('Team');
			$this->lstTeam->Required = true;
			if (!$this->blnEditMode)
				$this->lstTeam->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTeamCursor = Team::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTeam = Team::InstantiateCursor($objTeamCursor)) {
				$objListItem = new QListItem($objTeam->__toString(), $objTeam->Id);
				if (($this->objBooking->Team) && ($this->objBooking->Team->Id == $objTeam->Id))
					$objListItem->Selected = true;
				$this->lstTeam->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTeam;
		}

		/**
		 * Create and setup QLabel lblTeamId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTeamId_Create($strControlId = null) {
			$this->lblTeamId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTeamId->Name = QApplication::Translate('Team');
			$this->lblTeamId->Text = ($this->objBooking->Team) ? $this->objBooking->Team->__toString() : null;
			$this->lblTeamId->Required = true;
			return $this->lblTeamId;
		}

		/**
		 * Create and setup QIntegerTextBox txtAmount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtAmount_Create($strControlId = null) {
			$this->txtAmount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtAmount->Name = QApplication::Translate('Amount');
			$this->txtAmount->Text = $this->objBooking->Amount;
			$this->txtAmount->Required = true;
			return $this->txtAmount;
		}

		/**
		 * Create and setup QLabel lblAmount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAmount_Create($strControlId = null, $strFormat = null) {
			$this->lblAmount = new QLabel($this->objParentObject, $strControlId);
			$this->lblAmount->Name = QApplication::Translate('Amount');
			$this->lblAmount->Text = $this->objBooking->Amount;
			$this->lblAmount->Required = true;
			$this->lblAmount->Format = $strFormat;
			return $this->lblAmount;
		}

		/**
		 * Create and setup QDateTimePicker calCreatedAt
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreatedAt_Create($strControlId = null) {
			$this->calCreatedAt = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreatedAt->Name = QApplication::Translate('Created At');
			$this->calCreatedAt->DateTime = $this->objBooking->CreatedAt;
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
			$this->lblCreatedAt->Text = sprintf($this->objBooking->CreatedAt) ? $this->objBooking->CreatedAt->__toString($this->strCreatedAtDateTimeFormat) : null;
			$this->lblCreatedAt->Required = true;
			return $this->lblCreatedAt;
		}

		protected $strCreatedAtDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local Booking object.
		 * @param boolean $blnReload reload Booking from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objBooking->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objBooking->Id;

			if ($this->lstTeam) {
					$this->lstTeam->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstTeam->AddItem(QApplication::Translate('- Select One -'), null);
				$objTeamArray = Team::LoadAll();
				if ($objTeamArray) foreach ($objTeamArray as $objTeam) {
					$objListItem = new QListItem($objTeam->__toString(), $objTeam->Id);
					if (($this->objBooking->Team) && ($this->objBooking->Team->Id == $objTeam->Id))
						$objListItem->Selected = true;
					$this->lstTeam->AddItem($objListItem);
				}
			}
			if ($this->lblTeamId) $this->lblTeamId->Text = ($this->objBooking->Team) ? $this->objBooking->Team->__toString() : null;

			if ($this->txtAmount) $this->txtAmount->Text = $this->objBooking->Amount;
			if ($this->lblAmount) $this->lblAmount->Text = $this->objBooking->Amount;

			if ($this->calCreatedAt) $this->calCreatedAt->DateTime = $this->objBooking->CreatedAt;
			if ($this->lblCreatedAt) $this->lblCreatedAt->Text = sprintf($this->objBooking->CreatedAt) ? $this->objBooking->__toString($this->strCreatedAtDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC BOOKING OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Booking instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveBooking() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstTeam) $this->objBooking->TeamId = $this->lstTeam->SelectedValue;
				if ($this->txtAmount) $this->objBooking->Amount = $this->txtAmount->Text;
				if ($this->calCreatedAt) $this->objBooking->CreatedAt = $this->calCreatedAt->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Booking object
				$this->objBooking->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Booking instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteBooking() {
			$this->objBooking->Delete();
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
				case 'Booking': return $this->objBooking;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Booking fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TeamIdControl':
					if (!$this->lstTeam) return $this->lstTeam_Create();
					return $this->lstTeam;
				case 'TeamIdLabel':
					if (!$this->lblTeamId) return $this->lblTeamId_Create();
					return $this->lblTeamId;
				case 'AmountControl':
					if (!$this->txtAmount) return $this->txtAmount_Create();
					return $this->txtAmount;
				case 'AmountLabel':
					if (!$this->lblAmount) return $this->lblAmount_Create();
					return $this->lblAmount;
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
					// Controls that point to Booking fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TeamIdControl':
						return ($this->lstTeam = QType::Cast($mixValue, 'QControl'));
					case 'AmountControl':
						return ($this->txtAmount = QType::Cast($mixValue, 'QControl'));
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