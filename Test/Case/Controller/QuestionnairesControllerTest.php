<?php
App::uses('QuestionnairesController', 'TinyQuestionnaire.Controller');

/**
 * QuestionnairesController Test Case
 *
 */
class QuestionnairesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.tiny_questionnaire.questionnaire',
		'plugin.tiny_questionnaire.question',
	);

	public function startTest() {
		$this->Questionnaire = ClassRegistry::init('TinyQuestionnaire.Questionnaire');
	}

	public function endTest() {
		unset($this->Questionnaire);
		ClassRegistry::flush();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$result = $this->_testAction('/tiny_questionnaire/questionnaires/index');
		$this->assertNotContains(2, Set::classicExtract($this->vars['questionnaires'], '{n}.Questionnaire.id'));

		$this->markTestIncomplete('Test of not containing non active questions');
		debug($result);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$result = $this->_testAction('/tiny_questionnaire/questionnaires/view/1');
		debug($result);
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/index');
		$this->assertContains(2, Set::classicExtract($this->vars['questionnaires'], '{n}.Questionnaire.id'));

		$this->markTestIncomplete('Test of containing all questions');
		debug($result);
	}

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/view/1');
		debug($result);
	}

/**
 * testAdminAddUno method
 *
 * @return void
 */
	public function testAdminAddUno() {
		$data = array(
			'Questionnaire' => array(
				'title' => '',
				'description' => '',
			)
		);

		$oldCount = $this->Questionnaire->find('count');
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/add', array('data' => $data));
		$newCount = $this->Questionnaire->find('count');
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
			'Questionnaire' => array(
				'title' => 'title',
				'description' => 'description',
				'status' => 1
			)
		);

		$oldCount = $this->Questionnaire->find('count');
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/add', array('data' => $data));
		$newCount = $this->Questionnaire->find('count');

		$this->assertSame($oldCount + 1, $newCount);
		$this->assertContains('/admin/tiny_questionnaire', $this->headers['Location']);
		debug($result);
	}

/**
 * testAdminEditUno method
 *
 * @return void
 */
	public function testAdminEditUno() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/edit/0');
		debug($result);
	}

/**
 * testAdminEditDos method
 *
 * @return void
 */
	public function testAdminEditDos() {
		$data = array(
			'Questionnaire' => array(
				'id' => 1,
				'title' => '',
				'description' => '',
			)
		);

		$oldCount = $this->Questionnaire->find('count');
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/edit/1', array('data' => $data));
		$newCount = $this->Questionnaire->find('count');
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
			'Questionnaire' => array(
				'id' => 1,
				'title' => 'title',
				'description' => 'description',
				'status' => 1
			)
		);

		$oldUpdated = $this->Questionnaire->field('updated', array('id' => 1));
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/edit/1', array('data' => $data));
		$newUpdated = $this->Questionnaire->field('updated', array('id' => 1));

		$this->assertNotEquals($oldUpdated, $newUpdated);
		$this->assertContains('/admin/tiny_questionnaire', $this->headers['Location']);
		debug($result);
	}

/**
 * testAdminDeleteUno method
 *
 * @return void
 */
	public function testAdminDeleteUno() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/delete/0');
		debug($result);
	}

/**
 * testAdminDeleteDos method
 *
 * @return void
 */
	public function testAdminDeleteDos() {
		$this->setExpectedException('MethodNotAllowedException');
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/delete/1', array('method' => 'GET'));
		debug($result);
	}

/**
 * testAdminDeleteTres method
 *
 * @return void
 */
	public function testAdminDeleteTres() {
		$result = $this->_testAction('/admin/tiny_questionnaire/questionnaires/delete/1');
		debug($result);
	}

}
