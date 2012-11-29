<?php
	/**
	 * The abstract LoginGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Login subclass which
	 * extends this LoginGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Login class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property string $Username the value for strUsername 
	 * @property string $Password the value for strPassword 
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $RoleId the value for intRoleId 
	 * @property Role $Role the value for the Role object referenced by intRoleId 
	 * @property User $_User the value for the private _objUser (Read-Only) if set due to an expansion on the user.login_id reverse relationship
	 * @property User[] $_UserArray the value for the private _objUserArray (Read-Only) if set due to an ExpandAsArray on the user.login_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class LoginGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database column login.username
		 * @var string strUsername
		 */
		protected $strUsername;
		const UsernameDefault = null;


		/**
		 * Protected member variable that maps to the database column login.password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database PK Identity column login.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column login.role_id
		 * @var integer intRoleId
		 */
		protected $intRoleId;
		const RoleIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single User object
		 * (of type User), if this Login object was restored with
		 * an expansion on the user association table.
		 * @var User _objUser;
		 */
		private $_objUser;

		/**
		 * Private member variable that stores a reference to an array of User objects
		 * (of type User[]), if this Login object was restored with
		 * an ExpandAsArray on the user association table.
		 * @var User[] _objUserArray;
		 */
		private $_objUserArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column login.role_id.
		 *
		 * NOTE: Always use the Role property getter to correctly retrieve this Role object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Role objRole
		 */
		protected $objRole;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a Login from PK Info
		 * @param integer $intId
		 * @return Login
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Login::QuerySingle(
				QQ::Equal(QQN::Login()->Id, $intId)
			);
		}

		/**
		 * Load all Logins
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Login[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Login::QueryArray to perform the LoadAll query
			try {
				return Login::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Logins
		 * @return int
		 */
		public static function CountAll() {
			// Call Login::QueryCount to perform the CountAll query
			return Login::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Create/Build out the QueryBuilder object with Login-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'login');
			Login::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('login');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single Login object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Login the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Login object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Login::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return Login::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Login objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Login[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Login::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of Login objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'login_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Login-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Login::GetSelectFields($objQueryBuilder);
				Login::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Login::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Login
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'login';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'username', $strAliasPrefix . 'username');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'role_id', $strAliasPrefix . 'role_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Login from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Login::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Login
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'login__';


				$strAlias = $strAliasPrefix . 'user__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserArray[$intPreviousChildItemCount - 1];
						$objChildItem = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'login__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Login object
			$objToReturn = new Login();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'username', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'username'] : $strAliasPrefix . 'username';
			$objToReturn->strUsername = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'role_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'role_id'] : $strAliasPrefix . 'role_id';
			$objToReturn->intRoleId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'login__';

			// Check for Role Early Binding
			$strAlias = $strAliasPrefix . 'role_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objRole = Role::InstantiateDbRow($objDbRow, $strAliasPrefix . 'role_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for User Virtual Binding
			$strAlias = $strAliasPrefix . 'user__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUser = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Logins from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Login[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Login::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Login::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Login object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Login next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return Login::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Login object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Login
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Login::QuerySingle(
				QQ::Equal(QQN::Login()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Login objects,
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Login[]
		*/
		public static function LoadArrayByRoleId($intRoleId, $objOptionalClauses = null) {
			// Call Login::QueryArray to perform the LoadArrayByRoleId query
			try {
				return Login::QueryArray(
					QQ::Equal(QQN::Login()->RoleId, $intRoleId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Logins
		 * by RoleId Index(es)
		 * @param integer $intRoleId
		 * @return int
		*/
		public static function CountByRoleId($intRoleId, $objOptionalClauses = null) {
			// Call Login::QueryCount to perform the CountByRoleId query
			return Login::QueryCount(
				QQ::Equal(QQN::Login()->RoleId, $intRoleId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Login
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `login` (
							`username`,
							`password`,
							`role_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strUsername) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->intRoleId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('login', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`login`
						SET
							`username` = ' . $objDatabase->SqlVariable($this->strUsername) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`role_id` = ' . $objDatabase->SqlVariable($this->intRoleId) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Login
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Login with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`login`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Logins
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`login`');
		}

		/**
		 * Truncate login table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `login`');
		}

		/**
		 * Reload this Login from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Login object.');

			// Reload the Object
			$objReloaded = Login::Load($this->intId);

			// Update $this's local variables to match
			$this->strUsername = $objReloaded->strUsername;
			$this->strPassword = $objReloaded->strPassword;
			$this->RoleId = $objReloaded->RoleId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Login::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `login` (
					`username`,
					`password`,
					`id`,
					`role_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->strUsername) . ',
					' . $objDatabase->SqlVariable($this->strPassword) . ',
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intRoleId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return Login[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Login::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM login WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Login::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Login[]
		 */
		public function GetJournal() {
			return Login::GetJournalForId($this->intId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Username':
					// Gets the value for strUsername 
					// @return string
					return $this->strUsername;

				case 'Password':
					// Gets the value for strPassword 
					// @return string
					return $this->strPassword;

				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'RoleId':
					// Gets the value for intRoleId 
					// @return integer
					return $this->intRoleId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Role':
					// Gets the value for the Role object referenced by intRoleId 
					// @return Role
					try {
						if ((!$this->objRole) && (!is_null($this->intRoleId)))
							$this->objRole = Role::Load($this->intRoleId);
						return $this->objRole;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_User':
					// Gets the value for the private _objUser (Read-Only)
					// if set due to an expansion on the user.login_id reverse relationship
					// @return User
					return $this->_objUser;

				case '_UserArray':
					// Gets the value for the private _objUserArray (Read-Only)
					// if set due to an ExpandAsArray on the user.login_id reverse relationship
					// @return User[]
					return (array) $this->_objUserArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Username':
					// Sets the value for strUsername 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strUsername = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					// Sets the value for strPassword 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'RoleId':
					// Sets the value for intRoleId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objRole = null;
						return ($this->intRoleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Role':
					// Sets the value for the Role object referenced by intRoleId 
					// @param Role $mixValue
					// @return Role
					if (is_null($mixValue)) {
						$this->intRoleId = null;
						$this->objRole = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Role object
						try {
							$mixValue = QType::Cast($mixValue, 'Role');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Role object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Role for this Login');

						// Update Local Member Variables
						$this->objRole = $mixValue;
						$this->intRoleId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for User
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Users as an array of User objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/ 
		public function GetUserArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return User::LoadArrayByLoginId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Users
		 * @return int
		*/ 
		public function CountUsers() {
			if ((is_null($this->intId)))
				return 0;

			return User::CountByLoginId($this->intId);
		}

		/**
		 * Associates a User
		 * @param User $objUser
		 * @return void
		*/ 
		public function AssociateUser(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUser on this unsaved Login.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUser on this Login with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user`
				SET
					`login_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUser->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objUser->LoginId = $this->intId;
				$objUser->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a User
		 * @param User $objUser
		 * @return void
		*/ 
		public function UnassociateUser(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this unsaved Login.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this Login with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user`
				SET
					`login_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUser->Id) . ' AND
					`login_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUser->LoginId = null;
				$objUser->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Users
		 * @return void
		*/ 
		public function UnassociateAllUsers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (User::LoadArrayByLoginId($this->intId) as $objUser) {
					$objUser->LoginId = null;
					$objUser->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`user`
				SET
					`login_id` = null
				WHERE
					`login_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated User
		 * @param User $objUser
		 * @return void
		*/ 
		public function DeleteAssociatedUser(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this unsaved Login.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this Login with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUser->Id) . ' AND
					`login_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUser->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Users
		 * @return void
		*/ 
		public function DeleteAllUsers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (User::LoadArrayByLoginId($this->intId) as $objUser) {
					$objUser->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`
				WHERE
					`login_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Login"><sequence>';
			$strToReturn .= '<element name="Username" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Role" type="xsd1:Role"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Login', $strComplexTypeArray)) {
				$strComplexTypeArray['Login'] = Login::GetSoapComplexTypeXml();
				Role::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Login::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Login();
			if (property_exists($objSoapObject, 'Username'))
				$objToReturn->strUsername = $objSoapObject->Username;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Role')) &&
				($objSoapObject->Role))
				$objToReturn->Role = Role::GetObjectFromSoapObject($objSoapObject->Role);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Login::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objRole)
				$objObject->objRole = Role::GetSoapObjectFromObject($objObject->objRole, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intRoleId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $Id
	 * @property-read QQNode $RoleId
	 * @property-read QQNodeRole $Role
	 * @property-read QQReverseReferenceNodeUser $User
	 */
	class QQNodeLogin extends QQNode {
		protected $strTableName = 'login';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Login';
		public function __get($strName) {
			switch ($strName) {
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'RoleId':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
				case 'Role':
					return new QQNodeRole('role_id', 'Role', 'integer', $this);
				case 'User':
					return new QQReverseReferenceNodeUser($this, 'user', 'reverse_reference', 'login_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $Id
	 * @property-read QQNode $RoleId
	 * @property-read QQNodeRole $Role
	 * @property-read QQReverseReferenceNodeUser $User
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLogin extends QQReverseReferenceNode {
		protected $strTableName = 'login';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Login';
		public function __get($strName) {
			switch ($strName) {
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'RoleId':
					return new QQNode('role_id', 'RoleId', 'integer', $this);
				case 'Role':
					return new QQNodeRole('role_id', 'Role', 'integer', $this);
				case 'User':
					return new QQReverseReferenceNodeUser($this, 'user', 'reverse_reference', 'login_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>