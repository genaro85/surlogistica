<?php
	/**
	 * This is a quick-and-dirty draft QPanel object to do Create, Edit, and Delete functionality
	 * of the ListaProducto class.  It uses the code-generated
	 * ListaProductoMetaControl class, which has meta-methods to help with
	 * easily creating/defining controls to modify the fields of a ListaProducto columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both lista_producto_edit.php AND
	 * lista_producto_edit.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 */
	class ListaProductoEditPanel extends QPanel {
		// Local instance of the ListaProductoMetaControl
		/**
		 * @var ListaProductoMetaControl
		 */
		protected $mctListaProducto;

		// Controls for ListaProducto's Data Fields
		public $lstLICENCIAIdLICENCIAObject;
		public $lstPRODUCTOIdPRODUCTOObject;
		public $txtPRODUCTOCantidad;
		public $txtPRODUCTOVolumen;
		public $txtPRODUCTOUnidad;
		public $txtPRODUCTOCostoUnitario;

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

		public function __construct($objParentObject, $strClosePanelMethod, $intLICENCIAIdLICENCIA = null, $intPRODUCTOIdPRODUCTO = null, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Setup Callback and Template
			$this->strTemplate = __DOCROOT__ . __PANEL_DRAFTS__ . '/ListaProductoEditPanel.tpl.php';
			$this->strClosePanelMethod = $strClosePanelMethod;

			// Construct the ListaProductoMetaControl
			// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
			$this->mctListaProducto = ListaProductoMetaControl::Create($this, $intLICENCIAIdLICENCIA, $intPRODUCTOIdPRODUCTO);

			// Call MetaControl's methods to create qcontrols based on ListaProducto's data fields
			$this->lstLICENCIAIdLICENCIAObject = $this->mctListaProducto->lstLICENCIAIdLICENCIAObject_Create();
			$this->lstPRODUCTOIdPRODUCTOObject = $this->mctListaProducto->lstPRODUCTOIdPRODUCTOObject_Create();
			$this->txtPRODUCTOCantidad = $this->mctListaProducto->txtPRODUCTOCantidad_Create();
			$this->txtPRODUCTOVolumen = $this->mctListaProducto->txtPRODUCTOVolumen_Create();
			$this->txtPRODUCTOUnidad = $this->mctListaProducto->txtPRODUCTOUnidad_Create();
			$this->txtPRODUCTOCostoUnitario = $this->mctListaProducto->txtPRODUCTOCostoUnitario_Create();

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
			$this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(sprintf(QApplication::Translate('Are you SURE you want to DELETE this %s?'),  QApplication::Translate('ListaProducto'))));
			$this->btnDelete->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnDelete_Click'));
			$this->btnDelete->Visible = $this->mctListaProducto->EditMode;
		}

		// Control AjaxAction Event Handlers
		public function btnSave_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Save" processing to the ListaProductoMetaControl
			$this->mctListaProducto->SaveListaProducto();
			$this->CloseSelf(true);
		}

		public function btnDelete_Click($strFormId, $strControlId, $strParameter) {
			// Delegate "Delete" processing to the ListaProductoMetaControl
			$this->mctListaProducto->DeleteListaProducto();
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