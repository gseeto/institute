<?php
	/**
	 * The abstract AddressGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Address subclass which
	 * extends this AddressGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Address class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Address1 the value for strAddress1 
	 * @property string $City the value for strCity 
	 * @property string $State the value for strState 
	 * @property string $ZipCode the value for strZipCode 
	 * @property string $Country the value for strCountry 
	 * @property Company $_Company the value for the private _objCompany (Read-Only) if set due to an expansion on the company.address_id reverse relationship
	 * @property Company[] $_CompanyArray the value for the private _objCompanyArray (Read-Only) if set due to an ExpandAsArray on the company.address_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class AddressGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column address.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column address.address_1
		 * @var string strAddress1
		 */
		protected $strAddress1;
		const Address1Default = null;


		/**
		 * Protected member variable that maps to the database column address.city
		 * @var string strCity
		 */
		protected $strCity;
		const CityDefault = null;


		/**
		 * Protected member variable that maps to the database column address.state
		 * @var string strState
		 */
		protected $strState;
		const StateDefault = null;


		/**
		 * Protected member variable that maps to the database column address.zip_code
		 * @var string strZipCode
		 */
		protected $strZipCode;
		const ZipCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column address.country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryDefault = null;


		/**
		 * Private member variable that stores a reference to a single Company object
		 * (of type Company), if this Address object was restored with
		 * an expansion on the company association table.
		 * @var Company _objCompany;
		 */
		private $_objCompany;

		/**
		 * Private member variable that stores a reference to an array of Company objects
		 * (of type Company[]), if this Address object was restored with
		 * an ExpandAsArray on the company association table.
		 * @var Company[] _objCompanyArray;
		 */
		private $_objCompanyArray = array();

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
		 * Load a Address from PK Info
		 * @param integer $intId
		 * @return Address
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Address::QuerySingle(
				QQ::Equal(QQN::Address()->Id, $intId)
			);
		}

		/**
		 * Load all Addresses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Address[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Address::QueryArray to perform the LoadAll query
			try {
				return Address::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Addresses
		 * @return int
		 */
		public static function CountAll() {
			// Call Address::QueryCount to perform the CountAll query
			return Address::QueryCount(QQ::All());
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
			$objDatabase = Address::GetDatabase();

			// Create/Build out the QueryBuilder object with Address-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'address');
			Address::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('address');

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
		 * Static Qcodo Query method to query for a single Address object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Address the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Address object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Address::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Address::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Address objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Address[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Address::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Address objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Address::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Address::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'address_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Address-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Address::GetSelectFields($objQueryBuilder);
				Address::GetFromFields($objQueryBuilder);

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
			return Address::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Address
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'address';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'address_1', $strAliasPrefix . 'address_1');
			$objBuilder->AddSelectItem($strTableName, 'city', $strAliasPrefix . 'city');
			$objBuilder->AddSelectItem($strTableName, 'state', $strAliasPrefix . 'state');
			$objBuilder->AddSelectItem($strTableName, 'zip_code', $strAliasPrefix . 'zip_code');
			$objBuilder->AddSelectItem($strTableName, 'country', $strAliasPrefix . 'country');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Address from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Address::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Address
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
					$strAliasPrefix = 'address__';


				$strAlias = $strAliasPrefix . 'company__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCompanyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCompanyArray[$intPreviousChildItemCount - 1];
						$objChildItem = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCompanyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCompanyArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'address__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Address object
			$objToReturn = new Address();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'address_1', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'address_1'] : $strAliasPrefix . 'address_1';
			$objToReturn->strAddress1 = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'city', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'city'] : $strAliasPrefix . 'city';
			$objToReturn->strCity = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'state', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'state'] : $strAliasPrefix . 'state';
			$objToReturn->strState = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'zip_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'zip_code'] : $strAliasPrefix . 'zip_code';
			$objToReturn->strZipCode = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country'] : $strAliasPrefix . 'country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'address__';




			// Check for Company Virtual Binding
			$strAlias = $strAliasPrefix . 'company__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCompanyArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Addresses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Address[]
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
					$objItem = Address::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Address::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Address object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Address next row resulting from the query
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
			return Address::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Address object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Address
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Address::QuerySingle(
				QQ::Equal(QQN::Address()->Id, $intId)
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
		 * Save this Address
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `address` (
							`address_1`,
							`city`,
							`state`,
							`zip_code`,
							`country`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strAddress1) . ',
							' . $objDatabase->SqlVariable($this->strCity) . ',
							' . $objDatabase->SqlVariable($this->strState) . ',
							' . $objDatabase->SqlVariable($this->strZipCode) . ',
							' . $objDatabase->SqlVariable($this->strCountry) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('address', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`address`
						SET
							`address_1` = ' . $objDatabase->SqlVariable($this->strAddress1) . ',
							`city` = ' . $objDatabase->SqlVariable($this->strCity) . ',
							`state` = ' . $objDatabase->SqlVariable($this->strState) . ',
							`zip_code` = ' . $objDatabase->SqlVariable($this->strZipCode) . ',
							`country` = ' . $objDatabase->SqlVariable($this->strCountry) . '
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
		 * Delete this Address
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Address with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Addresses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`address`');
		}

		/**
		 * Truncate address table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `address`');
		}

		/**
		 * Reload this Address from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Address object.');

			// Reload the Object
			$objReloaded = Address::Load($this->intId);

			// Update $this's local variables to match
			$this->strAddress1 = $objReloaded->strAddress1;
			$this->strCity = $objReloaded->strCity;
			$this->strState = $objReloaded->strState;
			$this->strZipCode = $objReloaded->strZipCode;
			$this->strCountry = $objReloaded->strCountry;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Address::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `address` (
					`id`,
					`address_1`,
					`city`,
					`state`,
					`zip_code`,
					`country`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strAddress1) . ',
					' . $objDatabase->SqlVariable($this->strCity) . ',
					' . $objDatabase->SqlVariable($this->strState) . ',
					' . $objDatabase->SqlVariable($this->strZipCode) . ',
					' . $objDatabase->SqlVariable($this->strCountry) . ',
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
		 * @return Address[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Address::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM address WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Address::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Address[]
		 */
		public function GetJournal() {
			return Address::GetJournalForId($this->intId);
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
				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'Address1':
					// Gets the value for strAddress1 
					// @return string
					return $this->strAddress1;

				case 'City':
					// Gets the value for strCity 
					// @return string
					return $this->strCity;

				case 'State':
					// Gets the value for strState 
					// @return string
					return $this->strState;

				case 'ZipCode':
					// Gets the value for strZipCode 
					// @return string
					return $this->strZipCode;

				case 'Country':
					// Gets the value for strCountry 
					// @return string
					return $this->strCountry;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Company':
					// Gets the value for the private _objCompany (Read-Only)
					// if set due to an expansion on the company.address_id reverse relationship
					// @return Company
					return $this->_objCompany;

				case '_CompanyArray':
					// Gets the value for the private _objCompanyArray (Read-Only)
					// if set due to an ExpandAsArray on the company.address_id reverse relationship
					// @return Company[]
					return (array) $this->_objCompanyArray;


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
				case 'Address1':
					// Sets the value for strAddress1 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAddress1 = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'City':
					// Sets the value for strCity 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'State':
					// Sets the value for strState 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strState = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ZipCode':
					// Sets the value for strZipCode 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strZipCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Country':
					// Sets the value for strCountry 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCountry = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
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

			
		
		// Related Objects' Methods for Company
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Companies as an array of Company objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Company[]
		*/ 
		public function GetCompanyArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Company::LoadArrayByAddressId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Companies
		 * @return int
		*/ 
		public function CountCompanies() {
			if ((is_null($this->intId)))
				return 0;

			return Company::CountByAddressId($this->intId);
		}

		/**
		 * Associates a Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function AssociateCompany(Company $objCompany) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompany on this unsaved Address.');
			if ((is_null($objCompany->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompany on this Address with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompany->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCompany->AddressId = $this->intId;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function UnassociateCompany(Company $objCompany) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');
			if ((is_null($objCompany->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this Address with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`address_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompany->Id) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->AddressId = null;
				$objCompany->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Companies
		 * @return void
		*/ 
		public function UnassociateAllCompanies() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByAddressId($this->intId) as $objCompany) {
					$objCompany->AddressId = null;
					$objCompany->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`company`
				SET
					`address_id` = null
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function DeleteAssociatedCompany(Company $objCompany) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');
			if ((is_null($objCompany->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this Address with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCompany->Id) . ' AND
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCompany->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Companies
		 * @return void
		*/ 
		public function DeleteAllCompanies() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved Address.');

			// Get the Database Object for this Class
			$objDatabase = Address::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Company::LoadArrayByAddressId($this->intId) as $objCompany) {
					$objCompany->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company`
				WHERE
					`address_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Address"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Address1" type="xsd:string"/>';
			$strToReturn .= '<element name="City" type="xsd:string"/>';
			$strToReturn .= '<element name="State" type="xsd:string"/>';
			$strToReturn .= '<element name="ZipCode" type="xsd:string"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Address', $strComplexTypeArray)) {
				$strComplexTypeArray['Address'] = Address::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Address::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Address();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Address1'))
				$objToReturn->strAddress1 = $objSoapObject->Address1;
			if (property_exists($objSoapObject, 'City'))
				$objToReturn->strCity = $objSoapObject->City;
			if (property_exists($objSoapObject, 'State'))
				$objToReturn->strState = $objSoapObject->State;
			if (property_exists($objSoapObject, 'ZipCode'))
				$objToReturn->strZipCode = $objSoapObject->ZipCode;
			if (property_exists($objSoapObject, 'Country'))
				$objToReturn->strCountry = $objSoapObject->Country;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Address::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Address1
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $ZipCode
	 * @property-read QQNode $Country
	 * @property-read QQReverseReferenceNodeCompany $Company
	 */
	class QQNodeAddress extends QQNode {
		protected $strTableName = 'address';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Address';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'ZipCode':
					return new QQNode('zip_code', 'ZipCode', 'string', $this);
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'Company':
					return new QQReverseReferenceNodeCompany($this, 'company', 'reverse_reference', 'address_id');

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
	 * @property-read QQNode $Id
	 * @property-read QQNode $Address1
	 * @property-read QQNode $City
	 * @property-read QQNode $State
	 * @property-read QQNode $ZipCode
	 * @property-read QQNode $Country
	 * @property-read QQReverseReferenceNodeCompany $Company
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeAddress extends QQReverseReferenceNode {
		protected $strTableName = 'address';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Address';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Address1':
					return new QQNode('address_1', 'Address1', 'string', $this);
				case 'City':
					return new QQNode('city', 'City', 'string', $this);
				case 'State':
					return new QQNode('state', 'State', 'string', $this);
				case 'ZipCode':
					return new QQNode('zip_code', 'ZipCode', 'string', $this);
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'Company':
					return new QQReverseReferenceNodeCompany($this, 'company', 'reverse_reference', 'address_id');

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