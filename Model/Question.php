<?php
App::uses('TinyQuestionnaireAppModel', 'TinyQuestionnaire.Model');
/**
 * Question Model
 *
 * @property Questionnaire $Questionnaire
 */
class Question extends TinyQuestionnaireAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * @var array
 */
	public $findMethods = array('active' => true);

/**
 * @var array
 */
	public $actsAs = array(
		'TinyQuestionnaire.Ordered' => array('field' => 'weight', 'foreign_key' => 'questionnaire_id'),
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'input_type' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'questionnaire_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Questionnaire' => array(
			'className' => 'Questionnaire',
			'foreignKey' => 'questionnaire_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * @param $state
 * @param $query
 * @param array $results
 * @return array
 */
	public function _findActive($state, $query, $results = array()) {
		if ($state === 'before') {
			$query['conditions'] = Set::merge($query['conditions'], array(
				array($this->alias . '.status' => 1),
			));
			return $query;
		}
		return $results;
	}

/**
 * @param null $id
 * @return bool|mixed
 */
	public function getValidation($id = null) {
		if ($id === null) {
			$id = $this->getID();
		}
		if ($id === false) {
			return false;
		}
		$data = $this->read(null, $id);
		return json_decode($data[$this->alias]['validation'], true);
	}

}
