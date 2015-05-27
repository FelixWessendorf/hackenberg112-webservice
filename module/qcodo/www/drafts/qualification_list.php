<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Qualification class.  It uses the code-generated
	 * QualificationDataGrid control which has meta-methods to help with
	 * easily creating/defining Qualification columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both qualification_list.php AND
	 * qualification_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class QualificationListForm extends QForm {
		// Local instance of the Meta DataGrid to list Qualifications
		protected $dtgQualifications;

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
			$this->dtgQualifications = new QualificationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQualifications->CssClass = 'datagrid';
			$this->dtgQualifications->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQualifications->Paginator = new QPaginator($this->dtgQualifications);
			$this->dtgQualifications->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/qualification_edit.php';
			$this->dtgQualifications->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for qualification's properties, or you
			// can traverse down QQN::qualification() to display fields that are down the hierarchy)
			$this->dtgQualifications->MetaAddColumn('QualificationId');
			$this->dtgQualifications->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// qualification_list.tpl.php as the included HTML template file
	QualificationListForm::Run('QualificationListForm');
?>