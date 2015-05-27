<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the PersonInChargeForAppointment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single PersonInChargeForAppointment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a PersonInChargeForAppointmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage MetaControls
	 * property-read PersonInChargeForAppointment $PersonInChargeForAppointment the actual PersonInChargeForAppointment data class being edited
	 * property QListBox $AppointmentIdControl
	 * property-read QLabel $AppointmentIdLabel
	 * property QListBox $PersonIdControl
	 * property-read QLabel $PersonIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class PersonInChargeForAppointmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var PersonInChargeForAppointment objPersonInChargeForAppointment
		 * @access protected
		 */
		protected $objPersonInChargeForAppointment;

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

		// Controls that allow the editing of PersonInChargeForAppointment's individual data fields
        /**
         * @var QListBox lstAppointment;
         * @access protected
         */
		protected $lstAppointment;

        /**
         * @var QListBox lstPerson;
         * @access protected
         */
		protected $lstPerson;


		// Controls that allow the viewing of PersonInChargeForAppointment's individual data fields
        /**
         * @var QLabel lblAppointmentId
         * @access protected
         */
		protected $lblAppointmentId;

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
		 * PersonInChargeForAppointmentMetaControl to edit a single PersonInChargeForAppointment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single PersonInChargeForAppointment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonInChargeForAppointmentMetaControl
		 * @param PersonInChargeForAppointment $objPersonInChargeForAppointment new or existing PersonInChargeForAppointment object
		 */
		 public function __construct($objParentObject, PersonInChargeForAppointment $objPersonInChargeForAppointment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this PersonInChargeForAppointmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked PersonInChargeForAppointment object
			$this->objPersonInChargeForAppointment = $objPersonInChargeForAppointment;

			// Figure out if we're Editing or Creating New
			if ($this->objPersonInChargeForAppointment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonInChargeForAppointmentMetaControl
		 * @param integer $intAppointmentId primary key value
		 * @param integer $intPersonId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing PersonInChargeForAppointment object creation - defaults to CreateOrEdit
 		 * @return PersonInChargeForAppointmentMetaControl
		 */
		public static function Create($objParentObject, $intAppointmentId = null, $intPersonId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAppointmentId) && strlen($intPersonId)) {
				$objPersonInChargeForAppointment = PersonInChargeForAppointment::Load($intAppointmentId, $intPersonId);

				// PersonInChargeForAppointment was found -- return it!
				if ($objPersonInChargeForAppointment)
					return new PersonInChargeForAppointmentMetaControl($objParentObject, $objPersonInChargeForAppointment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a PersonInChargeForAppointment object with PK arguments: ' . $intAppointmentId . ', ' . $intPersonId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new PersonInChargeForAppointmentMetaControl($objParentObject, new PersonInChargeForAppointment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonInChargeForAppointmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PersonInChargeForAppointment object creation - defaults to CreateOrEdit
		 * @return PersonInChargeForAppointmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAppointmentId = QApplication::PathInfo(0);
			$intPersonId = QApplication::PathInfo(1);
			return PersonInChargeForAppointmentMetaControl::Create($objParentObject, $intAppointmentId, $intPersonId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this PersonInChargeForAppointmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing PersonInChargeForAppointment object creation - defaults to CreateOrEdit
		 * @return PersonInChargeForAppointmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAppointmentId = QApplication::QueryString('intAppointmentId');
			$intPersonId = QApplication::QueryString('intPersonId');
			return PersonInChargeForAppointmentMetaControl::Create($objParentObject, $intAppointmentId, $intPersonId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QListBox lstAppointment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAppointment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAppointment = new QListBox($this->objParentObject, $strControlId);
			$this->lstAppointment->Name = QApplication::Translate('Appointment');
			$this->lstAppointment->Required = true;
			if (!$this->blnEditMode)
				$this->lstAppointment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAppointmentCursor = Appointment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAppointment = Appointment::InstantiateCursor($objAppointmentCursor)) {
				$objListItem = new QListItem($objAppointment->__toString(), $objAppointment->AppointmentId);
				if (($this->objPersonInChargeForAppointment->Appointment) && ($this->objPersonInChargeForAppointment->Appointment->AppointmentId == $objAppointment->AppointmentId))
					$objListItem->Selected = true;
				$this->lstAppointment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAppointment;
		}

		/**
		 * Create and setup QLabel lblAppointmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAppointmentId_Create($strControlId = null) {
			$this->lblAppointmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAppointmentId->Name = QApplication::Translate('Appointment');
			$this->lblAppointmentId->Text = ($this->objPersonInChargeForAppointment->Appointment) ? $this->objPersonInChargeForAppointment->Appointment->__toString() : null;
			$this->lblAppointmentId->Required = true;
			return $this->lblAppointmentId;
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
				if (($this->objPersonInChargeForAppointment->Person) && ($this->objPersonInChargeForAppointment->Person->PersonId == $objPerson->PersonId))
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
			$this->lblPersonId->Text = ($this->objPersonInChargeForAppointment->Person) ? $this->objPersonInChargeForAppointment->Person->__toString() : null;
			$this->lblPersonId->Required = true;
			return $this->lblPersonId;
		}



		/**
		 * Refresh this MetaControl with Data from the local PersonInChargeForAppointment object.
		 * @param boolean $blnReload reload PersonInChargeForAppointment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objPersonInChargeForAppointment->Reload();

			if ($this->lstAppointment) {
					$this->lstAppointment->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAppointment->AddItem(QApplication::Translate('- Select One -'), null);
				$objAppointmentArray = Appointment::LoadAll();
				if ($objAppointmentArray) foreach ($objAppointmentArray as $objAppointment) {
					$objListItem = new QListItem($objAppointment->__toString(), $objAppointment->AppointmentId);
					if (($this->objPersonInChargeForAppointment->Appointment) && ($this->objPersonInChargeForAppointment->Appointment->AppointmentId == $objAppointment->AppointmentId))
						$objListItem->Selected = true;
					$this->lstAppointment->AddItem($objListItem);
				}
			}
			if ($this->lblAppointmentId) $this->lblAppointmentId->Text = ($this->objPersonInChargeForAppointment->Appointment) ? $this->objPersonInChargeForAppointment->Appointment->__toString() : null;

			if ($this->lstPerson) {
					$this->lstPerson->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstPerson->AddItem(QApplication::Translate('- Select One -'), null);
				$objPersonArray = Person::LoadAll();
				if ($objPersonArray) foreach ($objPersonArray as $objPerson) {
					$objListItem = new QListItem($objPerson->__toString(), $objPerson->PersonId);
					if (($this->objPersonInChargeForAppointment->Person) && ($this->objPersonInChargeForAppointment->Person->PersonId == $objPerson->PersonId))
						$objListItem->Selected = true;
					$this->lstPerson->AddItem($objListItem);
				}
			}
			if ($this->lblPersonId) $this->lblPersonId->Text = ($this->objPersonInChargeForAppointment->Person) ? $this->objPersonInChargeForAppointment->Person->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC PERSONINCHARGEFORAPPOINTMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's PersonInChargeForAppointment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SavePersonInChargeForAppointment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAppointment) $this->objPersonInChargeForAppointment->AppointmentId = $this->lstAppointment->SelectedValue;
				if ($this->lstPerson) $this->objPersonInChargeForAppointment->PersonId = $this->lstPerson->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the PersonInChargeForAppointment object
				$this->objPersonInChargeForAppointment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's PersonInChargeForAppointment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeletePersonInChargeForAppointment() {
			$this->objPersonInChargeForAppointment->Delete();
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
				case 'PersonInChargeForAppointment': return $this->objPersonInChargeForAppointment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to PersonInChargeForAppointment fields -- will be created dynamically if not yet created
				case 'AppointmentIdControl':
					if (!$this->lstAppointment) return $this->lstAppointment_Create();
					return $this->lstAppointment;
				case 'AppointmentIdLabel':
					if (!$this->lblAppointmentId) return $this->lblAppointmentId_Create();
					return $this->lblAppointmentId;
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
					// Controls that point to PersonInChargeForAppointment fields
					case 'AppointmentIdControl':
						return ($this->lstAppointment = QType::Cast($mixValue, 'QControl'));
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