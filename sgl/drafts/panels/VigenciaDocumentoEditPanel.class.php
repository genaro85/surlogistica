<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the VigenciaDocumento class.  It uses the code-generated
	 * VigenciaDocumentoMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a VigenciaDocumento columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both vigencia_documento_edit.php AND
	 * vigencia_documento_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class VigenciaDocumentoEditPanel extends QPanel {
		// Local instance of the VigenciaDocumentoMetaControl
		/**
		 * @var VigenciaDocumentoMetaControl
		 */
		protected $mctVigenciaDocumento;

		// Controls for VigenciaDocumento's Data Fields
		public $lstLICENCIAIdLICENCIAObject;
		public $lstDOCUMENTOSFASEDOCUMENTOIdDOCUMENTOObject;
		public $calFechaOtorgado;
		public $calFechaVencimieto;
		public $txtNumRef;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intLICENCIAIdLICENCIA = null, $intDOCUMENTOSFASEDOCUMENTOIdDOCUMENTO = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/VigenciaDocumentoEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the VigenciaDocumentoMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctVigenciaDocumento = VigenciaDocumentoMetaControl::Create($this, $intLICENCIAIdLICENCIA, $intDOCUMENTOSFASEDOCUMENTOIdDOCUMENTO);

			// Call MetaControl's methods to create qcontrols based on VigenciaDocumento's data fields
			$this->lstLICENCIAIdLICENCIAObject = $this->mctVigenciaDocumento->lstLICENCIAIdLICENCIAObject_Create();
			$this->lstDOCUMENTOSFASEDOCUMENTOIdDOCUMENTOObject = $this->mctVigenciaDocumento->lstDOCUMENTOSFASEDOCUMENTOIdDOCUMENTOObject_Create();
			$this->calFechaOtorgado = $this->mctVigenciaDocumento->calFechaOtorgado_Create();
			$this->calFechaVencimieto = $this->mctVigenciaDocumento->calFechaVencimieto_Create();
			$this->txtNumRef = $this->mctVigenciaDocumento->txtNumRef_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('VigenciaDocumento'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctVigenciaDocumento->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the VigenciaDocumentoMetaControl
			$this->mctVigenciaDocumento->SaveVigenciaDocumento();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the VigenciaDocumentoMetaControl
			$this->mctVigenciaDocumento->DeleteVigenciaDocumento();
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