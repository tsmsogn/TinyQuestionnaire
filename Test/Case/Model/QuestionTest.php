<?php
App::uses('Question', 'TinyQuestionnaire.Model');

/**
 * Question Test Case
 *
 * @property Question $Question
 */
class QuestionTest extends CakeTestCase {

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'plugin.tiny_questionnaire.question',
        'plugin.tiny_questionnaire.questionnaire'
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp() {
        parent::setUp();
        $this->Question = ClassRegistry::init('TinyQuestionnaire.Question');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown() {
        unset($this->Question);

        parent::tearDown();
    }

    public function test_findActive() {
        $questions = $this->Question->find('active');
        $actual = Set::extract('/Question/id', $questions);
        $expected = array(1);
        $this->assertEquals($expected, $actual, 'Find method "active" should not contain records that\'s status field 0');
    }

    public function testGetValidation() {
        $actual = $this->Question->getValidation(1);
        $expected = array('notEmpty' => array(
            'rule' => array('notEmpty'),
        ));
        $this->assertEquals($expected, $actual);
    }

}
