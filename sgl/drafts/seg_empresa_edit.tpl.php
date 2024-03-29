<?php
	// This is the HTML template include file (.tpl.php) for the empresa_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Empresa') . ' - ' . $this->mctEmpresa->TitleVerb;
	require(__CONFIGURATION__ . '/headerAdmin.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctEmpresa->TitleVerb); ?></h2>
		<h1><?php _t('Empresa')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblIdEMPRESA->RenderWithName(); ?>

		<?php $this->txtNombre->RenderWithName(); ?>

		<?php $this->txtRif->RenderWithName(); ?>

		<?php $this->txtDireccion->RenderWithName(); ?>

		<?php $this->txtTelefono->RenderWithName(); ?>

		<?php $this->txtEmail->RenderWithName(); ?>

		<?php $this->txtLogin->RenderWithName(); ?>

		<?php $this->txtPassword->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>