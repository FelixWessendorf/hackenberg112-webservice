<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Rank class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Rank object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a RankMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read Rank $Rank the actual Rank data class being edited
	 * property QLabel $RankIdControl
	 * property-read QLabel $RankIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QIntegerTextBox $SortControl
	 * property-read QLabel $SortLabel
	 * property QTextBox $SexControl
	 * property-read QLabel $SexLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class RankMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Rank objRank
		 * @access protected
		 */
		protected $objRank;

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

		// Controls that allow the editing of Rank's individual data fields
        /**
         * @var QLabel lblRankId;
         * @access protected
         */
		protected $lblRankId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QIntegerTextBox txtSort;
         * @access protected
         */
		protected $txtSort;

        /**
         * @var QTextBox txtSex;
         * @access protected
         */
		protected $txtSex;


		// Controls that allow the viewing of Rank's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblSort
         * @access protected
         */
		protected $lblSort;

        /**
         * @var QLabel lblSex
         * @access protected
         */
		protected $lblSex;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * RankMetaControl to edit a single Rank object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Rank object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RankMetaControl
		 * @param Rank $objRank new or existing Rank object
		 */
		 public function __construct($objParentObject, Rank $objRank) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this RankMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Rank object
			$this->objRank = $objRank;

			// Figure out if we're Editing or Creating New
			if ($this->objRank->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this RankMetaControl
		 * @param integer $intRankId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Rank object creation - defaults to CreateOrEdit
 		 * @return RankMetaControl
		 */
		public static function Create($objParentObject, $intRankId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intRankId)) {
				$objRank = Rank::Load($intRankId);

				// Rank was found -- return it!
				if ($objRank)
					return new RankMetaControl($objParentObject, $objRank);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Rank object with PK arguments: ' . $intRankId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new RankMetaControl($objParentObject, new Rank());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RankMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Rank object creation - defaults to CreateOrEdit
		 * @return RankMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRankId = QApplication::PathInfo(0);
			return RankMetaControl::Create($objParentObject, $intRankId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this RankMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Rank object creation - defaults to CreateOrEdit
		 * @return RankMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intRankId = QApplication::QueryString('intRankId');
			return RankMetaControl::Create($objParentObject, $intRankId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblRankId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblRankId_Create($strControlId = null) {
			$this->lblRankId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRankId->Name = QApplication::Translate('Rank Id');
			if ($this->blnEditMode)
				$this->lblRankId->Text = $this->objRank->RankId;
			else
				$this->lblRankId->Text = 'N/A';
			return $this->lblRankId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objRank->Name;
			$this->txtName->Required = true;
			$this->txtName->MaxLength = Rank::NameMaxLength;
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
			$this->lblName->Text = $this->objRank->Name;
			$this->lblName->Required = true;
			return $this->lblName;
		}

		/**
		 * Create and setup QIntegerTextBox txtSort
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtSort_Create($strControlId = null) {
			$this->txtSort = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtSort->Name = QApplication::Translate('Sort');
			$this->txtSort->Text = $this->objRank->Sort;
			$this->txtSort->Required = true;
			return $this->txtSort;
		}

		/**
		 * Create and setup QLabel lblSort
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblSort_Create($strControlId = null, $strFormat = null) {
			$this->lblSort = new QLabel($this->objParentObject, $strControlId);
			$this->lblSort->Name = QApplication::Translate('Sort');
			$this->lblSort->Text = $this->objRank->Sort;
			$this->lblSort->Required = true;
			$this->lblSort->Format = $strFormat;
			return $this->lblSort;
		}

		/**
		 * Create and setup QTextBox txtSex
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSex_Create($strControlId = null) {
			$this->txtSex = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSex->Name = QApplication::Translate('Sex');
			$this->txtSex->Text = $this->objRank->Sex;
			$this->txtSex->Required = true;
			$this->txtSex->MaxLength = Rank::SexMaxLength;
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
			$this->lblSex->Text = $this->objRank->Sex;
			$this->lblSex->Required = true;
			return $this->lblSex;
		}



		/**
		 * Refresh this MetaControl with Data from the local Rank object.
		 * @param boolean $blnReload reload Rank from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objRank->Reload();

			if ($this->lblRankId) if ($this->blnEditMode) $this->lblRankId->Text = $this->objRank->RankId;

			if ($this->txtName) $this->txtName->Text = $this->objRank->Name;
			if ($this->lblName) $this->lblName->Text = $this->objRank->Name;

			if ($this->txtSort) $this->txtSort->Text = $this->objRank->Sort;
			if ($this->lblSort) $this->lblSort->Text = $this->objRank->Sort;

			if ($this->txtSex) $this->txtSex->Text = $this->objRank->Sex;
			if ($this->lblSex) $this->lblSex->Text = $this->objRank->Sex;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC RANK OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Rank instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveRank() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objRank->Name = $this->txtName->Text;
				if ($this->txtSort) $this->objRank->Sort = $this->txtSort->Text;
				if ($this->txtSex) $this->objRank->Sex = $this->txtSex->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Rank object
				$this->objRank->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Rank instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteRank() {
			$this->objRank->Delete();
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
				case 'Rank': return $this->objRank;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Rank fields -- will be created dynamically if not yet created
				case 'RankIdControl':
					if (!$this->lblRankId) return $this->lblRankId_Create();
					return $this->lblRankId;
				case 'RankIdLabel':
					if (!$this->lblRankId) return $this->lblRankId_Create();
					return $this->lblRankId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'SortControl':
					if (!$this->txtSort) return $this->txtSort_Create();
					return $this->txtSort;
				case 'SortLabel':
					if (!$this->lblSort) return $this->lblSort_Create();
					return $this->lblSort;
				case 'SexControl':
					if (!$this->txtSex) return $this->txtSex_Create();
					return $this->txtSex;
				case 'SexLabel':
					if (!$this->lblSex) return $this->lblSex_Create();
					return $this->lblSex;
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
					// Controls that point to Rank fields
					case 'RankIdControl':
						return ($this->lblRankId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'SortControl':
						return ($this->txtSort = QType::Cast($mixValue, 'QControl'));
					case 'SexControl':
						return ($this->txtSex = QType::Cast($mixValue, 'QControl'));
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