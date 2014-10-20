<?php
App::uses('Answer', 'TinyQuestionnaire.Model');

/**
 * Answer Test Case
 *
 */
class AnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.tiny_questionnaire.answer',
		'plugin.tiny_questionnaire.question',
		'plugin.tiny_questionnaire.user',
		'plugin.tiny_questionnaire.role',
		'plugin.tiny_questionnaire.shop',
		'plugin.tiny_questionnaire.usermeta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Answer = ClassRegistry::init('TinyQuestionnaire.Answer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Answer);

		parent::tearDown();
	}

}
