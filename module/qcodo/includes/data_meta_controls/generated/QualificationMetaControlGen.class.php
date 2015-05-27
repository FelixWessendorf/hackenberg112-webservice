<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Qualification class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Qualification object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a QualificationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Qualification $Qualification the actual Qualification data class being edited
	 * property QLabel $QualificationIdControl
	 * property-read QLabel $QualificationIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class QualificationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Qualification objQualification
		 * @access protected
		 */
		protected $objQualification;

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

		// Controls that allow the editing of Qualification's individual data fields
        /**
         * @var QLabel lblQualificationId;
         * @access protected
         */
		protected $lblQualificationId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of Qualification's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * QualificationMetaControl to edit a single Qualification object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Qualification object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualificationMetaControl
		 * @param Qualification $objQualification new or existing Qualification object
		 */
		 public function __construct($objParentObject, Qualification $objQualification) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this QualificationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Qualification object
			$this->objQualification = $objQualification;

			// Figure out if we're Editing or Creating New
			if ($this->objQualification->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualificationMetaControl
		 * @param integer $intQualificationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Qualification object creation - defaults to CreateOrEdit
 		 * @return QualificationMetaControl
		 */
		public static function Create($objParentObject, $intQualificationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intQualificationId)) {
				$objQualification = Qualification::Load($intQualificationId);

				// Qualification was found -- return it!
				if ($objQualification)
					return new QualificationMetaControl($objParentObject, $objQualification);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Qualification object with PK arguments: ' . $intQualificationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new QualificationMetaControl($objParentObject, new Qualification());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualificationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Qualification object creation - defaults to CreateOrEdit
		 * @return QualificationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intQualificationId = QApplication::PathInfo(0);
			return QualificationMetaControl::Create($objParentObject, $intQualificationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this QualificationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Qualification object creation - defaults to CreateOrEdit
		 * @return QualificationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intQualificationId = QApplication::QueryString('intQualificationId');
			return QualificationMetaControl::Create($objParentObject, $intQualificationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblQualificationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQualificationId_Create($strControlId = null) {
			$this->lblQualificationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblQualificationId->Name = QApplication::Translate('Qualification Id');
			if ($this->blnEditMode)
				$this->lblQualificationId->Text = $this->objQualification->QualificationId;
			else
				$this->lblQualificationId->Text = 'N/A';
			return $this->lblQualificationId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objQualification->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Qualification::NameMaxLength;
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
			$this->lblName->Text = $this->objQualification->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}



		/**
		 * Refresh this MetaControl with Data from the local Qualification object.
		 * @param boolean $blnReload reload Qualification from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objQualification->Reload();

			if ($this->lblQualificationId) if ($this->blnEditMode) $this->lblQualificationId->Text = $this->objQualification->QualificationId;

			if ($this->txtName) $this->txtName->Text = $this->objQualification->Name;
			if ($this->lblName) $this->lblName->Text = $this->objQualification->Name;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC QUALIFICATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Qualification instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveQualification() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objQualification->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Qualification object
				$this->objQualification->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Qualification instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteQualification() {
			$this->objQualification->Delete();
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
				case 'Qualification': return $this->objQualification;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Qualification fields -- will be created dynamically if not yet created
				case 'QualificationIdControl':
					if (!$this->lblQualificationId) return $this->lblQualificationId_Create();
					return $this->lblQualificationId;
				case 'QualificationIdLabel':
					if (!$this->lblQualificationId) return $this->lblQualificationId_Create();
					return $this->lblQualificationId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
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
					// Controls that point to Qualification fields
					case 'QualificationIdControl':
						return ($this->lblQualificationId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
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