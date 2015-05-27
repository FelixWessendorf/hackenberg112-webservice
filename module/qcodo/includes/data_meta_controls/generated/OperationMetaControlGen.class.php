<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Operation class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Operation object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a OperationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Operation $Operation the actual Operation data class being edited
	 * property QLabel $OperationIdControl
	 * property-read QLabel $OperationIdLabel
	 * property QDateTimePicker $DateControl
	 * property-read QLabel $DateLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class OperationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Operation objOperation
		 * @access protected
		 */
		protected $objOperation;

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

		// Controls that allow the editing of Operation's individual data fields
        /**
         * @var QLabel lblOperationId;
         * @access protected
         */
		protected $lblOperationId;

        /**
         * @var QDateTimePicker calDate;
         * @access protected
         */
		protected $calDate;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;


		// Controls that allow the viewing of Operation's individual data fields
        /**
         * @var QLabel lblDate
         * @access protected
         */
		protected $lblDate;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * OperationMetaControl to edit a single Operation object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Operation object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OperationMetaControl
		 * @param Operation $objOperation new or existing Operation object
		 */
		 public function __construct($objParentObject, Operation $objOperation) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this OperationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Operation object
			$this->objOperation = $objOperation;

			// Figure out if we're Editing or Creating New
			if ($this->objOperation->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this OperationMetaControl
		 * @param integer $intOperationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Operation object creation - defaults to CreateOrEdit
 		 * @return OperationMetaControl
		 */
		public static function Create($objParentObject, $intOperationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intOperationId)) {
				$objOperation = Operation::Load($intOperationId);

				// Operation was found -- return it!
				if ($objOperation)
					return new OperationMetaControl($objParentObject, $objOperation);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Operation object with PK arguments: ' . $intOperationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new OperationMetaControl($objParentObject, new Operation());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OperationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Operation object creation - defaults to CreateOrEdit
		 * @return OperationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intOperationId = QApplication::PathInfo(0);
			return OperationMetaControl::Create($objParentObject, $intOperationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this OperationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Operation object creation - defaults to CreateOrEdit
		 * @return OperationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intOperationId = QApplication::QueryString('intOperationId');
			return OperationMetaControl::Create($objParentObject, $intOperationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblOperationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOperationId_Create($strControlId = null) {
			$this->lblOperationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblOperationId->Name = QApplication::Translate('Operation Id');
			if ($this->blnEditMode)
				$this->lblOperationId->Text = $this->objOperation->OperationId;
			else
				$this->lblOperationId->Text = 'N/A';
			return $this->lblOperationId;
		}

		/**
		 * Create and setup QDateTimePicker calDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDate_Create($strControlId = null) {
			$this->calDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDate->Name = QApplication::Translate('Date');
			$this->calDate->DateTime = $this->objOperation->Date;
			$this->calDate->DateTimePickerType = QDateTimePickerType::Date;
			$this->calDate->Required = true;
			return $this->calDate;
		}

		/**
		 * Create and setup QLabel lblDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblDate->Name = QApplication::Translate('Date');
			$this->strDateDateTimeFormat = $strDateTimeFormat;
			$this->lblDate->Text = sprintf($this->objOperation->Date) ? $this->objOperation->Date->__toString($this->strDateDateTimeFormat) : null;
			$this->lblDate->Required = true;
			return $this->lblDate;
		}

		protected $strDateDateTimeFormat;

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objOperation->Description;
			$this->txtDescription->Required = true;
			$this->txtDescription->MaxLength = Operation::DescriptionMaxLength;
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
			$this->lblDescription->Text = $this->objOperation->Description;
			$this->lblDescription->Required = true;
			return $this->lblDescription;
		}



		/**
		 * Refresh this MetaControl with Data from the local Operation object.
		 * @param boolean $blnReload reload Operation from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objOperation->Reload();

			if ($this->lblOperationId) if ($this->blnEditMode) $this->lblOperationId->Text = $this->objOperation->OperationId;

			if ($this->calDate) $this->calDate->DateTime = $this->objOperation->Date;
			if ($this->lblDate) $this->lblDate->Text = sprintf($this->objOperation->Date) ? $this->objOperation->__toString($this->strDateDateTimeFormat) : null;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objOperation->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objOperation->Description;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC OPERATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Operation instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveOperation() {
			try {
				// Update any fields for controls that have been created
				if ($this->calDate) $this->objOperation->Date = $this->calDate->DateTime;
				if ($this->txtDescription) $this->objOperation->Description = $this->txtDescription->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Operation object
				$this->objOperation->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Operation instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteOperation() {
			$this->objOperation->Delete();
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
				case 'Operation': return $this->objOperation;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Operation fields -- will be created dynamically if not yet created
				case 'OperationIdControl':
					if (!$this->lblOperationId) return $this->lblOperationId_Create();
					return $this->lblOperationId;
				case 'OperationIdLabel':
					if (!$this->lblOperationId) return $this->lblOperationId_Create();
					return $this->lblOperationId;
				case 'DateControl':
					if (!$this->calDate) return $this->calDate_Create();
					return $this->calDate;
				case 'DateLabel':
					if (!$this->lblDate) return $this->lblDate_Create();
					return $this->lblDate;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
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
					// Controls that point to Operation fields
					case 'OperationIdControl':
						return ($this->lblOperationId = QType::Cast($mixValue, 'QControl'));
					case 'DateControl':
						return ($this->calDate = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
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