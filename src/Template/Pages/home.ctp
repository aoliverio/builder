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

<div class="well">
    <div class="row">
        <div class="col-md-6">
            <h3><i class="fa fa-users"></i> <?= __('Role-Based Access Control') ?></h3>
        </div>
        <div class="col-md-6">
            <div class="alert alert-info">
                <div class="pull-right">
                    <a class="btn btn-primary btn-xs" href="<?= $this->Url->build(['controller' => 'roles']) ?>"><i class="fa fa-list"></i> <?= __('List') ?></a>
                </div>
                <a href="<?= $this->Url->build(['controller' => 'roles']) ?>"><?= __('Roles') ?></a>
                <span class="badge"><?= $number_of_roles ?></span>
            </div>
            <div class="alert alert-info">
                <div class="pull-right">
                    <a class="btn btn-primary btn-xs" href="<?= $this->Url->build(['controller' => 'users']) ?>"><i class="fa fa-list"></i> <?= __('List') ?></a>
                </div>
                <a href="<?= $this->Url->build(['controller' => 'users']) ?>"><?= __('Users') ?></a>
                <span class="badge"><?= $number_of_users ?></span>
            </div>
            <div class="alert alert-info">
                <div class="pull-right">
                    <a class="btn btn-primary btn-xs" href="<?= $this->Url->build(['controller' => 'tasks']) ?>"><i class="fa fa-list"></i> <?= __('List') ?></a>
                </div>
                <a href="<?= $this->Url->build(['controller' => 'tasks']) ?>"><?= __('Tasks') ?></a>
                <span class="badge"><?= $number_of_tasks ?></span>
            </div>
        </div>
    </div>
</div>

