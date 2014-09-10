<?php
class AllTinyQuestionnaireTestsTest extends PHPUnit_Framework_TestSuite {

/**
 * suite
 *
 * @return CakeTestSuite
 */
	public static function suite() {
		$suite = new CakeTestSuite('All TinyQuestionnaire tests');
		$suite->addTestDirectoryRecursive(CakePlugin::path('TinyQuestionnaire') . 'Test' . DS . 'Case' . DS);
		return $suite;
	}

}
