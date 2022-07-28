<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Team class.  It uses the code-generated
	 * TeamDataGrid control which has meta-methods to help with
	 * easily creating/defining Team columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both team_list.php AND
	 * team_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class TeamListForm extends QForm {
		// Local instance of the Meta DataGrid to list Teams
		protected $dtgTeams;

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
			$this->dtgTeams = new TeamDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgTeams->CssClass = 'datagrid';
			$this->dtgTeams->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgTeams->Paginator = new QPaginator($this->dtgTeams);
			$this->dtgTeams->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/team_edit.php';
			$this->dtgTeams->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for team's properties, or you
			// can traverse down QQN::team() to display fields that are down the hierarchy)
			$this->dtgTeams->MetaAddColumn('Id');
			$this->dtgTeams->MetaAddColumn('Name');
			$this->dtgTeams->MetaAddColumn('Members');
			$this->dtgTeams->MetaAddColumn('CreatedAt');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// team_list.tpl.php as the included HTML template file
	TeamListForm::Run('TeamListForm');
?>