<?php
	require(__META_CONTROLS_GEN__ . '/ProcesoMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Proceso class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Proceso object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ProcesoMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package My QCubed Application
	 * @subpackage MetaControls
	 */
	class ProcesoMetaControl extends ProcesoMetaControlGen {
		// Initialize fields with default values from database definition
/*		
		public function __construct($objParentObject, Proceso $objProceso) {
			parent::__construct($objParentObject,$objProceso);
			if ( !$this->blnEditMode ){
				$this->objProceso->Initialize();
			}
		}
*/

            public function txtDuracion_Create($strControlId = null) {
			$this->txtDuracion = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtDuracion->Name = QApplication::Translate('Duracion (en días)');
			$this->txtDuracion->Text = $this->objProceso->Duracion;
			$this->txtDuracion->Required = true;
			return $this->txtDuracion;
		}
	}
?>