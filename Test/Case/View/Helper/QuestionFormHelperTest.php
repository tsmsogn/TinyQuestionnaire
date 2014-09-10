<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('FormHelper', 'View/Helper');
App::uses('QuestionFormHelper', 'TinyQuestionnaire.View/Helper');

/**
 * QuestionFormHelper Test Case
 *
 * @property $Form $Form
 * @property $QuestionForm $QuestionForm
 */
class QuestionFormHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
        $this->Form = new FormHelper($View);
		$this->QuestionForm = new QuestionFormHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionForm);

		parent::tearDown();
	}

/**
 * testInput method
 *
 * @return void
 */
	public function testInput() {

        $encoded_value = '["a"]';
        $encoded_options = '{"a":"foo","b":"bar"}';

        // Multiple select test
        $actual = $this->QuestionForm->input(array('input_type' => 'multiple', 'value' => $encoded_value, 'options' => $encoded_options, 'title' => 'title', 'attributes' => ''), false, 1);
        $expected = $this->Form->input('Question.1.input_type', array('type' => 'hidden', 'value' => 'multiple'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'hidden', 'value' => $encoded_value));
        $expected .= $this->Form->input('Question.1.options', array('type' => 'hidden', 'value' => $encoded_options));
        $expected .= $this->Form->input('Question.1.title', array('type' => 'hidden', 'value' => 'title'));
        $expected .= $this->Form->input('Question.1.attributes', array('type' => 'hidden', 'value' => ''));
        $expected .= $this->Form->input('Question.1.value', array('multiple' => true, 'options' => json_decode($encoded_options, true), 'value' => json_decode($encoded_value), 'label' => false));
        $this->assertEquals($expected, $actual);

        // Multiple checkbox test
        $actual = $this->QuestionForm->input(array('input_type' => 'multiple', 'value' => '', 'options' => $encoded_options, 'title' => 'title', 'attributes' => '{"multiple":"checkbox"}'), false, 1);
        $expected = $this->Form->input('Question.1.input_type', array('type' => 'hidden', 'value' => 'multiple'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'hidden', 'value' => ''));
        $expected .= $this->Form->input('Question.1.options', array('type' => 'hidden', 'value' => $encoded_options));
        $expected .= $this->Form->input('Question.1.title', array('type' => 'hidden', 'value' => 'title'));
        $expected .= $this->Form->input('Question.1.attributes', array('type' => 'hidden', 'value' => '{"multiple":"checkbox"}'));
        $expected .= $this->Form->input('Question.1.value', array('multiple' => 'checkbox', 'options' => json_decode($encoded_options, true), 'label' => false));
        $this->assertEquals($expected, $actual);

        $this->markTestIncomplete('Test dose not use json_decode when value was array with multiple type');

        // Checked checkbox test
        $actual = $this->QuestionForm->input(array('input_type' => 'checkbox', 'value' => 1, 'title' => 'title', 'attributes' => ''), false, 1);
        $expected = $this->Form->input('Question.1.input_type', array('type' => 'hidden', 'value' => 'checkbox'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'hidden', 'value' => 1));
        $expected .= $this->Form->input('Question.1.title', array('type' => 'hidden', 'value' => 'title'));
        $expected .= $this->Form->input('Question.1.attributes', array('type' => 'hidden', 'value' => ''));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'checkbox', 'checked' => 'checked', 'label' => false));
        $this->assertEquals($expected, $actual);

        // Unchecked checkbox test
        $actual = $this->QuestionForm->input(array('input_type' => 'checkbox'), 'title', 1);
        $expected = $this->Form->input('Question.1.input_type', array('type' => 'hidden', 'value' => 'checkbox'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'checkbox', 'label' => 'title'));
        $this->assertEquals($expected, $actual);

        // Radio test
        $actual = $this->QuestionForm->input(array('input_type' => 'radio', 'value' => 'a', 'options' => $encoded_options, 'title' => ''), 'title', 1);
        $expected = $this->Form->input('Question.1.input_type', array('type' => 'hidden', 'value' => 'radio'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'hidden', 'value' => 'a'));
        $expected .= $this->Form->input('Question.1.options', array('type' => 'hidden', 'value' => $encoded_options));
        $expected .= $this->Form->input('Question.1.title', array('type' => 'hidden', 'value' => ''));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'radio', 'options' => array('a' => 'foo', 'b' => 'bar'), 'value' => 'a', 'label' => 'title', 'legend' => false));
        $this->assertEquals($expected, $actual);

        // Text test
        $actual = $this->QuestionForm->input(array('input_type' => 'text', 'value' => 'a'), false, 1);
        $expected = $this->Form->input('Question.1.input_type', array('type' => 'hidden', 'value' => 'text'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'hidden', 'value' => 'a'));
        $expected .= $this->Form->input('Question.1.value', array('type' => 'text', 'value' => 'a', 'label' => false));
        $this->assertEquals($expected, $actual);
	}

}
