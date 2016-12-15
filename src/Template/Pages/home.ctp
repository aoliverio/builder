<?php
/**
 * Set page title
 */
$this->assign('title', 'Dashboard');

/**
 * Get number_of
 */
use Cake\ORM\TableRegistry;
$number_of_roles = TableRegistry::get('Builder.Roles')->find()->count();
$number_of_users = TableRegistry::get('Builder.Users')->find()->count();
$number_of_tasks = TableRegistry::get('Builder.Roles')->find()->count();
?>
<h3><i class="fa fa-users"></i> <?= __('Role-Based Access Control') ?></h3>
<div class="row">
    <div class="col-md-4">
        <div class="alert alert-info">
            <div class="pull-right"><span class="badge"><?= $number_of_roles ?></span></div>
            <a href="<?= $this->Url->build(['controller' => 'roles']) ?>"><?= __('Roles') ?></a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-info">
            <div class="pull-right"><span class="badge"><?= $number_of_users ?></span></div>
            <a href="<?= $this->Url->build(['controller' => 'users']) ?>"><?= __('Users') ?></a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-info">
            <div class="pull-right"><span class="badge"><?= $number_of_tasks ?></span></div>
            <a href="<?= $this->Url->build(['controller' => 'tasks']) ?>"><?= __('Tasks') ?></a>
        </div>
    </div>
</div>
<hr/>
