<?php
	require(__DATAGEN_META_CONTROLS__ . '/LoginMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * Login class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single Login object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LoginMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 */
	class LoginMetaControl extends LoginMetaControlGen {
		public function lblRoleId_Create($strControlId = null) {
			$this->lblRoleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblRoleId->Name = QApplication::Translate('Role');
			$this->lblRoleId->Text = ($this->objLogin->Role) ? $this->objLogin->Role->Name : null;
			return $this->lblRoleId;
		}
		
		public function Refresh($blnReload = false) {
			parent::Refresh($blnReload);
			if ($this->lblRoleId) $this->lblRoleId->Text = ($this->objLogin->Role) ? $this->objLogin->Role->Name : null;
		}
	}
?>