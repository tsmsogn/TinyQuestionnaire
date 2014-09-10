<div class="questions index">
	<h2><?php echo __('Questions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('validation'); ?></th>
			<th><?php echo $this->Paginator->sort('input_type'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('options'); ?></th>
			<th><?php echo $this->Paginator->sort('attributes'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('questionnaire_id'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['value']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['title']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['description']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['validation']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['input_type']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['weight']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['options']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['attributes']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($question['Questionnaire']['title'], array('controller' => 'questionnaires', 'action' => 'view', $question['Questionnaire']['id'])); ?>
		</td>
		<td><?php echo h($question['Question']['updated']); ?>&nbsp;</td>
		<td><?php echo h($question['Question']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $question['Question']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $question['Question']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $question['Question']['id']), array(), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionnaires'), array('controller' => 'questionnaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionnaire'), array('controller' => 'questionnaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
