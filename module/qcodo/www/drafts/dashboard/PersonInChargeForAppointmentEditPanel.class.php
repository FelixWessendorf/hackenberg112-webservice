<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the PersonInChargeForAppointment class.  It uses the code-generated
	 * PersonInChargeForAppointmentMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a PersonInChargeForAppointment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both person_in_charge_for_appointment_edit.php AND
	 * person_in_charge_for_appointment_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class PersonInChargeForAppointmentEditPanel extends QPanel {
		// Local instance of the PersonInChargeForAppointmentMetaControl
		protected $mctPersonInChargeForAppointment;

		// Controls for PersonInChargeForAppointment's Data Fields
		public $lstAppointment;
		public $lstPerson;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		public $btnSave;
		public $btnDelete;
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intAppointmentId = null, $intPersonId = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = 'PersonInChargeForAppointmentEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the PersonInChargeForAppointmentMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctPersonInChargeForAppointment = PersonInChargeForAppointmentMetaControl::Create($this, $intAppointmentId, $intPersonId);

			// Call MetaControl's methods to create qcontrols based on PersonInChargeForAppointment's data fields
			$this->lstAppointment = $this->mctPersonInChargeForAppointment->lstAppointment_Create();
			$this->lstPerson = $this->mctPersonInChargeForAppointment->lstPerson_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('PersonInChargeForAppointment') . '?'));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctPersonInChargeForAppointment->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the PersonInChargeForAppointmentMetaControl
			$this->mctPersonInChargeForAppointment->SavePersonInChargeForAppointment();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the PersonInChargeForAppointmentMetaControl
			$this->mctPersonInChargeForAppointment->DeletePersonInChargeForAppointment();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	}
?>