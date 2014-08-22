<?php
	require(__DATAGEN_CLASSES__ . '/SeasonalResultsGen.class.php');

	/**
	 * The SeasonalResults class defined here contains any
	 * customized code for the SeasonalResults class in the
	 * Object Relational Model.  It represents the "seasonal_results" table 
	 * in the database, and extends from the code generated abstract SeasonalResultsGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class SeasonalResults extends SeasonalResultsGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objSeasonalResults->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('SeasonalResults Object %s',  $this->intId);
		}

		public static function LoadArrayByAssessmentIdAndCategory($intAssessmentId, $intCategoryId) {
			$returnArray = array();
			$resultArray = SeasonalResults::LoadArrayByAssessmentId($intAssessmentId);	
			foreach($resultArray as $objResult) {
				$objQuestion = SeasonalQuestions::Load($objResult->QuestionId);
				if ($objQuestion->CategoryId == $intCategoryId) {
					$returnArray[] = $objResult;
				}
			}
			return $returnArray;
		}
		
		public static function LoadResultByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			$resultArray = SeasonalResults::LoadArrayByAssessmentId($intAssessmentId);	
			foreach($resultArray as $objResult) {
				$objQuestion = SeasonalQuestions::Load($objResult->QuestionId);
				if ($objQuestion->Id == $intQuestionId) {
					return $objResult;
				}
			}
			return null;
		}
		
		public static function GetResultByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
					$objConditions = QQ::Equal(QQN::SeasonalResults()->AssessmentId, $intAssessmentId);
					$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::SeasonalResults()->QuestionId, $intQuestionId));
					$objResult = SeasonalResults::QueryArray($objConditions,null);
					return $objResult[0]->Result;
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
		}
		// Override or Create New Load/Count methods
		// (For obvious reasons, these methods are commented out...
		// but feel free to use these as a starting point)
/*
		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return an array of SeasonalResults objects
			return SeasonalResults::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::SeasonalResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SeasonalResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single SeasonalResults object
			return SeasonalResults::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::SeasonalResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::SeasonalResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of SeasonalResults objects
			return SeasonalResults::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::SeasonalResults()->Param1, $strParam1),
					QQ::Equal(QQN::SeasonalResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = SeasonalResults::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`seasonal_results`.*
				FROM
					`seasonal_results` AS `seasonal_results`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SeasonalResults::InstantiateDbResult($objDbResult);
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