<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Appointment class.  It uses the code-generated
	 * AppointmentDataGrid control which has meta-methods to help with
	 * easily creating/defining Appointment columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both appointment_list.php AND
	 * appointment_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class AppointmentListForm extends QForm {
		// Local instance of the Meta DataGrid to list Appointments
		protected $dtgAppointments;

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
			$this->dtgAppointments = new AppointmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgAppointments->CssClass = 'datagrid';
			$this->dtgAppointments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgAppointments->Paginator = new QPaginator($this->dtgAppointments);
			$this->dtgAppointments->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/appointment_edit.php';
			$this->dtgAppointments->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for appointment's properties, or you
			// can traverse down QQN::appointment() to display fields that are down the hierarchy)
			$this->dtgAppointments->MetaAddColumn('AppointmentId');
			$this->dtgAppointments->MetaAddColumn('Start');
			$this->dtgAppointments->MetaAddColumn('End');
			$this->dtgAppointments->MetaAddColumn('Description');
			$this->dtgAppointments->MetaAddColumn('Location');
			$this->dtgAppointments->MetaAddColumn('AdditionalInformation');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// appointment_list.tpl.php as the included HTML template file
	AppointmentListForm::Run('AppointmentListForm');
?>