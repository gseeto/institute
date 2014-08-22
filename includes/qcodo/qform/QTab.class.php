<?php
	/**
	 * This is a wrapper for a jquery Tab control.
	 * 
	 * Additionally, you can add customizable logic for any or all of the following, as well:
	 *  - __construct()
	 *  - ParsePostData()
	 *  - Validate()
	 *  - GetEndScript()
	 *  - GetEndHtml()
	 */
	class QTab extends QControl {
		protected $tabArray;
		protected $contentArray;

		/**
		 * If this control needs to update itself from the $_POST data, the logic to do so
		 * will be performed in this method.
		 */
		public function ParsePostData() {}

		/**
		 * If this control has validation rules, the logic to do so
		 * will be performed in this method.
		 * @return boolean
		 */
		public function Validate() {return true;}

		/**
		 * Get the HTML for this Control.
		 * @return string
		 */
		public function GetControlHtml() {
			// Pull any Attributes
			$strAttributes = $this->GetAttributes();

			// Pull any styles
			if ($strStyle = $this->GetStyleAttributes())
				$strStyle = 'style="' . $strStyle . '"';

			// Return the HTML.
			$strReturn = '<div id="tabs">';
			$strReturn.= '<ul>';
			
			$i = 1;
			foreach($this->tabArray as $tab) {
				$strReturn.= '<li><a href="#tabs-'.$i.'">'. $tab . '</a></li>';
				$i++;
			}
			$strReturn.= '</ul>';
			$i = 1;
			foreach($this->contentArray as $content) {
				$strReturn.= '<div id="tabs-'.$i.'">';
				$strReturn.= $content;
				$strReturn.= '</div>';
				$i++;
			}
			$strReturn.= '</div>';	
			return $strReturn;
		}

		/**
		 * Constructor for this control
		 * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
		 * @param string $strControlId optional control ID
		 */
		public function __construct($objParentObject, $tabs, $content, $strControlId = null) {
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

			// Setup Control-specific CSS and JS files to be loaded
			// Paths are relative to the __CSS_ASSETS__ and __JS_ASSETS__ directories
			// Multiple files can be specified, as well, by separating with a comma
//			$this->strJavaScripts = 'custom.js, ../path/to/prototype.js, etc.js';
//			$this->strStyleSheets = 'custom.css';

			// copy title and content arrays for use in displaying
			$this->tabArray = $tabs;
			$this->contentArray = $content;
		}

		// For any JavaScript calls that need to be made whenever this control is rendered or re-rendered
		public function GetEndScript() {
			$strToReturn = parent::GetEndScript();
			$strToReturn .= '$( "#tabs" ).tabs();';
			return $strToReturn;
		}

		// For any HTML code that needs to be rendered at the END of the QForm when this control is INITIALLY rendered.
//		public function GetEndHtml() {
//			$strToReturn = parent::GetEndHtml();
//			return $strToReturn;
//		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				case 'Tabs': return $this->tabArray;
				case 'Content': return $this->contentArray;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}

		/////////////////////////
		// Public Properties: SET
		/////////////////////////
		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {

				case 'Tabs': 
					try {
						return ($this->tabArray = QType::Cast($mixValue, QType::ArrayType));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
				case 'Content': 
					try {
						return ($this->contentArray = QType::Cast($mixValue, QType::ArrayType));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) { $objExc->IncrementOffset(); throw $objExc; }
			}
		}
	}
?>