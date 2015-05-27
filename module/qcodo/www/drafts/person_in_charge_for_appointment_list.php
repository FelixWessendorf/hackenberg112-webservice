<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the PersonInChargeForAppointment class.  It uses the code-generated
	 * PersonInChargeForAppointmentDataGrid control which has meta-methods to help with
	 * easily creating/defining PersonInChargeForAppointment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both person_in_charge_for_appointment_list.php AND
	 * person_in_charge_for_appointment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class PersonInChargeForAppointmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list PersonInChargeForAppointments
		protected $dtgPersonInChargeForAppointments;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgPersonInChargeForAppointments = new PersonInChargeForAppointmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgPersonInChargeForAppointments->CssClass = 'datagrid';
			$this->dtgPersonInChargeForAppointments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgPersonInChargeForAppointments->Paginator = new QPaginator($this->dtgPersonInChargeForAppointments);
			$this->dtgPersonInChargeForAppointments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/person_in_charge_for_appointment_edit.php';
			$this->dtgPersonInChargeForAppointments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for person_in_charge_for_appointment's properties, or you
			// can traverse down QQN::person_in_charge_for_appointment() to display fields that are down the hierarchy)
			$this->dtgPersonInChargeForAppointments->MetaAddColumn(QQN::PersonInChargeForAppointment()->Appointment);
			$this->dtgPersonInChargeForAppointments->MetaAddColumn(QQN::PersonInChargeForAppointment()->Person);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// person_in_charge_for_appointment_list.tpl.php as the included HTML template file
	PersonInChargeForAppointmentListForm::Run('PersonInChargeForAppointmentListForm');
?>