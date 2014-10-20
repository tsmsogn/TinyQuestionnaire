<?php
App::uses('TinyQuestionnaireAppModel', 'TinyQuestionnaire.Model');
/**
 * Questionnaire Model
 *
 * @property Question $Question
 */
class Questionnaire extends TinyQuestionnaireAppModel {

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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'questionnaire_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('weight' => 'ASC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
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

}
