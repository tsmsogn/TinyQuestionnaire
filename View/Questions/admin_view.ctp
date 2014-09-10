<div class="questions view">
<h2><?php echo __('Question'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($question['Question']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($question['Question']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($question['Question']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Validation'); ?></dt>
		<dd>
			<?php echo h($question['Question']['validation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Input Type'); ?></dt>
		<dd>
			<?php echo h($question['Question']['input_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($question['Question']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Options'); ?></dt>
		<dd>
			<?php echo h($question['Question']['options']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attributes'); ?></dt>
		<dd>
			<?php echo h($question['Question']['attributes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($question['Question']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionnaire'); ?></dt>
		<dd>
			<?php echo $this->Html->link($question['Questionnaire']['title'], array('controller' => 'questionnaires', 'action' => 'view', $question['Questionnaire']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($question['Question']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Question'), array('action' => 'edit', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Question'), array('action' => 'delete', $question['Question']['id']), array(), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionnaires'), array('controller' => 'questionnaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionnaire'), array('controller' => 'questionnaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
