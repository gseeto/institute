<?php
	require(__DATAGEN_CLASSES__ . '/TenFResultsGen.class.php');

	/**
	 * The TenFResults class defined here contains any
	 * customized code for the TenFResults class in the
	 * Object Relational Model.  It represents the "ten_f_results" table 
	 * in the database, and extends from the code generated abstract TenFResultsGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class TenFResults extends TenFResultsGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objTenFResults->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('TenFResults Object %s',  $this->intId);
		}

		public static function LoadArrayByAssessmentIdAndCategory($intAssessmentId, $intCategoryId) {
			$returnArray = array();
			$resultArray = TenFResults::LoadArrayByAssessmentId($intAssessmentId);	
			foreach($resultArray as $objResult) {
				$objQuestion = TenFQuestions::Load($objResult->QuestionId);
				if ($objQuestion->CategoryId == $intCategoryId) {
					$returnArray[] = $objResult;
				}
			}
			return $returnArray;
		}
		
		public static function LoadResultByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::TenFResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::TenFResults()->QuestionId, $intQuestionId));
				$objResult = TenFResults::QueryArray($objConditions,null);
				return $objResult[0];
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		public static function GetImportanceByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::TenFResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::TenFResults()->QuestionId, $intQuestionId));
				$objResult = TenFResults::QueryArray($objConditions,null);
				return $objResult[0]->Importance;
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		
		public static function GetPerformanceByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::TenFResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::TenFResults()->QuestionId, $intQuestionId));
				$objResult = TenFResults::QueryArray($objConditions,null);
				return $objResult[0]->Performance;
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
			// This will return an array of TenFResults objects
			return TenFResults::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::TenFResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::TenFResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single TenFResults object
			return TenFResults::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::TenFResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::TenFResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of TenFResults objects
			return TenFResults::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::TenFResults()->Param1, $strParam1),
					QQ::Equal(QQN::TenFResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = TenFResults::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`ten_f_results`.*
				FROM
					`ten_f_results` AS `ten_f_results`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return TenFResults::InstantiateDbResult($objDbResult);
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