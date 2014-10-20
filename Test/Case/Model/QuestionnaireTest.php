<?php
App::uses('Questionnaire', 'TinyQuestionnaire.Model');

/**
 * Questionnaire Test Case
 *
 * @property Questionnaire $Questionnaire
 */
class QuestionnaireTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.tiny_questionnaire.questionnaire',
		'plugin.tiny_questionnaire.question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Questionnaire = ClassRegistry::init('TinyQuestionnaire.Questionnaire');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Questionnaire);

		parent::tearDown();
	}

/**
 * test_findActive method
 */
	public function test_findActive() {
		$questionnaires = $this->Questionnaire->find('active');
		$actual = Set::extract('/Questionnaire/id', $questionnaires);
		$expected = array(1);
		$this->assertEquals($expected, $actual, 'Find method "active" should not contain records that\'s status field 0');
	}

/**
 * testQuestionOrder method
 */
	public function testQuestionOrder() {
		$questionnaire = $this->Questionnaire->read(null, 1);
		$actual = Set::extract('/Question/id', $questionnaire);
		$expected = array(1, 2);

		$this->assertEquals($expected, $actual, 'Questionnaire\'s questions should be ordered by weight ASC');
	}

}
