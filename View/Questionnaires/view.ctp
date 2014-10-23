<div class="questionnaires view">
<h2><?php echo __('Questionnaire'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($questionnaire['Questionnaire']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($questionnaire['Questionnaire']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($questionnaire['Questionnaire']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($questionnaire['Questionnaire']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($questionnaire['Questionnaire']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($questionnaire['Questionnaire']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questionnaire'), array('action' => 'edit', $questionnaire['Questionnaire']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Questionnaire'), array('action' => 'delete', $questionnaire['Questionnaire']['id']), array(), __('Are you sure you want to delete # %s?', $questionnaire['Questionnaire']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionnaires'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionnaire'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($this->request->data['Question'])): ?>
    <?php echo $this->Form->create(); ?>
	    <table cellpadding = "0" cellspacing = "0">
	    <tr>
	    	<th><?php echo __('Id'); ?></th>
	    	<th><?php echo __('Form'); ?></th>
	    	<th><?php echo __('Value'); ?></th>
	    	<th><?php echo __('Title'); ?></th>
	    	<th><?php echo __('Description'); ?></th>
	    	<th><?php echo __('Validation'); ?></th>
	    	<th><?php echo __('Input Type'); ?></th>
	    	<th><?php echo __('Weight'); ?></th>
	    	<th><?php echo __('Options'); ?></th>
	    	<th><?php echo __('Attributes'); ?></th>
	    	<th><?php echo __('Status'); ?></th>
	    	<th><?php echo __('Questionnaire Id'); ?></th>
	    	<th><?php echo __('Updated'); ?></th>
	    	<th><?php echo __('Created'); ?></th>
	    	<th class="actions"><?php echo __('Actions'); ?></th>
	    </tr>
	    <?php foreach ($this->request->data['Question'] as $question): ?>
	    	<tr>
	    		<td><?php echo $question['id']; ?></td>
	    		<td>
                    <?php 
                        $label = $question['title'];
                        $i = $question['id'];
                        echo
//                            $this->Form->input("Question.$i.id", array(
//                                'value' => $question['id'],
//                            )) .
//                            $this->Form->input("Question.$i.value", array(
//                                'type' => 'hidden', 'value' => $question['value']
//                            )) .
                            $this->QuestionForm->input($question, $label, $i);
                    ?>
                </td>
	    		<td><?php echo $question['value']; ?></td>
	    		<td><?php echo $question['title']; ?></td>
	    		<td><?php echo $question['description']; ?></td>
	    		<td><?php echo $question['validation']; ?></td>
	    		<td><?php echo $question['input_type']; ?></td>
	    		<td><?php echo $question['weight']; ?></td>
	    		<td><?php echo $question['options']; ?></td>
	    		<td><?php echo $question['attributes']; ?></td>
	    		<td><?php echo $question['status']; ?></td>
	    		<td><?php echo $question['questionnaire_id']; ?></td>
	    		<td><?php echo $question['updated']; ?></td>
	    		<td><?php echo $question['created']; ?></td>
	    	</tr>
	    <?php endforeach; ?>
	    </table>
    <?php echo $this->Form->end(__('Submit')); ?>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
