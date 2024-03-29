<?php
// Load the QCubed Development Framework
require('../qcubed.inc.php');

require(__FORMBASE_CLASSES__ . '/FaseLicenciaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the FaseLicencia class.  It uses the code-generated
 * FaseLicenciaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a FaseLicencia columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 *
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both fase_licencia_edit.php AND
 * fase_licencia_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FaseLicenciaEditForm extends FaseLicenciaEditFormBase {
    // Override Form Event Handlers as Needed
    protected $calCalendar6;
    protected $calCalendar7;
//		protected function Form_Run() {}

//		protected function Form_Load() {}

//		protected function Form_Create() {}
    protected function Form_Create() {
        parent::Form_Create();

        $this->calCalendar6 = new QCalendar($this, $this->calFASEFechaInicio);
        $this->calCalendar7 = new QCalendar($this, $this->calFASEFechaFin);

        // Use the CreateFromPathInfo shortcut (this can also be done manually using the FaseLicenciaMetaControl constructor)
        // MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
        $this->mctFaseLicencia = FaseLicenciaMetaControl::CreateFromPathInfo($this);

        // Call MetaControl's methods to create qcontrols based on FaseLicencia's data fields
        $this->lstLICENCIAIdLICENCIAObject = $this->mctFaseLicencia->lstLICENCIAIdLICENCIAObject_Create();

        $this->lstFASEIdFASEObject = $this->mctFaseLicencia->lstFASEIdFASEObject_Create();
        $this->calFASEFechaInicio = $this->mctFaseLicencia->calFASEFechaInicio_Create();
        $this->calFASEFechaFin = $this->mctFaseLicencia->calFASEFechaFin_Create();

        // Calendar Actions
        $this->calCalendar6 = new QCalendar($this, $this->calFASEFechaInicio);
        $this->calFASEFechaInicio->AddAction(new QFocusEvent(), new QBlurControlAction($this->calFASEFechaInicio));		//Creo el evento cuando haga clic sobre calCotFecha
        $this->calFASEFechaInicio->AddAction(new QClickEvent(), new QShowCalendarAction($this->calCalendar6));

        $this->calCalendar7 = new QCalendar($this, $this->calFASEFechaFin);
        $this->calFASEFechaFin->AddAction(new QFocusEvent(), new QBlurControlAction($this->calFASEFechaFin));		//Creo el evento cuando haga clic sobre calCotFecha
        $this->calFASEFechaFin->AddAction(new QClickEvent(), new QShowCalendarAction($this->calCalendar7));




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
        $this->btnDelete->AddAction(new QClickEvent(), new QConfirmAction(QApplication::Translate('Are you SURE you want to DELETE this') . ' ' . QApplication::Translate('FaseLicencia') . '?'));
        $this->btnDelete->AddAction(new QClickEvent(), new QAjaxAction('btnDelete_Click'));
        $this->btnDelete->Visible = $this->mctFaseLicencia->EditMode;
    }

    protected function Form_Validate() {
// By default, we report that Custom Validations passed
        if ($this->calFASEFechaFin->DateTime){
        if ($this->calFASEFechaInicio->DateTime > $this->calFASEFechaFin->DateTime) {
            $this->calFASEFechaFin->Warning = "La fecha de fin debe ser posterior a la fecha de inicio";
            return false;
        }
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
        QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__ . '/fase_licencia_list.php');
    }

}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// fase_licencia_edit.tpl.php as the included HTML template file
FaseLicenciaEditForm::Run('FaseLicenciaEditForm');
?>