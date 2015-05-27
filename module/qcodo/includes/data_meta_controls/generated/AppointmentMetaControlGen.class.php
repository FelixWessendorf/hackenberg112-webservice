<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Appointment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Appointment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AppointmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Appointment $Appointment the actual Appointment data class being edited
	 * property QLabel $AppointmentIdControl
	 * property-read QLabel $AppointmentIdLabel
	 * property QDateTimePicker $StartControl
	 * property-read QLabel $StartLabel
	 * property QDateTimePicker $EndControl
	 * property-read QLabel $EndLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QTextBox $LocationControl
	 * property-read QLabel $LocationLabel
	 * property QTextBox $AdditionalInformationControl
	 * property-read QLabel $AdditionalInformationLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AppointmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Appointment objAppointment
		 * @access protected
		 */
		protected $objAppointment;

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

		// Controls that allow the editing of Appointment's individual data fields
        /**
         * @var QLabel lblAppointmentId;
         * @access protected
         */
		protected $lblAppointmentId;

        /**
         * @var QDateTimePicker calStart;
         * @access protected
         */
		protected $calStart;

        /**
         * @var QDateTimePicker calEnd;
         * @access protected
         */
		protected $calEnd;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QTextBox txtLocation;
         * @access protected
         */
		protected $txtLocation;

        /**
         * @var QTextBox txtAdditionalInformation;
         * @access protected
         */
		protected $txtAdditionalInformation;


		// Controls that allow the viewing of Appointment's individual data fields
        /**
         * @var QLabel lblStart
         * @access protected
         */
		protected $lblStart;

        /**
         * @var QLabel lblEnd
         * @access protected
         */
		protected $lblEnd;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblLocation
         * @access protected
         */
		protected $lblLocation;

        /**
         * @var QLabel lblAdditionalInformation
         * @access protected
         */
		protected $lblAdditionalInformation;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AppointmentMetaControl to edit a single Appointment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Appointment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AppointmentMetaControl
		 * @param Appointment $objAppointment new or existing Appointment object
		 */
		 public function __construct($objParentObject, Appointment $objAppointment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AppointmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Appointment object
			$this->objAppointment = $objAppointment;

			// Figure out if we're Editing or Creating New
			if ($this->objAppointment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AppointmentMetaControl
		 * @param integer $intAppointmentId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Appointment object creation - defaults to CreateOrEdit
 		 * @return AppointmentMetaControl
		 */
		public static function Create($objParentObject, $intAppointmentId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAppointmentId)) {
				$objAppointment = Appointment::Load($intAppointmentId);

				// Appointment was found -- return it!
				if ($objAppointment)
					return new AppointmentMetaControl($objParentObject, $objAppointment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Appointment object with PK arguments: ' . $intAppointmentId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AppointmentMetaControl($objParentObject, new Appointment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AppointmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Appointment object creation - defaults to CreateOrEdit
		 * @return AppointmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAppointmentId = QApplication::PathInfo(0);
			return AppointmentMetaControl::Create($objParentObject, $intAppointmentId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AppointmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Appointment object creation - defaults to CreateOrEdit
		 * @return AppointmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAppointmentId = QApplication::QueryString('intAppointmentId');
			return AppointmentMetaControl::Create($objParentObject, $intAppointmentId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAppointmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAppointmentId_Create($strControlId = null) {
			$this->lblAppointmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAppointmentId->Name = QApplication::Translate('Appointment Id');
			if ($this->blnEditMode)
				$this->lblAppointmentId->Text = $this->objAppointment->AppointmentId;
			else
				$this->lblAppointmentId->Text = 'N/A';
			return $this->lblAppointmentId;
		}

		/**
		 * Create and setup QDateTimePicker calStart
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calStart_Create($strControlId = null) {
			$this->calStart = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calStart->Name = QApplication::Translate('Start');
			$this->calStart->DateTime = $this->objAppointment->Start;
			$this->calStart->DateTimePickerType = QDateTimePickerType::DateTime;
			$this->calStart->Required = true;
			return $this->calStart;
		}

		/**
		 * Create and setup QLabel lblStart
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblStart_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblStart = new QLabel($this->objParentObject, $strControlId);
			$this->lblStart->Name = QApplication::Translate('Start');
			$this->strStartDateTimeFormat = $strDateTimeFormat;
			$this->lblStart->Text = sprintf($this->objAppointment->Start) ? $this->objAppointment->Start->__toString($this->strStartDateTimeFormat) : null;
			$this->lblStart->Required = true;
			return $this->lblStart;
		}

		protected $strStartDateTimeFormat;

		/**
		 * Create and setup QDateTimePicker calEnd
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calEnd_Create($strControlId = null) {
			$this->calEnd = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calEnd->Name = QApplication::Translate('End');
			$this->calEnd->DateTime = $this->objAppointment->End;
			$this->calEnd->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calEnd;
		}

		/**
		 * Create and setup QLabel lblEnd
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblEnd_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblEnd = new QLabel($this->objParentObject, $strControlId);
			$this->lblEnd->Name = QApplication::Translate('End');
			$this->strEndDateTimeFormat = $strDateTimeFormat;
			$this->lblEnd->Text = sprintf($this->objAppointment->End) ? $this->objAppointment->End->__toString($this->strEndDateTimeFormat) : null;
			return $this->lblEnd;
		}

		protected $strEndDateTimeFormat;

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objAppointment->Description;
			$this->txtDescription->Required = true;
			$this->txtDescription->MaxLength = Appointment::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objAppointment->Description;
			$this->lblDescription->Required = true;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QTextBox txtLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLocation_Create($strControlId = null) {
			$this->txtLocation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLocation->Name = QApplication::Translate('Location');
			$this->txtLocation->Text = $this->objAppointment->Location;
			$this->txtLocation->MaxLength = Appointment::LocationMaxLength;
			return $this->txtLocation;
		}

		/**
		 * Create and setup QLabel lblLocation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLocation_Create($strControlId = null) {
			$this->lblLocation = new QLabel($this->objParentObject, $strControlId);
			$this->lblLocation->Name = QApplication::Translate('Location');
			$this->lblLocation->Text = $this->objAppointment->Location;
			return $this->lblLocation;
		}

		/**
		 * Create and setup QTextBox txtAdditionalInformation
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAdditionalInformation_Create($strControlId = null) {
			$this->txtAdditionalInformation = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAdditionalInformation->Name = QApplication::Translate('Additional Information');
			$this->txtAdditionalInformation->Text = $this->objAppointment->AdditionalInformation;
			$this->txtAdditionalInformation->MaxLength = Appointment::AdditionalInformationMaxLength;
			return $this->txtAdditionalInformation;
		}

		/**
		 * Create and setup QLabel lblAdditionalInformation
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAdditionalInformation_Create($strControlId = null) {
			$this->lblAdditionalInformation = new QLabel($this->objParentObject, $strControlId);
			$this->lblAdditionalInformation->Name = QApplication::Translate('Additional Information');
			$this->lblAdditionalInformation->Text = $this->objAppointment->AdditionalInformation;
			return $this->lblAdditionalInformation;
		}



		/**
		 * Refresh this MetaControl with Data from the local Appointment object.
		 * @param boolean $blnReload reload Appointment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAppointment->Reload();

			if ($this->lblAppointmentId) if ($this->blnEditMode) $this->lblAppointmentId->Text = $this->objAppointment->AppointmentId;

			if ($this->calStart) $this->calStart->DateTime = $this->objAppointment->Start;
			if ($this->lblStart) $this->lblStart->Text = sprintf($this->objAppointment->Start) ? $this->objAppointment->__toString($this->strStartDateTimeFormat) : null;

			if ($this->calEnd) $this->calEnd->DateTime = $this->objAppointment->End;
			if ($this->lblEnd) $this->lblEnd->Text = sprintf($this->objAppointment->End) ? $this->objAppointment->__toString($this->strEndDateTimeFormat) : null;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objAppointment->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objAppointment->Description;

			if ($this->txtLocation) $this->txtLocation->Text = $this->objAppointment->Location;
			if ($this->lblLocation) $this->lblLocation->Text = $this->objAppointment->Location;

			if ($this->txtAdditionalInformation) $this->txtAdditionalInformation->Text = $this->objAppointment->AdditionalInformation;
			if ($this->lblAdditionalInformation) $this->lblAdditionalInformation->Text = $this->objAppointment->AdditionalInformation;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC APPOINTMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Appointment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAppointment() {
			try {
				// Update any fields for controls that have been created
				if ($this->calStart) $this->objAppointment->Start = $this->calStart->DateTime;
				if ($this->calEnd) $this->objAppointment->End = $this->calEnd->DateTime;
				if ($this->txtDescription) $this->objAppointment->Description = $this->txtDescription->Text;
				if ($this->txtLocation) $this->objAppointment->Location = $this->txtLocation->Text;
				if ($this->txtAdditionalInformation) $this->objAppointment->AdditionalInformation = $this->txtAdditionalInformation->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Appointment object
				$this->objAppointment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Appointment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAppointment() {
			$this->objAppointment->Delete();
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
				case 'Appointment': return $this->objAppointment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Appointment fields -- will be created dynamically if not yet created
				case 'AppointmentIdControl':
					if (!$this->lblAppointmentId) return $this->lblAppointmentId_Create();
					return $this->lblAppointmentId;
				case 'AppointmentIdLabel':
					if (!$this->lblAppointmentId) return $this->lblAppointmentId_Create();
					return $this->lblAppointmentId;
				case 'StartControl':
					if (!$this->calStart) return $this->calStart_Create();
					return $this->calStart;
				case 'StartLabel':
					if (!$this->lblStart) return $this->lblStart_Create();
					return $this->lblStart;
				case 'EndControl':
					if (!$this->calEnd) return $this->calEnd_Create();
					return $this->calEnd;
				case 'EndLabel':
					if (!$this->lblEnd) return $this->lblEnd_Create();
					return $this->lblEnd;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'LocationControl':
					if (!$this->txtLocation) return $this->txtLocation_Create();
					return $this->txtLocation;
				case 'LocationLabel':
					if (!$this->lblLocation) return $this->lblLocation_Create();
					return $this->lblLocation;
				case 'AdditionalInformationControl':
					if (!$this->txtAdditionalInformation) return $this->txtAdditionalInformation_Create();
					return $this->txtAdditionalInformation;
				case 'AdditionalInformationLabel':
					if (!$this->lblAdditionalInformation) return $this->lblAdditionalInformation_Create();
					return $this->lblAdditionalInformation;
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
					// Controls that point to Appointment fields
					case 'AppointmentIdControl':
						return ($this->lblAppointmentId = QType::Cast($mixValue, 'QControl'));
					case 'StartControl':
						return ($this->calStart = QType::Cast($mixValue, 'QControl'));
					case 'EndControl':
						return ($this->calEnd = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'LocationControl':
						return ($this->txtLocation = QType::Cast($mixValue, 'QControl'));
					case 'AdditionalInformationControl':
						return ($this->txtAdditionalInformation = QType::Cast($mixValue, 'QControl'));
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