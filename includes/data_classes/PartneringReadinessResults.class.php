<?php
	require(__DATAGEN_CLASSES__ . '/PartneringReadinessResultsGen.class.php');

	/**
	 * The PartneringReadinessResults class defined here contains any
	 * customized code for the PartneringReadinessResults class in the
	 * Object Relational Model.  It represents the "partnering_readiness_results" table 
	 * in the database, and extends from the code generated abstract PartneringReadinessResultsGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class PartneringReadinessResults extends PartneringReadinessResultsGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objPartneringReadinessResults->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('PartneringReadinessResults Object %s',  $this->intId);
		}

		public static function LoadArrayByAssessmentIdAndCategory($intAssessmentId, $intCategoryId) {
			$returnArray = array();
			$resultArray = PartneringReadinessResults::LoadArrayByAssessmentId($intAssessmentId);	
			foreach($resultArray as $objResult) {
				$objQuestion = PartneringReadinessQuestions::Load($objResult->QuestionId);
				if ($objQuestion->CategoryId == $intCategoryId) {
					$returnArray[] = $objResult;
				}
			}
			return $returnArray;
		}
		
		public static function LoadResultByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::PartneringReadinessResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::PartneringReadinessResults()->QuestionId, $intQuestionId));
				$objResult = PartneringReadinessResults::QueryArray($objConditions,null);
				if(empty($objResult)) return null;
				else return $objResult[0];
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		public static function GetImportanceByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::PartneringReadinessResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::PartneringReadinessResults()->QuestionId, $intQuestionId));
				$objResult = PartneringReadinessResults::QueryArray($objConditions,null);
				if(!empty($objResult))
					return $objResult[0]->Importance;
				else 
					return 1;
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		
		public static function GetWillingnessByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::PartneringReadinessResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::PartneringReadinessResults()->QuestionId, $intQuestionId));
				$objResult = PartneringReadinessResults::QueryArray($objConditions,null);
				if(!empty($objResult))
					return $objResult[0]->Willingness;
				else 
					return 1;
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
			// This will return an array of PartneringReadinessResults objects
			return PartneringReadinessResults::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::PartneringReadinessResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PartneringReadinessResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single PartneringReadinessResults object
			return PartneringReadinessResults::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::PartneringReadinessResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::PartneringReadinessResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of PartneringReadinessResults objects
			return PartneringReadinessResults::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::PartneringReadinessResults()->Param1, $strParam1),
					QQ::Equal(QQN::PartneringReadinessResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = PartneringReadinessResults::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`partnering_readiness_results`.*
				FROM
					`partnering_readiness_results` AS `partnering_readiness_results`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return PartneringReadinessResults::InstantiateDbResult($objDbResult);
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