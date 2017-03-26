<?php
	require(__DATAGEN_CLASSES__ . '/Lemon50AssessmentResultsGen.class.php');

	/**
	 * The Lemon50AssessmentResults class defined here contains any
	 * customized code for the Lemon50AssessmentResults class in the
	 * Object Relational Model.  It represents the "lemon50_assessment_results" table 
	 * in the database, and extends from the code generated abstract Lemon50AssessmentResultsGen
	 * class, which contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 * 
	 */
	class Lemon50AssessmentResults extends Lemon50AssessmentResultsGen {
		/**
		 * Default "to string" handler
		 * Allows pages to _p()/echo()/print() this object, and to define the default
		 * way this object would be outputted.
		 *
		 * Can also be called directly via $objLemon50AssessmentResults->__toString().
		 *
		 * @return string a nicely formatted string representation of this object
		 */
		public function __toString() {
			return sprintf('Lemon50AssessmentResults Object %s',  $this->intId);
		}

		public static function LoadResultByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::Lemon50AssessmentResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::Lemon50AssessmentResults()->QuestionId, $intQuestionId));
				$objResult = Lemon50AssessmentResults::QueryArray($objConditions,null);
				return $objResult[0];
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
		
		public static function GetValueByAssessmentIdAndQuestionId($intAssessmentId, $intQuestionId) {
			try {
				$objConditions = QQ::Equal(QQN::Lemon50AssessmentResults()->AssessmentId, $intAssessmentId);
				$objConditions = QQ::AndCondition($objConditions,QQ::Equal(QQN::Lemon50AssessmentResults()->QuestionId, $intQuestionId));
				$objResult = Lemon50AssessmentResults::QueryArray($objConditions,null);
				if(!empty($objResult))
					return $objResult[0]->Value;
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
			// This will return an array of Lemon50AssessmentResults objects
			return Lemon50AssessmentResults::QueryArray(
				QQ::AndCondition(
					QQ::Equal(QQN::Lemon50AssessmentResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Lemon50AssessmentResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a single Lemon50AssessmentResults object
			return Lemon50AssessmentResults::QuerySingle(
				QQ::AndCondition(
					QQ::Equal(QQN::Lemon50AssessmentResults()->Param1, $strParam1),
					QQ::GreaterThan(QQN::Lemon50AssessmentResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function CountBySample($strParam1, $intParam2, $objOptionalClauses = null) {
			// This will return a count of Lemon50AssessmentResults objects
			return Lemon50AssessmentResults::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Lemon50AssessmentResults()->Param1, $strParam1),
					QQ::Equal(QQN::Lemon50AssessmentResults()->Param2, $intParam2)
				),
				$objOptionalClauses
			);
		}

		public static function LoadArrayBySample($strParam1, $intParam2, $objOptionalClauses) {
			// Performing the load manually (instead of using Qcodo Query)

			// Get the Database Object for this Class
			$objDatabase = Lemon50AssessmentResults::GetDatabase();

			// Properly Escape All Input Parameters using Database->SqlVariable()
			$strParam1 = $objDatabase->SqlVariable($strParam1);
			$intParam2 = $objDatabase->SqlVariable($intParam2);

			// Setup the SQL Query
			$strQuery = sprintf('
				SELECT
					`lemon50_assessment_results`.*
				FROM
					`lemon50_assessment_results` AS `lemon50_assessment_results`
				WHERE
					param_1 = %s AND
					param_2 < %s',
				$strParam1, $intParam2);

			// Perform the Query and Instantiate the Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Lemon50AssessmentResults::InstantiateDbResult($objDbResult);
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