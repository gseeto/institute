<?php
	require(__DATAGEN_CLASSES__ . '/StrategyGen.class.php');

	/**
	 * The Strategy class defined here contains any
	 * customized code for the Strategy class in the
	 * Object Relational Model.  It represents the "strategy" table 
	 * in the database, and extends from the code generated abstract StrategyGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Strategy extends StrategyGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objStrategy->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Strategy Object %s',  $this->intId);
		}

		/*
		 * Get the next Count required for a new strategy
		 */
		public static function GetNextCount($intScorecardId, $intCategoryTypeId) {
			$objConditions = QQ::All();
			$objClauses = array();					
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->ScorecardId, $intScorecardId));
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->CategoryTypeId,$intCategoryTypeId));
		
			$strategyArray = Strategy::QueryArray($objConditions,$objClauses);
			if ($strategyArray == null) {
				return 1;
			} else {
				$intMax = 1;
				foreach($strategyArray as $objStrategy) {
					if($intMax < $objStrategy->Count)
						$intMax = $objStrategy->Count;
				}
				$intMax++;
				return $intMax;
			}
		}
		
		/*
		 * Load strategy array based off ScorecardID and CategoryType
		 */
		public static function LoadArrayByScorecardIdAndCategoryTypeId($intScorecardId, $intCategoryTypeId) {
			$objConditions = QQ::All();
			$objClauses = array();					
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->ScorecardId, $intScorecardId));
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->CategoryTypeId,$intCategoryTypeId));
		
			return Strategy::QueryArray($objConditions,$objClauses);		
		}
		
		public function GetAverageKpiRating() {
			if ($this->CountKpises() != 0) {
				$iTotal = 0;
				foreach($this->GetKpisArray()as $objKpi) {
					$iTotal += $objKpi->Rating;
				}
				return round($iTotal/$this->CountKpises(),2);
			} else {
				return 0;
			}
			
		}
		
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of Strategy objects
			return Strategy::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Strategy()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Strategy()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Strategy object
			return Strategy::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Strategy()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Strategy()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Strategy objects
			return Strategy::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Strategy()->Param1, $strParam1),
					QQ::Equal(QQN::Strategy()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`strategy`.*
				FROM
					`strategy` AS `strategy`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Strategy::InstantiateDbResult($objDbResult);
		}
*/




		// Override or Create New Properties and Variables
		// For performance reasons, these variables and __set and __get override methods
		// are commented out.  But if you wish to implement or override any
		// of the data generated properties, please feel free to uncomment them.
/*
		protected $strSomeNewProperty;

		public function __get($strName) {
			switch ($strName) {
				case 'SomeNewProperty': return $this->strSomeNewProperty;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			switch ($strName) {
				case 'SomeNewProperty':
					try {
						return ($this->strSomeNewProperty = QType::Cast($mixValue, QType::String));
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						return (parent::__set($strName, $mixValue));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
*/
	}
?>