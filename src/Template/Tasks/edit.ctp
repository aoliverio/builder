<?php $this->layout = null ?>
<h4><?= __('Edit Task'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($task) ?>
    <?= $this->Form->input('name'); ?>
    <?= $this->Form->input('route'); ?>
    <?= $this->Form->input('description'); ?>
    <?= $this->Form->input('roles._ids', ['options' => $roles]); ?>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>