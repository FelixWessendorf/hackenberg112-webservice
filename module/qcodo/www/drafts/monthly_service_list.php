<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the MonthlyService class.  It uses the code-generated
	 * MonthlyServiceDataGrid control which has meta-methods to help with
	 * easily creating/defining MonthlyService columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both monthly_service_list.php AND
	 * monthly_service_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class MonthlyServiceListForm extends QForm {
		// Local instance of the Meta DataGrid to list MonthlyServices
		protected $dtgMonthlyServices;

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
			$this->dtgMonthlyServices = new MonthlyServiceDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMonthlyServices->CssClass = 'datagrid';
			$this->dtgMonthlyServices->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMonthlyServices->Paginator = new QPaginator($this->dtgMonthlyServices);
			$this->dtgMonthlyServices->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/monthly_service_edit.php';
			$this->dtgMonthlyServices->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for monthly_service's properties, or you
			// can traverse down QQN::monthly_service() to display fields that are down the hierarchy)
			$this->dtgMonthlyServices->MetaAddColumn('Month');
			$this->dtgMonthlyServices->MetaAddColumn(QQN::MonthlyService()->Person);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// monthly_service_list.tpl.php as the included HTML template file
	MonthlyServiceListForm::Run('MonthlyServiceListForm');
?>