<div class="roomComments view">
<h2><?php  echo __('Room Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($roomComment['RoomComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($roomComment['User']['id'], array('controller' => 'users', 'action' => 'view', $roomComment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($roomComment['RoomComment']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($roomComment['Room']['name'], array('controller' => 'rooms', 'action' => 'view', $roomComment['Room']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($roomComment['RoomComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($roomComment['RoomComment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room Comment'), array('action' => 'edit', $roomComment['RoomComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Room Comment'), array('action' => 'delete', $roomComment['RoomComment']['id']), null, __('Are you sure you want to delete # %s?', $roomComment['RoomComment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Room Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms'), array('controller' => 'rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room'), array('controller' => 'rooms', 'action' => 'add')); ?> </li>
	</ul>
</div>
