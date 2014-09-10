<div class="questions form">
<?php echo $this->Form->create('Question'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Question'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('validation');
		echo $this->Form->input('input_type');
		echo $this->Form->input('weight');
		echo $this->Form->input('options');
		echo $this->Form->input('attributes');
		echo $this->Form->input('status');
		echo $this->Form->input('questionnaire_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Question.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionnaires'), array('controller' => 'questionnaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionnaire'), array('controller' => 'questionnaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
