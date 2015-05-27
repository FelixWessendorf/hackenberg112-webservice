<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the PersonInChargeForAppointment class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of PersonInChargeForAppointment objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this PersonInChargeForAppointmentListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package hackenberg112-webservice
	 * @subpackage Drafts
	 * 
	 */
	class PersonInChargeForAppointmentListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list PersonInChargeForAppointments
		public $dtgPersonInChargeForAppointments;

		// Other public QControls in this panel
		public $btnCreateNew;
		public $pxyEdit;

		// Callback Method Names
		protected $strSetEditPanelMethod;
		protected $strCloseEditPanelMethod;
		
		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = 'PersonInChargeForAppointmentListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgPersonInChargeForAppointments = new PersonInChargeForAppointmentDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgPersonInChargeForAppointments->CssClass = 'datagrid';
			$this->dtgPersonInChargeForAppointments->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgPersonInChargeForAppointments->Paginator = new QPaginator($this->dtgPersonInChargeForAppointments);
			$this->dtgPersonInChargeForAppointments->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgPersonInChargeForAppointments->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for person_in_charge_for_appointment's properties, or you
			// can traverse down QQN::person_in_charge_for_appointment() to display fields that are down the hierarchy)
			$this->dtgPersonInChargeForAppointments->MetaAddColumn(QQN::PersonInChargeForAppointment()->Appointment);
			$this->dtgPersonInChargeForAppointments->MetaAddColumn(QQN::PersonInChargeForAppointment()->Person);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('PersonInChargeForAppointment');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new PersonInChargeForAppointmentEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0], $strParameterArray[1]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new PersonInChargeForAppointmentEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>