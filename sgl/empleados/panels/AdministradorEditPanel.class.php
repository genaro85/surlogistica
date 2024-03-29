<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Administrador class.  It uses the code-generated
	 * AdministradorMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Administrador columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both administrador_edit.php AND
	 * administrador_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class AdministradorEditPanel extends QPanel {
		// Local instance of the AdministradorMetaControl
		/**
		 * @var AdministradorMetaControl
		 */
		protected $mctAdministrador;

		// Controls for Administrador's Data Fields
		public $lblIdADMINISTRADOR;
		public $txtNombre;
		public $txtApellido;
		public $txtCedula;
		public $txtLogin;
		public $txtPassword;
		public $txtEmail;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References

		// Other Controls
		/**
		 * @var QButton Save
		 */
		public $btnSave;
		/**
		 * @var QButton Delete
		 */
		public $btnDelete;
		/**
		 * @var QButton Cancel
		 */
		public $btnCancel;

		// Callback
		protected $strClosePanelMethod;

		public function __construct($objParentObject, $strClosePanelMethod, $intIdADMINISTRADOR = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/AdministradorEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the AdministradorMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctAdministrador = AdministradorMetaControl::Create($this, $intIdADMINISTRADOR);

			// Call MetaControl's methods to create qcontrols based on Administrador's data fields
			$this->lblIdADMINISTRADOR = $this->mctAdministrador->lblIdADMINISTRADOR_Create();
			$this->txtNombre = $this->mctAdministrador->txtNombre_Create();
			$this->txtApellido = $this->mctAdministrador->txtApellido_Create();
			$this->txtCedula = $this->mctAdministrador->txtCedula_Create();
			$this->txtLogin = $this->mctAdministrador->txtLogin_Create();
			$this->txtPassword = $this->mctAdministrador->txtPassword_Create();
			$this->txtEmail = $this->mctAdministrador->txtEmail_Create();

			// Create Buttons and Actions on this Form
			$this->btnSave = new QButton($this);
			$this->btnSave->Text = QApplication::Translate('Save');
			$this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));
			$this->btnSave->CausesValidation = $this;

			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = QApplication::Translate('Cancel');
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));

			$this->btnDelete = new QButton($this);
			$this->btnDelete->Text = QApplication::Translate('Delete');
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Administrador'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctAdministrador->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the AdministradorMetaControl
			$this->mctAdministrador->SaveAdministrador();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the AdministradorMetaControl
			$this->mctAdministrador->DeleteAdministrador();
			$this->CloseSelf(true);
		}

		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->CloseSelf(false);
		}

		// Close Myself and Call ClosePanelMethod Callback
		protected function CloseSelf($blnChangesMade) {
			$strMethod = $this->strClosePanelMethod;
			$this->objForm->$strMethod($blnChangesMade);
		}
	
		
	}
?>