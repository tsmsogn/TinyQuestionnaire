<?php
App::uses('QuestionsController', 'TinyQuestionnaire.Controller');

/**
 * QuestionsController Test Case
 *
 */
class QuestionsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.tiny_questionnaire.question',
		'plugin.tiny_questionnaire.questionnaire'
	);

	public function startTest() {
		$this->Question = ClassRegistry::init('TinyQuestionnaire.Question');
	}

	public function endTest() {
		unset($this->Question);
		ClassRegistry::flush();
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/index');
		$this->assertContains(2, Set::classicExtract($this->vars['questions'], '{n}.Question.id'));
		debug($result);
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/view/1');
		debug($result);
	}

/**
 * testAdminAddUno method
 *
 * @return void
 */
	public function testAdminAddUno() {
		$data = array(
			'Question' => array(
				'title' => '',
			)
		);

		$oldCount = $this->Question->find('count');
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/add', array('data' => $data));
		$newCount = $this->Question->find('count');

		$this->assertSame($oldCount, $newCount);
		debug($result);
	}

/**
 * testAdminAddDos method
 *
 * @return void
 */
	public function testAdminAddDos() {
		$data = array(
			'Question' => array(
				'value' => 'value',
				'title' => 'title',
				'description' => 'description',
				'validation' => '',
				'input_type' => 'input_type',
				'weight' => 2,
				'options' => 'options',
				'attributes' => 'attributes',
				'status' => 0,
				'questionnaire_id' => 1,
			)
		);

		$oldCount = $this->Question->find('count');
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/add', array('data' => $data));
		$newCount = $this->Question->find('count');

		$this->assertSame($oldCount + 1, $newCount);
		$this->assertContains('/admin/tiny_questionnaire/questions', $this->headers['Location']);
		debug($result);
	}

/**
 * testAdminEditUno method
 *
 * @return void
 */
	public function testAdminEditUno() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/edit/0');
		debug($result);
	}

/**
 * testAdminEditDos method
 *
 * @return void
 */
	public function testAdminEditDos() {
		$data = array(
			'Question' => array(
				'id' => 1,
				'title' => '',
			)
		);

		$oldCount = $this->Question->find('count');
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/edit/1', array('data' => $data));
		$newCount = $this->Question->find('count');

		$this->assertSame($oldCount, $newCount);
		debug($result);
	}

/**
 * testAdminEditTres method
 *
 * @return void
 */
	public function testAdminEditTres() {
		$data = array(
			'Question' => array(
				'id' => 1,
				'value' => 'value',
				'title' => 'title',
				'description' => 'description',
				'validation' => '',
				'input_type' => 'input_type',
				'weight' => 2,
				'options' => 'options',
				'attributes' => 'attributes',
				'status' => 0,
				'questionnaire_id' => 1,
			)
		);

		$oldUpdated = $this->Question->field('updated', array('id' => 1));
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/edit/1', array('data' => $data));
		$newUpdated = $this->Question->field('updated', array('id' => 1));

		$this->assertNotEquals($oldUpdated, $newUpdated);
		$this->assertContains('/admin/tiny_questionnaire/questions', $this->headers['Location']);
		debug($result);
	}

/**
 * testAdminDeleteUno method
 *
 * @return void
 */
	public function testAdminDeleteUno() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/delete/0');
		debug($result);
	}

/**
 * testAdminDeleteDos method
 *
 * @return void
 */
	public function testAdminDeleteDos() {
		$this->setExpectedException('MethodNotAllowedException');
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/delete/1', array('method' => 'GET'));
		debug($result);
	}

/**
 * testAdminDeleteTres method
 *
 * @return void
 */
	public function testAdminDeleteTres() {
		$result = $this->_testAction('/admin/tiny_questionnaire/questions/delete/1');
		debug($result);
	}

/**
 * testAdminMoveup method
 *
 * @return void
 */
	public function testAdminMoveup() {
		$this->markTestIncomplete('testAdminMoveup not implemented.');
	}

/**
 * testAdminMovedown method
 *
 * @return void
 */
	public function testAdminMovedown() {
		$this->markTestIncomplete('testAdminMovedown not implemented.');
	}

}
