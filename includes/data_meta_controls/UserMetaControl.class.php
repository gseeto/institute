<?php
	require(__DATAGEN_META_CONTROLS__ . '/UserMetaControlGen.class.php');

	/**
	 * This is a MetaControl customizable subclass, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality of the
	 * User class.  This code-generated class extends from
	 * the generated MetaControl class, which contains all the basic elements to help a QPanel or QForm
	 * display an HTML form that can manipulate a single User object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UserMetaControl
	 * class.
	 *
	 * This file is intended to be modified.  Subsequent code regenerations will NOT modify
	 * or overwrite this file.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 */
	class UserMetaControl extends UserMetaControlGen {
		public function lblGender_Create($strControlId = null) {
			$this->lblGender = new QLabel($this->objParentObject, $strControlId);
			$this->lblGender->Name = QApplication::Translate('Gender');
			$this->lblGender->Text = ($this->objUser->Gender) ? QApplication::Translate('Male') : QApplication::Translate('Female');
			return $this->lblGender;
		}
		
		public function Refresh($blnReload = false) {
			parent::Refresh($blnReload);
			if ($this->lblGender) $this->lblGender->Text = ($this->objUser->Gender) ? QApplication::Translate('Male') : QApplication::Translate('Female');
		}
	}
	
?>