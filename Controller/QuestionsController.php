<?php
App::uses('TinyQuestionnaireAppController', 'TinyQuestionnaire.Controller');

/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionsController extends TinyQuestionnaireAppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Question->recursive = 0;
        $this->set('questions', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
        $this->set('question', $this->Question->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Question->create();
            if ($this->Question->save($this->request->data)) {
                $this->Session->setFlash(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
            }
        }
        $questionnaires = $this->Question->Questionnaire->find('list');
        $this->set(compact('questionnaires'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Question->exists($id)) {
            throw new NotFoundException(__('Invalid question'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Question->save($this->request->data)) {
                $this->Session->setFlash(__('The question has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The question could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
            $this->request->data = $this->Question->find('first', $options);
        }
        $questionnaires = $this->Question->Questionnaire->find('list');
        $this->set(compact('questionnaires'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Question->delete()) {
            $this->Session->setFlash(__('The question has been deleted.'));
        } else {
            $this->Session->setFlash(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_moveup
     *
     * @param null $id
     * @param int $step
     * @return mixed
     * @throws NotFoundException
     */
    public function admin_moveup($id = null, $step = 1) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }

        if ($step > 0) {
            if ($this->Question->moveUp($this->Question->id, abs($step))) {
                $this->Session->setFlash(__('Moved up successfully'));
            } else {
                $this->Session->setFlash(__('Could not move up'));
            }
        } else {
            $this->Session->setFlash('Please provide a number of positions the category should be moved up.');
        }

        $question = $this->Question->find('first', array('conditions' => array('Question.' . $this->Question->primaryKey => $id)));

        return $this->redirect(array('controller' => 'questionnaires', 'action' => 'view', $question['Questionnaire'][$this->Question->Questionnaire->primaryKey]));
    }

    /**
     * admin_movedown method
     *
     * @param null $id
     * @param int $step
     * @return mixed
     * @throws NotFoundException
     */
    public function admin_movedown($id = null, $step = 1) {
        $this->Question->id = $id;
        if (!$this->Question->exists()) {
            throw new NotFoundException(__('Invalid question'));
        }

        if ($step > 0) {
            if ($this->Question->moveDown($this->Question->id, abs($step))) {
                $this->Session->setFlash(__('Moved down successfully'));
            } else {
                $this->Session->setFlash(__('Could not move down'));
            }
        } else {
            $this->Session->setFlash('Please provide the number of positions the field should be moved down.');
        }

        $question = $this->Question->find('first', array('conditions' => array('Question.' . $this->Question->primaryKey => $id)));

        return $this->redirect(array('controller' => 'questionnaires', 'action' => 'view', $question['Questionnaire'][$this->Question->Questionnaire->primaryKey]));
    }

}
