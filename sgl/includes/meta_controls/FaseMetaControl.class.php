<?php

require(__META_CONTROLS_GEN__ . '/FaseMetaControlGen.class.php');

/**
 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
 * and QControls to perform the Create, Edit, and Delete functionality of the
 * Fase class.  This code-generated class extends from
 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
 * display an HTML form that can manipulate a single Fase object.
 *
 * To take advantage of some (or all) of these control objects, you
 * must create a new QForm or QPanel which instantiates a FaseMetaControl
 * class.
 *
 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
 * or overwrite this file.
 *
 * @package My QCubed Application
 * @subpackage MetaControls
 */
class FaseMetaControl extends FaseMetaControlGen {

    // Initialize fields with default values from database definition
    /*
      public function __construct($objParentObject, Fase $objFase) {
      parent::__construct($objParentObject,$objFase);
      if ( !$this->blnEditMode ){
      $this->objFase->Initialize();
      }
      }
     */
    public function lstPROCESOIdPROCESOObject_Create($strControlId = null) {
        $this->lstPROCESOIdPROCESOObject = new QListBox($this->objParentObject, $strControlId);
        $this->lstPROCESOIdPROCESOObject->Name = QApplication::Translate('Proceso');
        $this->lstPROCESOIdPROCESOObject->Required = true;
        if (!$this->blnEditMode)
            $this->lstPROCESOIdPROCESOObject->AddItem(QApplication::Translate('- Select One -'), null);
        $objPROCESOIdPROCESOObjectArray = Proceso::LoadAll();
        if ($objPROCESOIdPROCESOObjectArray)
            foreach ($objPROCESOIdPROCESOObjectArray as $objPROCESOIdPROCESOObject) {
                $objListItem = new QListItem($objPROCESOIdPROCESOObject->__toString(), $objPROCESOIdPROCESOObject->IdPROCESO);
                if (($this->objFase->PROCESOIdPROCESOObject) && ($this->objFase->PROCESOIdPROCESOObject->IdPROCESO == $objPROCESOIdPROCESOObject->IdPROCESO))
                    $objListItem->Selected = true;
                $this->lstPROCESOIdPROCESOObject->AddItem($objListItem);
            }
        return $this->lstPROCESOIdPROCESOObject;
    }

    public function lstFASEIdFASEObject_Create($strControlId = null) {
        $this->lstFASEIdFASEObject = new QListBox($this->objParentObject, $strControlId);
        $this->lstFASEIdFASEObject->Name = QApplication::Translate('Fase anterior');
        $this->lstFASEIdFASEObject->AddItem(QApplication::Translate('- Select One -'), null);
        $objFASEIdFASEObjectArray = Fase::LoadAll();
        if ($objFASEIdFASEObjectArray)
            foreach ($objFASEIdFASEObjectArray as $objFASEIdFASEObject) {
                $objListItem = new QListItem($objFASEIdFASEObject->__toString(), $objFASEIdFASEObject->IdFASE);
                if (($this->objFase->FASEIdFASEObject) && ($this->objFase->FASEIdFASEObject->IdFASE == $objFASEIdFASEObject->IdFASE))
                    $objListItem->Selected = true;
                $this->lstFASEIdFASEObject->AddItem($objListItem);
            }
        return $this->lstFASEIdFASEObject;
    }

    public function txtDuracion_Create($strControlId = null) {
        $this->txtDuracion = new QIntegerTextBox($this->objParentObject, $strControlId);
        $this->txtDuracion->Name = QApplication::Translate('Duracion (en días)');
        $this->txtDuracion->Text = $this->objFase->Duracion;
        return $this->txtDuracion;
    }

    public function txtIcono_Create($strControlId = null) {

        $this->txtIcono = new QFileAsset($this->objParentObject, $strControlId);
        $this->txtIcono->TemporaryUploadPath = __ARCHIVE_DIRECTORY__;
        if ($this->objFase->Icono) {
            $this->txtIcono->SetFile(__ARCHIVE_DIRECTORY__ . $this->objFase->Icono);
        }
        $this->txtIcono->ClickToView = true;
        $this->txtIcono->CssClass = 'file_asset';
        $this->txtIcono->imgFileIcon->CssClass = 'file_asset_icon';
        $this->txtIcono->Name = QApplication::Translate('Icon');

        return $this->txtIcono;
    }

}

?>