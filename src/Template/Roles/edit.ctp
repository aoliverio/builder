<?php $this->layout = null ?>
<h4><?= __('Edit Role'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($role) ?>
    <?= $this->Form->input('name'); ?>
    <?= $this->Form->input('description'); ?>
    <?= $this->Form->input('tasks._ids', ['options' => $tasks]); ?>
    <?= $this->Form->input('users._ids', ['options' => $users]); ?>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>