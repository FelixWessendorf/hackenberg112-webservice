<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Rank class.  It uses the code-generated
	 * RankDataGrid control which has meta-methods to help with
	 * easily creating/defining Rank columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both rank_list.php AND
	 * rank_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class RankListForm extends QForm {
		// Local instance of the Meta DataGrid to list Ranks
		protected $dtgRanks;

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
			$this->dtgRanks = new RankDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRanks->CssClass = 'datagrid';
			$this->dtgRanks->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRanks->Paginator = new QPaginator($this->dtgRanks);
			$this->dtgRanks->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/rank_edit.php';
			$this->dtgRanks->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for rank's properties, or you
			// can traverse down QQN::rank() to display fields that are down the hierarchy)
			$this->dtgRanks->MetaAddColumn('RankId');
			$this->dtgRanks->MetaAddColumn('Name');
			$this->dtgRanks->MetaAddColumn('Sort');
			$this->dtgRanks->MetaAddColumn('Sex');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// rank_list.tpl.php as the included HTML template file
	RankListForm::Run('RankListForm');
?>