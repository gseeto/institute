<?php
	/**
	 * The Application class is an abstract class that statically provides
	 * information and global utilities for the entire web application.
	 *
	 * Custom constants for this webapp, as well as global variables and global
	 * methods should be declared in this abstract class (declared statically).
	 *
	 * This Application class should extend from the ApplicationBase class in
	 * the framework.
	 */
	abstract class QApplication extends QApplicationBase {
		/**
		 * @var Login
		 */
		public static $Login;

		/**
		 * @var integer
		 */
		public static $LoginId;
		
		/**
		 * This is called by the PHP5 Autoloader.  This method overrides the
		 * one in ApplicationBase.
		 *
		 * @return void
		 */
		public static function Autoload($strClassName) {
			// First use the Qcodo Autoloader
			if (!parent::Autoload($strClassName)) {
				// For Administration-related Forms' ContentPanels
				$strFile = sprintf('%s/admin/panels/%s.class.php', __WWW__, $strClassName);
				if (is_file($strFile)) require($strFile);
				
				// For Scorecard Societal Dialogs
				$strFile = sprintf('%s/scorecard/societal/%s.class.php', __WWW__, $strClassName);
				if (is_file($strFile)) require($strFile);
			}
		}

		/**
		 * Overriding QApplicationBase
		 * @return void
		 */
		public static function InitializeAutoIncludes() {
			$strFile = sprintf('%s/auto_includes/i18n.inc.php', __INCLUDES__);
				if (is_file($strFile)) require($strFile);
				
			$strFile = sprintf('%s/auto_includes/login.inc.php', __INCLUDES__);
				if (is_file($strFile)) require($strFile);
		}
		
		/**
		 * Method will setup Internationalization.
		 * NOTE: This method has been INTENTIONALLY left incomplete.
		 * @return void
		 */
		public static function InitializeI18n() {
			if (isset($_SESSION)) {
				if (array_key_exists('country_code', $_SESSION))
					QApplication::$CountryCode = $_SESSION['country_code'];
				if (array_key_exists('language_code', $_SESSION))
					QApplication::$LanguageCode = $_SESSION['language_code'];
			}

			/*
			 * NOTE: This is where you would implement code to do Language Setting discovery, as well, for example:
			 *   Checking against $_GET['language_code']
			 *   checking against session (example provided below)
			 *   Checking the URL
			 *   etc.
			 * Options to do this are left to the developer.
			 */

			// Initialize I18n if QApplication::$LanguageCode is set
			if (QApplication::$LanguageCode)
				QI18n::Initialize();

			// Otherwise, you could optionally run with some defaults
			else {
				// QApplication::$CountryCode = 'us';
				// QApplication::$LanguageCode = 'en';
				// QI18n::Initialize();
			}
		}

		////////////////////////////
		// QApplication Customizations (e.g. EncodingType, Disallowing PHP Session, etc.)
		////////////////////////////
		// public static $EncodingType = 'ISO-8859-1';
		// public static $EnableSession = false;

		////////////////////////////
		// Additional Static Methods
		////////////////////////////
		// NOTE: Define any other custom global WebApplication functions (if any) here...
		/**
		 * Called to setup QApplication::$Login
		 * from data in Session
		 * @return void
		 */
		public static function InitializeLogin() {
			
			if (array_key_exists('intLoginId', $_SESSION)) {
				QApplication::$Login = Login::Load($_SESSION['intLoginId']);

				// If NO object, update session
				if (!QApplication::$Login) {
					$_SESSION['intLoginId'] = null;
					unset($_SESSION['intLoginId']);

				// Otherwise, process
				} else {
					QApplication::$LoginId = QApplication::$Login->Id;
				}
				
			}
		}
		
		/**
		 * Called by the LoginForm to actually peform a Login
		 * @param Login $objLogin
		 * @return void
		 */
		public static function Login(Login $objLogin) {
			QApplication::$Login = $objLogin;
			QApplication::$LoginId = $objLogin->Id;
			$_SESSION['intLoginId'] = $objLogin->Id;
		}
		
		/**
		 * Logs the user out (if applicable) and will redirect user to the login page
		 * @return void
		 */
		public static function Logout() {
			$_SESSION['intLoginId'] = null;
			unset($_SESSION['intLoginId']);
			QApplication::$Login = null;
			QApplication::$LoginId = null;
			QApplication::Redirect(__SUBDIRECTORY__.'/home/');
		}
	}
?>