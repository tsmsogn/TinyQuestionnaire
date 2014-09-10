<?php
App::uses('TinyQuestionnaireAppModel', 'TinyQuestionnaire.Model');

/**
 * Answer Model
 *
 * @property Question $Question
 * @property User $User
 */
class Answer extends TinyQuestionnaireAppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'value' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
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
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
