<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the Documento class.  It uses the code-generated
	 * DocumentoMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a Documento columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both documento_edit.php AND
	 * documento_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class DocumentoEditPanel extends QPanel {
		// Local instance of the DocumentoMetaControl
		/**
		 * @var DocumentoMetaControl
		 */
		protected $mctDocumento;

		// Controls for Documento's Data Fields
		public $lblIdDOCUMENTO;
		public $txtNombre;
		public $txtDuracion;
		public $lstDOCUMENTOIdDOCUMENTOObject;

		// Other ListBoxes (if applicable) via Unique ReverseReferences and ManyToMany References
		public $lstDocumentosFase;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intIdDOCUMENTO = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/DocumentoEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the DocumentoMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctDocumento = DocumentoMetaControl::Create($this, $intIdDOCUMENTO);

			// Call MetaControl's methods to create qcontrols based on Documento's data fields
			$this->lblIdDOCUMENTO = $this->mctDocumento->lblIdDOCUMENTO_Create();
			$this->txtNombre = $this->mctDocumento->txtNombre_Create();
			$this->txtDuracion = $this->mctDocumento->txtDuracion_Create();
			$this->lstDOCUMENTOIdDOCUMENTOObject = $this->mctDocumento->lstDOCUMENTOIdDOCUMENTOObject_Create();
			$this->lstDocumentosFase = $this->mctDocumento->lstDocumentosFase_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('Documento'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctDocumento->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the DocumentoMetaControl
			$this->mctDocumento->SaveDocumento();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the DocumentoMetaControl
			$this->mctDocumento->DeleteDocumento();
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