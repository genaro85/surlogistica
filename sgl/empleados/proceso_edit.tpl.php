<?php
	// This is the HTML template include file (.tpl.php) for the proceso_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Proceso') . ' - ' . $this->mctProceso->TitleVerb;
	require(__CONFIGURATION__ . '/headerEmp.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctProceso->TitleVerb); ?></h2>
		<h1><?php _t('Proceso')?></h1>
	</div>

	<div id="formControls">
		<?php //$this->lblIdPROCESO->RenderWithName(); ?>

		<?php $this->txtNombre->RenderWithName(); ?>

		<?php $this->txtDuracion->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>