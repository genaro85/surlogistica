<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Administrador class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Administrador objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this AdministradorListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 * 
	 * @package My QCubed Application
	 * @subpackage Drafts
	 * 
	 */
	class AdministradorListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Administradors
		/**
		 * @var AdministradorDataGrid
		 */
		public $dtgAdministradors;

		// Other public QControls in this panel
		/**
		 * @var QButton CreateNew
		 */
		public $btnCreateNew;
		/**
		 * @var QControlProxy ProxyEdit
		 */
		public $pxyEdit;

		// Callback Method Names
		/**
		 * @var string SetEditPanelMethod
		 */
		protected $strSetEditPanelMethod;
		/**
		 * @var string CloseEditPanelMethod
		 */
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
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/AdministradorListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgAdministradors = new AdministradorDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgAdministradors->CssClass = 'datagrid';
			$this->dtgAdministradors->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgAdministradors->Paginator = new QPaginator($this->dtgAdministradors);
			$this->dtgAdministradors->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgAdministradors->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ADMINISTRADOR's properties, or you
			// can traverse down QQN::ADMINISTRADOR() to display fields that are down the hierarchy)
			$this->dtgAdministradors->MetaAddColumn('IdADMINISTRADOR');
			$this->dtgAdministradors->MetaAddColumn('Nombre');
			$this->dtgAdministradors->MetaAddColumn('Apellido');
			$this->dtgAdministradors->MetaAddColumn('Cedula');
			$this->dtgAdministradors->MetaAddColumn('Login');
			$this->dtgAdministradors->MetaAddColumn('Password');
			$this->dtgAdministradors->MetaAddColumn('Email');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Administrador');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new AdministradorEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new AdministradorEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>