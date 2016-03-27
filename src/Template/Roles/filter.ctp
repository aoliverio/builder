<?php $this->layout = null ?>
<h4><?= __('Filter Role'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($role); ?>
    <?= $this->Form->input('tasks._ids', ['options' => $tasks, 'class' => 'form-control']); ?>
    <?= $this->Form->input('users._ids', ['options' => $users, 'class' => 'form-control']); ?>
    <hr/>
    <div class="text-center">
        <button class="btn btn-success" type="submit"><?= __('Filter'); ?></button>  
    </div>
    <?= $this->Form->end(); ?>
</div>