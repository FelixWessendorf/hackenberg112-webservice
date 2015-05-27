<?php
	// This is the HTML template include file (.tpl.php) for the person_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent 
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Person') . ' - ' . $this->mctPerson->TitleVerb;
	require(__INCLUDES__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctPerson->TitleVerb); ?></h2>
		<h1><?php _t('Person')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblPersonId->RenderWithName(); ?>

		<?php $this->txtSex->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>

		<?php $this->txtLastName->RenderWithName(); ?>

		<?php $this->txtEMailAddress->RenderWithName(); ?>

		<?php $this->calDateOfBirth->RenderWithName(); ?>

		<?php $this->calDateOfEntry->RenderWithName(); ?>

		<?php $this->lstRank->RenderWithName(); ?>

		<?php $this->chkActive->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>	

<?php require(__INCLUDES__ .'/footer.inc.php'); ?>