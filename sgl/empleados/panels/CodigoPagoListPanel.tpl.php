<?php
	// This is the HTML template include file (.tpl.php) for CodigoPagoListPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard directory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<?php $_CONTROL->dtgCodigoPagos->Render(); ?>
	<p><?php $_CONTROL->btnCreateNew->Render(); ?></p>
