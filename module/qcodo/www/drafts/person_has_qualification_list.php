<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the PersonHasQualification class.  It uses the code-generated
	 * PersonHasQualificationDataGrid control which has meta-methods to help with
	 * easily creating/defining PersonHasQualification columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both person_has_qualification_list.php AND
	 * person_has_qualification_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class PersonHasQualificationListForm extends QForm {
		// Local instance of the Meta DataGrid to list PersonHasQualifications
		protected $dtgPersonHasQualifications;

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
			$this->dtgPersonHasQualifications = new PersonHasQualificationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgPersonHasQualifications->CssClass = 'datagrid';
			$this->dtgPersonHasQualifications->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgPersonHasQualifications->Paginator = new QPaginator($this->dtgPersonHasQualifications);
			$this->dtgPersonHasQualifications->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/person_has_qualification_edit.php';
			$this->dtgPersonHasQualifications->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for person_has_qualification's properties, or you
			// can traverse down QQN::person_has_qualification() to display fields that are down the hierarchy)
			$this->dtgPersonHasQualifications->MetaAddColumn(QQN::PersonHasQualification()->Person);
			$this->dtgPersonHasQualifications->MetaAddColumn(QQN::PersonHasQualification()->Qualification);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// person_has_qualification_list.tpl.php as the included HTML template file
	PersonHasQualificationListForm::Run('PersonHasQualificationListForm');
?>