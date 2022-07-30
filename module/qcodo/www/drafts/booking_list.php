<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Booking class.  It uses the code-generated
	 * BookingDataGrid control which has meta-methods to help with
	 * easily creating/defining Booking columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both booking_list.php AND
	 * booking_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 */
	class BookingListForm extends QForm {
		// Local instance of the Meta DataGrid to list Bookings
		protected $dtgBookings;

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
			$this->dtgBookings = new BookingDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgBookings->CssClass = 'datagrid';
			$this->dtgBookings->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgBookings->Paginator = new QPaginator($this->dtgBookings);
			$this->dtgBookings->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/booking_edit.php';
			$this->dtgBookings->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for booking's properties, or you
			// can traverse down QQN::booking() to display fields that are down the hierarchy)
			$this->dtgBookings->MetaAddColumn('Id');
			$this->dtgBookings->MetaAddColumn(QQN::Booking()->Team);
			$this->dtgBookings->MetaAddColumn('Amount');
			$this->dtgBookings->MetaAddColumn('CreatedAt');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// booking_list.tpl.php as the included HTML template file
	BookingListForm::Run('BookingListForm');
?>