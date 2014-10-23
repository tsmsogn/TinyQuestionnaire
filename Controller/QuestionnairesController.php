<?php
App::uses('TinyQuestionnaireAppController', 'TinyQuestionnaire.Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Questionnaires Controller
 *
 * @property Questionnaire $Questionnaire
 * @property Question $Question
 * @property Answer $Answer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionnairesController extends TinyQuestionnaireAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * @var array
 */
	public $uses = array('TinyQuestionnaire.Questionnaire', 'TinyQuestionnaire.Question', 'TinyQuestionnaire.Answer');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Questionnaire->recursive = 0;
		$this->paginate = array(
			'Questionnaire' => array(
				'findType' => 'active'
			),
		);
		$this->set('questionnaires', $this->Paginator->paginate('Questionnaire'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Questionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid questionnaire'));
		}

		$this->Questionnaire->hasMany['Question']['conditions'] = array('Question.status' => 1);
		$options = array('conditions' => array('Questionnaire.' . $this->Questionnaire->primaryKey => $id));

		if ($this->request->is(array('post', 'put'))) {

			if (!empty($this->request->data['Question'])) {

				$data = Set::combine($this->request->data['Question'], '{n}.id', '{n}.value');
				$validate = array();

				foreach ($this->request->data['Question'] as $key => $value) {
					if ($validation = $this->Question->getValidation($key)) {
						$validate[$key] = $validation;
					}
				}

				$this->Question->validate = $validate;
				$this->Question->set($data);

				if ($this->Question->validates()) {

					$uuid = String::uuid();
					$saveData = array();
					foreach ($data as $key => $val) {
						$saveData[] = array(
							'uuid' => $uuid,
							'question_id' => $key,
							'value' => json_encode($val),
							'user_id' => AuthComponent::user('id'), // @todo
						);
					}

					$this->Answer->create();
					$this->Answer->saveAll($saveData);
					return $this->redirect(array('action' => 'index'));
				}

			}
		} else {
			$this->request->data = $this->Questionnaire->find('first', $options);
		}

		$this->set('questionnaire', $this->Questionnaire->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Questionnaire->recursive = 0;
		$this->set('questionnaires', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Questionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid questionnaire'));
		}
		$options = array('conditions' => array('Questionnaire.' . $this->Questionnaire->primaryKey => $id));
		$this->set('questionnaire', $this->Questionnaire->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Questionnaire->create();
			if ($this->Questionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionnaire could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Questionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid questionnaire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Questionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The questionnaire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The questionnaire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Questionnaire.' . $this->Questionnaire->primaryKey => $id));
			$this->request->data = $this->Questionnaire->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Questionnaire->id = $id;
		if (!$this->Questionnaire->exists()) {
			throw new NotFoundException(__('Invalid questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Questionnaire->delete()) {
			$this->Session->setFlash(__('The questionnaire has been deleted.'));
		} else {
			$this->Session->setFlash(__('The questionnaire could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
