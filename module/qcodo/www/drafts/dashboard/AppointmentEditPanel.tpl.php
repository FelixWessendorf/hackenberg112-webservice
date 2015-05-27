<?php
	// This is the HTML template include file (.tpl.php) for appointmentEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblAppointmentId->RenderWithName(); ?>

		<?php $_CONTROL->calStart->RenderWithName(); ?>

		<?php $_CONTROL->calEnd->RenderWithName(); ?>

		<?php $_CONTROL->txtDescription->RenderWithName(); ?>

		<?php $_CONTROL->txtLocation->RenderWithName(); ?>

		<?php $_CONTROL->txtAdditionalInformation->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
