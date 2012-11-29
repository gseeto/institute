<?php
	/**
	 * The abstract SpheresGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Spheres subclass which
	 * extends this SpheresGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Spheres class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (PK)
	 * @property string $Sphere the value for strSphere 
	 * @property Strategy $_StrategyAsSphere the value for the private _objStrategyAsSphere (Read-Only) if set due to an expansion on the strategy_sphere_assn association table
	 * @property Strategy[] $_StrategyAsSphereArray the value for the private _objStrategyAsSphereArray (Read-Only) if set due to an ExpandAsArray on the strategy_sphere_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SpheresGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK column spheres.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected internal member variable that stores the original version of the PK column value (if restored)
		 * Used by Save() to update a PK column during UPDATE
		 * @var integer __intId;
		 */
		protected $__intId;

		/**
		 * Protected member variable that maps to the database column spheres.sphere
		 * @var string strSphere
		 */
		protected $strSphere;
		const SphereDefault = null;


		/**
		 * Private member variable that stores a reference to a single StrategyAsSphere object
		 * (of type Strategy), if this Spheres object was restored with
		 * an expansion on the strategy_sphere_assn association table.
		 * @var Strategy _objStrategyAsSphere;
		 */
		private $_objStrategyAsSphere;

		/**
		 * Private member variable that stores a reference to an array of StrategyAsSphere objects
		 * (of type Strategy[]), if this Spheres object was restored with
		 * an ExpandAsArray on the strategy_sphere_assn association table.
		 * @var Strategy[] _objStrategyAsSphereArray;
		 */
		private $_objStrategyAsSphereArray = array();

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
		 * Load a Spheres from PK Info
		 * @param integer $intId
		 * @return Spheres
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Spheres::QuerySingle(
				QQ::Equal(QQN::Spheres()->Id, $intId)
			);
		}

		/**
		 * Load all Sphereses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Spheres[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Spheres::QueryArray to perform the LoadAll query
			try {
				return Spheres::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Sphereses
		 * @return int
		 */
		public static function CountAll() {
			// Call Spheres::QueryCount to perform the CountAll query
			return Spheres::QueryCount(QQ::All());
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
			$objDatabase = Spheres::GetDatabase();

			// Create/Build out the QueryBuilder object with Spheres-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'spheres');
			Spheres::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('spheres');

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
		 * Static Qcodo Query method to query for a single Spheres object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Spheres the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Spheres::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Spheres object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Spheres::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Spheres::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Spheres objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Spheres[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Spheres::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Spheres::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Spheres::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Spheres objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Spheres::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Spheres::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'spheres_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Spheres-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Spheres::GetSelectFields($objQueryBuilder);
				Spheres::GetFromFields($objQueryBuilder);

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
			return Spheres::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Spheres
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'spheres';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'sphere', $strAliasPrefix . 'sphere');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Spheres from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Spheres::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Spheres
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
					$strAliasPrefix = 'spheres__';

				$strAlias = $strAliasPrefix . 'strategyassphere__strategy_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStrategyAsSphereArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStrategyAsSphereArray[$intPreviousChildItemCount - 1];
						$objChildItem = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyassphere__strategy_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStrategyAsSphereArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStrategyAsSphereArray[] = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyassphere__strategy_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'spheres__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Spheres object
			$objToReturn = new Spheres();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$objToReturn->__intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'sphere', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'sphere'] : $strAliasPrefix . 'sphere';
			$objToReturn->strSphere = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'spheres__';



			// Check for StrategyAsSphere Virtual Binding
			$strAlias = $strAliasPrefix . 'strategyassphere__strategy_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStrategyAsSphereArray[] = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyassphere__strategy_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStrategyAsSphere = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyassphere__strategy_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of Sphereses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Spheres[]
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
					$objItem = Spheres::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Spheres::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Spheres object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Spheres next row resulting from the query
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
			return Spheres::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Spheres object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Spheres
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Spheres::QuerySingle(
				QQ::Equal(QQN::Spheres()->Id, $intId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Strategy objects for a given StrategyAsSphere
		 * via the strategy_sphere_assn table
		 * @param integer $intStrategyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Spheres[]
		*/
		public static function LoadArrayByStrategyAsSphere($intStrategyId, $objOptionalClauses = null) {
			// Call Spheres::QueryArray to perform the LoadArrayByStrategyAsSphere query
			try {
				return Spheres::QueryArray(
					QQ::Equal(QQN::Spheres()->StrategyAsSphere->StrategyId, $intStrategyId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Sphereses for a given StrategyAsSphere
		 * via the strategy_sphere_assn table
		 * @param integer $intStrategyId
		 * @return int
		*/
		public static function CountByStrategyAsSphere($intStrategyId, $objOptionalClauses = null) {
			return Spheres::QueryCount(
				QQ::Equal(QQN::Spheres()->StrategyAsSphere->StrategyId, $intStrategyId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Spheres
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return void
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `spheres` (
							`id`,
							`sphere`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intId) . ',
							' . $objDatabase->SqlVariable($this->strSphere) . '
						)
					');



					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`spheres`
						SET
							`id` = ' . $objDatabase->SqlVariable($this->intId) . ',
							`sphere` = ' . $objDatabase->SqlVariable($this->strSphere) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->__intId) . '
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
			$this->__intId = $this->intId;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Spheres
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Spheres with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`spheres`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Sphereses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`spheres`');
		}

		/**
		 * Truncate spheres table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `spheres`');
		}

		/**
		 * Reload this Spheres from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Spheres object.');

			// Reload the Object
			$objReloaded = Spheres::Load($this->intId);

			// Update $this's local variables to match
			$this->intId = $objReloaded->intId;
			$this->__intId = $this->intId;
			$this->strSphere = $objReloaded->strSphere;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Spheres::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `spheres` (
					`id`,
					`sphere`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strSphere) . ',
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
		 * @return Spheres[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Spheres::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM spheres WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Spheres::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Spheres[]
		 */
		public function GetJournal() {
			return Spheres::GetJournalForId($this->intId);
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
					// Gets the value for intId (PK)
					// @return integer
					return $this->intId;

				case 'Sphere':
					// Gets the value for strSphere 
					// @return string
					return $this->strSphere;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_StrategyAsSphere':
					// Gets the value for the private _objStrategyAsSphere (Read-Only)
					// if set due to an expansion on the strategy_sphere_assn association table
					// @return Strategy
					return $this->_objStrategyAsSphere;

				case '_StrategyAsSphereArray':
					// Gets the value for the private _objStrategyAsSphereArray (Read-Only)
					// if set due to an ExpandAsArray on the strategy_sphere_assn association table
					// @return Strategy[]
					return (array) $this->_objStrategyAsSphereArray;


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
				case 'Id':
					// Sets the value for intId (PK)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Sphere':
					// Sets the value for strSphere 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strSphere = QType::Cast($mixValue, QType::String));
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

			
		// Related Many-to-Many Objects' Methods for StrategyAsSphere
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated StrategiesAsSphere as an array of Strategy objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/ 
		public function GetStrategyAsSphereArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Strategy::LoadArrayBySpheresAsSphere($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated StrategiesAsSphere
		 * @return int
		*/ 
		public function CountStrategiesAsSphere() {
			if ((is_null($this->intId)))
				return 0;

			return Strategy::CountBySpheresAsSphere($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific StrategyAsSphere
		 * @param Strategy $objStrategy
		 * @return bool
		*/
		public function IsStrategyAsSphereAssociated(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsStrategyAsSphereAssociated on this unsaved Spheres.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsStrategyAsSphereAssociated on this Spheres with an unsaved Strategy.');

			$intRowCount = Spheres::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Spheres()->Id, $this->intId),
					QQ::Equal(QQN::Spheres()->StrategyAsSphere->StrategyId, $objStrategy->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the StrategyAsSphere relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalStrategyAsSphereAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Spheres::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `strategy_sphere_assn` (
					`sphere_id`,
					`strategy_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's StrategyAsSphere relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalStrategyAsSphereAssociationForId($intId) {
			$objDatabase = Spheres::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM strategy_sphere_assn WHERE sphere_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's StrategyAsSphere relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalStrategyAsSphereAssociation() {
			return Spheres::GetJournalStrategyAsSphereAssociationForId($this->intId);
		}

		/**
		 * Associates a StrategyAsSphere
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function AssociateStrategyAsSphere(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategyAsSphere on this unsaved Spheres.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategyAsSphere on this Spheres with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `strategy_sphere_assn` (
					`sphere_id`,
					`strategy_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objStrategy->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalStrategyAsSphereAssociation($objStrategy->Id, 'INSERT');
		}

		/**
		 * Unassociates a StrategyAsSphere
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function UnassociateStrategyAsSphere(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsSphere on this unsaved Spheres.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsSphere on this Spheres with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_sphere_assn`
				WHERE
					`sphere_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalStrategyAsSphereAssociation($objStrategy->Id, 'DELETE');
		}

		/**
		 * Unassociates all StrategiesAsSphere
		 * @return void
		*/ 
		public function UnassociateAllStrategiesAsSphere() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllStrategyAsSphereArray on this unsaved Spheres.');

			// Get the Database Object for this Class
			$objDatabase = Spheres::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `strategy_id` AS associated_id FROM `strategy_sphere_assn` WHERE `sphere_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalStrategyAsSphereAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_sphere_assn`
				WHERE
					`sphere_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Spheres"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Sphere" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Spheres', $strComplexTypeArray)) {
				$strComplexTypeArray['Spheres'] = Spheres::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Spheres::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Spheres();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Sphere'))
				$objToReturn->strSphere = $objSoapObject->Sphere;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Spheres::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQNode $StrategyId
	 * @property-read QQNodeStrategy $Strategy
	 * @property-read QQNodeStrategy $_ChildTableNode
	 */
	class QQNodeSpheresStrategyAsSphere extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'strategyassphere';

		protected $strTableName = 'strategy_sphere_assn';
		protected $strPrimaryKey = 'sphere_id';
		protected $strClassName = 'Strategy';

		public function __get($strName) {
			switch ($strName) {
				case 'StrategyId':
					return new QQNode('strategy_id', 'StrategyId', 'integer', $this);
				case 'Strategy':
					return new QQNodeStrategy('strategy_id', 'StrategyId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeStrategy('strategy_id', 'StrategyId', 'integer', $this);
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
	 * @property-read QQNode $Sphere
	 * @property-read QQNodeSpheresStrategyAsSphere $StrategyAsSphere
	 */
	class QQNodeSpheres extends QQNode {
		protected $strTableName = 'spheres';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Spheres';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Sphere':
					return new QQNode('sphere', 'Sphere', 'string', $this);
				case 'StrategyAsSphere':
					return new QQNodeSpheresStrategyAsSphere($this);

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
	 * @property-read QQNode $Sphere
	 * @property-read QQNodeSpheresStrategyAsSphere $StrategyAsSphere
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeSpheres extends QQReverseReferenceNode {
		protected $strTableName = 'spheres';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Spheres';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Sphere':
					return new QQNode('sphere', 'Sphere', 'string', $this);
				case 'StrategyAsSphere':
					return new QQNodeSpheresStrategyAsSphere($this);

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