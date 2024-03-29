<?php

// Load the QCubed Development Framework
require('../qcubed.inc.php');

require(__FORMBASE_CLASSES__ . '/LicenciaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Licencia class.  It uses the code-generated
 * LicenciaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Licencia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both licencia_edit.php AND
 * licencia_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class LicenciaEditForm extends LicenciaEditFormBase {

    protected $calCalendarIni;
    protected $calCalendarFin;
    protected $calCalendarCNP;

// Override Form Event Handlers as Needed
//		protected function Form_Run() {}
//		protected function Form_Load() {}
//		protected function Form_Create() {}
//
//
    protected function Form_Create() {
        parent::Form_Create();

// Use the CreateFromPathInfo shortcut (this can also be done manually using the LicenciaMetaControl constructor)
// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctLicencia = LicenciaMetaControl::CreateFromPathInfo($this);

// Call MetaControl's methods to create qcontrols based on Licencia's data fields
        $this->lblIdLICENCIA = $this->mctLicencia->lblIdLICENCIA_Create();
        $this->lstEMPRESAIdEMPRESAObject = $this->mctLicencia->lstEMPRESAIdEMPRESAObject_Create();
        $this->lstPROVEEDORIdPROVEEDORObject = $this->mctLicencia->lstPROVEEDORIdPROVEEDORObject_Create();

        $this->calFechaInicio = $this->mctLicencia->calFechaInicio_Create();
        $this->calFechaFin = $this->mctLicencia->calFechaFin_Create();
        $this->calFechaFinEstimada = $this->mctLicencia->calFechaFinEstimada_Create();
        $this->txtNumeroProforma = $this->mctLicencia->txtNumeroProforma_Create();
        $this->txtNumeroCNP = $this->mctLicencia->txtNumeroCNP_Create();
        $this->calVencimientoCNP = $this->mctLicencia->calVencimientoCNP_Create();
        $this->txtStatus = $this->mctLicencia->txtStatus_Create();
        $this->txtFormaPago = $this->mctLicencia->txtFormaPago_Create();
        $this->txtTipo = $this->mctLicencia->txtTipo_Create();
        $this->txtFlete = $this->mctLicencia->txtFlete_Create();
        $this->txtSeguro = $this->mctLicencia->txtSeguro_Create();
        $this->lstPROCESOIdPROCESOObject = $this->mctLicencia->lstPROCESOIdPROCESOObject_Create();


        $this->calCalendarIni = new QCalendar($this, $this->calFechaInicio);       //Inicializo el QCalendar
        $this->calFechaInicio->AddAction(new QFocusEvent(), new QBlurControlAction($this->calFechaInicio));		//Creo el evento cuando haga clic sobre calCotFecha
        $this->calFechaInicio->AddAction(new QClickEvent(), new QShowCalendarAction($this->calCalendarIni));
        $this->calFechaInicio->AddAction(new QChangeEvent(), new QAjaxAction('Date_Change'));


        $this->calCalendarFin = new QCalendar($this, $this->calFechaFin);       //Inicializo el QCalendar
        $this->calFechaFin->AddAction(new QFocusEvent(), new QBlurControlAction($this->calFechaFin));		//Creo el evento cuando haga clic sobre calCotFecha
        $this->calFechaFin->AddAction(new QClickEvent(), new QShowCalendarAction($this->calCalendarFin));


        $this->calCalendarCNP = new QCalendar($this, $this->calVencimientoCNP);       //Inicializo el QCalendar
        $this->calVencimientoCNP->AddAction(new QFocusEvent(), new QBlurControlAction($this->calVencimientoCNP));		//Creo el evento cuando haga clic sobre calCotFecha
        $this->calVencimientoCNP->AddAction(new QClickEvent(), new QShowCalendarAction($this->calCalendarCNP));


// Create Buttons and Actions on this Form
        $this->btnSave = new QButton($this);
        $this->btnSave->Text = QApplication::Translate('Save');
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
        $this->btnSave->CausesValidation = true;

        $this->btnCancel = new QButton($this);
        $this->btnCancel->Text = QApplication::Translate('Cancel');
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxAction('btnCancel_Click'));

        $this->btnDelete = new QButton($this);
        $this->btnDelete->Text = QApplication::Translate('Delete');
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('Licencia') . '?'));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->mctLicencia->EditMode;
    }

    protected function Date_Change() {
        // Whenever the user changes the selected listbox item, let's
        // update the label to reflect the selected item
        $date = $this->calFechaInicio->DateTime;

        //$newdate = strtotime ( '+180 day' , strtotime ( $date ) ) ;
        if ($this->lstPROCESOIdPROCESOObject) {
            $Proceso = Proceso::LoadByIdPROCESO((int)$this->lstPROCESOIdPROCESOObject->Text);
            $newdate = date( 'j M Y' , strtotime ( '+'.$Proceso->Duracion.' day' ,strtotime($date)));
            $this->calFechaFin->Text= $newdate;
            $this->calVencimientoCNP->Text= $newdate;
        }

    }

    protected function Form_Validate() {
// By default, we report that Custom Validations passed
        if ($this->calFechaInicio->DateTime > $this->calFechaFin->DateTime) {
            $this->calFechaFin->Warning = "La fecha debe ser inferior a la de inicio";
            return false;
        }


        $blnToReturn = true;

// Custom Validation Rules
// TODO: Be sure to set $blnToReturn to false if any custom validation fails!


        $blnFocused = false;
        foreach ($this->GetErrorControls() as $objControl) {
// Set Focus to the top-most invalid control
            if (!$blnFocused) {
                $objControl->Focus();
                $blnFocused = true;
            }

// Blink on ALL invalid controls
            $objControl->Blink();
        }

        return $blnToReturn;
    }

    protected function RedirectToListPage() {
        QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__ . '/licencia_list.php');
    }

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// licencia_edit.tpl.php as the included HTML template file
LicenciaEditForm::Run('LicenciaEditForm');
?>
