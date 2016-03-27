<?php $this->layout = null ?>
<h4><?= __('Add User'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($user) ?>
    <?= $this->Form->input('name'); ?>
    <?= $this->Form->input('email'); ?>
    <?= $this->Form->input('username'); ?>
    <?= $this->Form->input('password'); ?>
    <?= $this->Form->input('is_blocked'); ?>
    <?= $this->Form->input('roles._ids', ['options' => $roles]); ?>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>