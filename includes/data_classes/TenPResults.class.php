<?php
	require(__DATAGEN_CLASSES__ . '/TenPResultsGen.class.php');

	/**
	 * The TenPResults class defined here contains any
	 * customized code for the TenPResults class in the
	 * Object Relational Model.  It represents the "ten_p_results" table 
	 * in the database, and extends from the code generated abstract TenPResultsGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class TenPResults extends TenPResultsGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTenPResults->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('TenPResults Object %s',  $this->intId);
		}

	public static function LoadArrayByAssessmentIdAndCategory($intAssessmentId, $intCategoryId) {
			$returnArray = array();
			$resultArray = TenPResults::LoadArrayByAssessmentId($intAssessmentId);	
			foreach($resultArray as $objResult) {
				$objQuestion = TenPQuestions::Load($objResult->QuestionId);
				if ($objQuestion->CategoryId == $intCategoryId) {
					$returnArray[] = $objResult;
				}
			}
			return $returnArray;
		}
		
		public static function LoadResultByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::TenPResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::TenPResults()->QuestionId, $intQuestionId));
				$objResult = TenPResults::QueryArray($objConditions,null);
				if(empty($objResult)) return null;
				else return $objResult[0];
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		public static function GetImportanceByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::TenPResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::TenPResults()->QuestionId, $intQuestionId));
				$objResult = TenPResults::QueryArray($objConditions,null);
				if(!empty($objResult))
					return $objResult[0]->Importance;
				else 
					return 1;
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		
		public static function GetPerformanceByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::TenPResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::TenPResults()->QuestionId, $intQuestionId));
				$objResult = TenPResults::QueryArray($objConditions,null);
				if(!empty($objResult))
					return $objResult[0]->Performance;
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
			// This will return an array of TenPResults objects
			return TenPResults::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::TenPResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::TenPResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single TenPResults object
			return TenPResults::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TenPResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::TenPResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of TenPResults objects
			return TenPResults::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::TenPResults()->Param1, $strParam1),
					QQ::Equal(QQN::TenPResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = TenPResults::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`ten_p_results`.*
				FROM
					`ten_p_results` AS `ten_p_results`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return TenPResults::InstantiateDbResult($objDbResult);
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