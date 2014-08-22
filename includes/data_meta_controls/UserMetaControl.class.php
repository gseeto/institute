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
			
			if ($this->lstCountry) {
					$this->lstCountry->RemoveAllItems();
				$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);
				$objCountryArray = CountryList::LoadAll();
				if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
					$objListItem = new QListItem($objCountry->Name, $objCountry->Id);
					if (($this->objUser->Country) && ($this->objUser->Country->Id == $objCountry->Id))
						$objListItem->Selected = true;
					$this->lstCountry->AddItem($objListItem);
				}
			}
			if ($this->lblCountryId) $this->lblCountryId->Text = ($this->objUser->Country) ? $this->objUser->Country->Name : null;
			
			if ($this->lstTitle) {
					$this->lstTitle->RemoveAllItems();
				$this->lstTitle->AddItem(QApplication::Translate('- Select One -'), null);
				$objTitleArray = TitleList::LoadAll();
				if ($objTitleArray) foreach ($objTitleArray as $objTitle) {
					$objListItem = new QListItem($objTitle->Name, $objTitle->Id);
					if (($this->objUser->Title) && ($this->objUser->Title->Id == $objTitle->Id))
						$objListItem->Selected = true;
					$this->lstTitle->AddItem($objListItem);
				}
			}
			if ($this->lblTitleId) $this->lblTitleId->Text = ($this->objUser->Title) ? $this->objUser->Title->Name : null;

			if ($this->lstTenure) {
					$this->lstTenure->RemoveAllItems();
				$this->lstTenure->AddItem(QApplication::Translate('- Select One -'), null);
				$objTenureArray = TenureList::LoadAll();
				if ($objTenureArray) foreach ($objTenureArray as $objTenure) {
					$objListItem = new QListItem($objTenure->Range, $objTenure->Id);
					if (($this->objUser->Tenure) && ($this->objUser->Tenure->Id == $objTenure->Id))
						$objListItem->Selected = true;
					$this->lstTenure->AddItem($objListItem);
				}
			}
			if ($this->lblTenureId) $this->lblTenureId->Text = ($this->objUser->Tenure) ? $this->objUser->Tenure->Range : null;
			
		}
		
		// Overwriting the function
		public function lstCountry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCountry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCountryCursor = CountryList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCountry = CountryList::InstantiateCursor($objCountryCursor)) {
				$objListItem = new QListItem($objCountry->Name, $objCountry->Id);
				if (($this->objUser->Country) && ($this->objUser->Country->Id == $objCountry->Id))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCountry;
		}
		
		public function lstTenure_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTenure = new QListBox($this->objParentObject, $strControlId);
			$this->lstTenure->Name = QApplication::Translate('Tenure');
			$this->lstTenure->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTenureCursor = TenureList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTenure = TenureList::InstantiateCursor($objTenureCursor)) {
				$objListItem = new QListItem($objTenure->Range, $objTenure->Id);
				if (($this->objUser->Tenure) && ($this->objUser->Tenure->Id == $objTenure->Id))
					$objListItem->Selected = true;
				$this->lstTenure->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTenure;
		}
		
		public function lstTitle_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTitle = new QListBox($this->objParentObject, $strControlId);
			$this->lstTitle->Name = QApplication::Translate('Title');
			$this->lstTitle->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTitleCursor = TitleList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTitle = TitleList::InstantiateCursor($objTitleCursor)) {
				$objListItem = new QListItem($objTitle->Name, $objTitle->Id);
				if (($this->objUser->Title) && ($this->objUser->Title->Id == $objTitle->Id))
					$objListItem->Selected = true;
				$this->lstTitle->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTitle;
		}
		
		public function lblTenureId_Create($strControlId = null) {
			$this->lblTenureId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTenureId->Name = QApplication::Translate('Tenure');
			$this->lblTenureId->Text = ($this->objUser->Tenure) ? $this->objUser->Tenure->Range : null;
			return $this->lblTenureId;
		}
		
		public function lblTitleId_Create($strControlId = null) {
			$this->lblTitleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitleId->Name = QApplication::Translate('Title');
			$this->lblTitleId->Text = ($this->objUser->Title) ? $this->objUser->Title->Name : null;
			return $this->lblTitleId;
		}
		
		public function lblCountryId_Create($strControlId = null) {
			$this->lblCountryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountryId->Name = QApplication::Translate('Country');
			$this->lblCountryId->Text = ($this->objUser->Country) ? $this->objUser->Country->Name : null;
			return $this->lblCountryId;
		}
	}
	
?>