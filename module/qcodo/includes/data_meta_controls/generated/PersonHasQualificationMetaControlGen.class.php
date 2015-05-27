<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PersonHasQualification class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PersonHasQualification object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonHasQualificationMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read PersonHasQualification $PersonHasQualification the actual PersonHasQualification data class being edited
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property QListBox $QualificationIdControl
	 * property-read QLabel $QualificationIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PersonHasQualificationMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PersonHasQualification objPersonHasQualification
		 * @access protected
		 */
		protected $objPersonHasQualification;

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

		// Controls that allow the editing of PersonHasQualification's individual data fields
        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;

        /**
         * @var QListBox lstQualification;
         * @access protected
         */
		protected $lstQualification;


		// Controls that allow the viewing of PersonHasQualification's individual data fields
        /**
         * @var QLabel lblPersonId
         * @access protected
         */
		protected $lblPersonId;

        /**
         * @var QLabel lblQualificationId
         * @access protected
         */
		protected $lblQualificationId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * PersonHasQualificationMetaControl to edit a single PersonHasQualification object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PersonHasQualification object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonHasQualificationMetaControl
		 * @param PersonHasQualification $objPersonHasQualification new or existing PersonHasQualification object
		 */
		 public function __construct($objParentObject, PersonHasQualification $objPersonHasQualification) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PersonHasQualificationMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PersonHasQualification object
			$this->objPersonHasQualification = $objPersonHasQualification;

			// Figure out if we're Editing or Creating New
			if ($this->objPersonHasQualification->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonHasQualificationMetaControl
		 * @param integer $intPersonId primary key value
		 * @param integer $intQualificationId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PersonHasQualification object creation - defaults to CreateOrEdit
 		 * @return PersonHasQualificationMetaControl
		 */
		public static function Create($objParentObject, $intPersonId = null, $intQualificationId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intPersonId) && strlen($intQualificationId)) {
				$objPersonHasQualification = PersonHasQualification::Load($intPersonId, $intQualificationId);

				// PersonHasQualification was found -- return it!
				if ($objPersonHasQualification)
					return new PersonHasQualificationMetaControl($objParentObject, $objPersonHasQualification);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PersonHasQualification object with PK arguments: ' . $intPersonId . ', ' . $intQualificationId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PersonHasQualificationMetaControl($objParentObject, new PersonHasQualification());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonHasQualificationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PersonHasQualification object creation - defaults to CreateOrEdit
		 * @return PersonHasQualificationMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intPersonId = QApplication::PathInfo(0);
			$intQualificationId = QApplication::PathInfo(1);
			return PersonHasQualificationMetaControl::Create($objParentObject, $intPersonId, $intQualificationId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonHasQualificationMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PersonHasQualification object creation - defaults to CreateOrEdit
		 * @return PersonHasQualificationMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intPersonId = QApplication::QueryString('intPersonId');
			$intQualificationId = QApplication::QueryString('intQualificationId');
			return PersonHasQualificationMetaControl::Create($objParentObject, $intPersonId, $intQualificationId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

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
				if (($this->objPersonHasQualification->Person) && ($this->objPersonHasQualification->Person->PersonId == $objPerson->PersonId))
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
			$this->lblPersonId->Text = ($this->objPersonHasQualification->Person) ? $this->objPersonHasQualification->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}

		/**
		 * Create and setup QListBox lstQualification
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstQualification_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstQualification = new QListBox($this->objParentObject, $strControlId);
			$this->lstQualification->Name = QApplication::Translate('Qualification');
			$this->lstQualification->Required = true;
			if (!$this->blnEditMode)
				$this->lstQualification->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objQualificationCursor = Qualification::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQualification = Qualification::InstantiateCursor($objQualificationCursor)) {
				$objListItem = new QListItem($objQualification->__toString(), $objQualification->QualificationId);
				if (($this->objPersonHasQualification->Qualification) && ($this->objPersonHasQualification->Qualification->QualificationId == $objQualification->QualificationId))
					$objListItem->Selected = true;
				$this->lstQualification->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstQualification;
		}

		/**
		 * Create and setup QLabel lblQualificationId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQualificationId_Create($strControlId = null) {
			$this->lblQualificationId = new QLabel($this->objParentObject, $strControlId);
			$this->lblQualificationId->Name = QApplication::Translate('Qualification');
			$this->lblQualificationId->Text = ($this->objPersonHasQualification->Qualification) ? $this->objPersonHasQualification->Qualification->__toString() : null;
			$this->lblQualificationId->Required = true;
			return $this->lblQualificationId;
		}



		/**
		 * Refresh this MetaControl with Data from the local PersonHasQualification object.
		 * @param boolean $blnReload reload PersonHasQualification from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPersonHasQualification->Reload();

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->PersonId);
					if (($this->objPersonHasQualification->Person) && ($this->objPersonHasQualification->Person->PersonId == $objPerson->PersonId))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objPersonHasQualification->Person) ? $this->objPersonHasQualification->Person->__toString() : null;

			if ($this->lstQualification) {
					$this->lstQualification->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstQualification->AddItem(QApplication::Translate('- Select One -'), null);
				$objQualificationArray = Qualification::LoadAll();
				if ($objQualificationArray) foreach ($objQualificationArray as $objQualification) {
					$objListItem = new QListItem($objQualification->__toString(), $objQualification->QualificationId);
					if (($this->objPersonHasQualification->Qualification) && ($this->objPersonHasQualification->Qualification->QualificationId == $objQualification->QualificationId))
						$objListItem->Selected = true;
					$this->lstQualification->AddItem($objListItem);
				}
			}
			if ($this->lblQualificationId) $this->lblQualificationId->Text = ($this->objPersonHasQualification->Qualification) ? $this->objPersonHasQualification->Qualification->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PERSONHASQUALIFICATION OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PersonHasQualification instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePersonHasQualification() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstPerson) $this->objPersonHasQualification->PersonId = $this->lstPerson->SelectedValue;
				if ($this->lstQualification) $this->objPersonHasQualification->QualificationId = $this->lstQualification->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PersonHasQualification object
				$this->objPersonHasQualification->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PersonHasQualification instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePersonHasQualification() {
			$this->objPersonHasQualification->Delete();
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
				case 'PersonHasQualification': return $this->objPersonHasQualification;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PersonHasQualification fields -- will be created dynamically if not yet created
				case 'PersonIdControl':
					if (!$this->lstPerson) return $this->lstPerson_Create();
					return $this->lstPerson;
				case 'PersonIdLabel':
					if (!$this->lblPersonId) return $this->lblPersonId_Create();
					return $this->lblPersonId;
				case 'QualificationIdControl':
					if (!$this->lstQualification) return $this->lstQualification_Create();
					return $this->lstQualification;
				case 'QualificationIdLabel':
					if (!$this->lblQualificationId) return $this->lblQualificationId_Create();
					return $this->lblQualificationId;
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
					// Controls that point to PersonHasQualification fields
					case 'PersonIdControl':
						return ($this->lstPerson = QType::Cast($mixValue, 'QControl'));
					case 'QualificationIdControl':
						return ($this->lstQualification = QType::Cast($mixValue, 'QControl'));
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