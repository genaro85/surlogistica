<?php
// This is the HTML template include file (.tpl.php) for the responsable_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.
// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = QApplication::Translate('Responsables') . ' - ' . QApplication::Translate('Listar Todos');
require(__CONFIGURATION__ . '/headerEmp.inc.php');
?>

<?php $this->RenderBegin() ?>

<div id="titleBar">
    <h2 id="right"><a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/index.php">&laquo; <?php _t('Go to "Form Drafts"'); ?></a></h2>
    <h2><?php _t('Listar Todos'); ?></h2>
    <h1><?php _t('Responsables'); ?></h1>
</div>

<?php $this->dtgResponsables->Render(); ?>

<p class="create">
    <a href="<?php _p(__VIRTUAL_DIRECTORY__ . __FORM_EMPLEADO__) ?>/responsable_edit.php"><?php _t('Crear un nuevo'); ?> <?php _t('Responsable'); ?></a>
</p>

<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ . '/footer.inc.php'); ?>