<?php
	/**
	 * @package Controls
	 */
	class QFileAsset extends QFileAssetBase {
		protected $strTemporaryUploadPath = '/tmp';
		
		public function __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);

			// Setup Default Properties
			$this->strTemplate = __DOCROOT__ . __PHP_ASSETS__ . '/QFileAsset.tpl.php';
			$this->DialogBoxCssClass = 'fileassetDbox';
			$this->UploadText = QApplication::Translate('Upload');
			$this->CancelText = QApplication::Translate('Cancel');
			$this->btnUpload->Text = '<img src="' . __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__ . '/add.png" alt="' . QApplication::Translate('Guardar') . '" border="0"/> ' . QApplication::Translate('Guardar');
			$this->btnDelete->Text = '<img src="' . __VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__ . '/delete.png" alt="' . QApplication::Translate('Borrar') . '" border="0"/> ' . QApplication::Translate('Borrar');
			$this->DialogBoxHtml = QApplication::Translate('<h1>Upload a File</h1><p>Please select a file to upload.</p>'); 
		}
	}
?>