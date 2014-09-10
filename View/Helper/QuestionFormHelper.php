<?php

App::uses('AppHelper', 'View/Helper');

/**
 * QuestionsForm Helper
 *
 * @category Helper
 * @package  Croogo.Settings.View.Helper
 * @version  1.0
 * @author   Rachman Chavik <rchavik@xintesa.com>
 * @author   Toshimasa Oguni <tsmsogn@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class QuestionFormHelper extends AppHelper {

    public $helpers = array(
        'Form',
    );

    /**
     * _inputCheckbox
     *
     * @see QuestionFormHelper::input()
     */
    protected function _inputCheckbox($setting, $label, $i) {
        if (isset($setting['value']) && $setting['value'] == 1) {
            $output = $this->Form->input("Question.$i.value", array(
                'type' => $setting['input_type'],
                'checked' => 'checked',
                'label' => $label
            ));
        } else {
            $output = $this->Form->input("Question.$i.value", array(
                'type' => $setting['input_type'],
                'label' => $label
            ));
        }
        return $output;
    }

    /**
     * Renders input setting according to its type
     *
     * @param array $setting setting data
     * @param string $label Input label
     * @param integer $i index
     * @return string
     */
    public function input($setting, $label, $i) {
        $output = '';

        if (!empty($setting)) {
            foreach ($setting as $key => $val) {
                $output .= $this->Form->input("Question.$i.$key", array(
                    'type' => 'hidden',
                    'value' => $val,
                ));
            }
        }

        $inputType = ($setting['input_type'] != null) ? $setting['input_type'] : 'text';

        if ($setting['input_type'] == 'multiple') {
            $multiple = true;
            $attributes = json_decode($setting['attributes'], true);
            if (isset($attributes['multiple'])) {
                $multiple = $attributes['multiple'];
            };
            $selected = is_array($setting['value']) ? $setting['value'] : json_decode($setting['value']);
            $options = json_decode($setting['options'], true);
            $output .= $this->Form->input("Question.$i.value", array(
                'label' => $label,
                'multiple' => $multiple,
                'options' => $options,
                'selected' => $selected,
            ));
        } elseif ($setting['input_type'] == 'checkbox') {
            $output .= $this->_inputCheckbox($setting, $label, $i);
        } elseif ($setting['input_type'] == 'radio') {
            $value = $setting['value'];
            $options = json_decode($setting['options'], true);
            $output .= $this->Form->input("Question.$i.value", array(
                'legend' => $setting['title'],
                'type' => 'radio',
                'options' => $options,
                'value' => $value,
            ));
        } else {
            $output .= $this->Form->input("Question.$i.value", array(
                'type' => $inputType,
                'value' => $setting['value'],
                'label' => $label,
            ));
        }
        return $output;
    }

}
