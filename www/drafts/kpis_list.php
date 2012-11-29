<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Kpis class.  It uses the code-generated
	 * KpisDataGrid control which has meta-methods to help with
	 * easily creating/defining Kpis columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both kpis_list.php AND
	 * kpis_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class KpisListForm extends QForm {
		// Local instance of the Meta DataGrid to list Kpises
		protected $dtgKpises;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgKpises = new KpisDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgKpises->CssClass = 'datagrid';
			$this->dtgKpises->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgKpises->Paginator = new QPaginator($this->dtgKpises);
			$this->dtgKpises->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/kpis_edit.php';
			$this->dtgKpises->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for kpis's properties, or you
			// can traverse down QQN::kpis() to display fields that are down the hierarchy)
			$this->dtgKpises->MetaAddColumn('Id');
			$this->dtgKpises->MetaAddColumn(QQN::Kpis()->Strategy);
			$this->dtgKpises->MetaAddColumn(QQN::Kpis()->Scorecard);
			$this->dtgKpises->MetaAddColumn('Rating');
			$this->dtgKpises->MetaAddColumn('Kpi');
			$this->dtgKpises->MetaAddColumn('Count');
			$this->dtgKpises->MetaAddColumn('Comments');
			$this->dtgKpises->MetaAddColumn(QQN::Kpis()->ModifiedByObject);
			$this->dtgKpises->MetaAddColumn('Modified');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// kpis_list.tpl.php as the included HTML template file
	KpisListForm::Run('KpisListForm');
?>