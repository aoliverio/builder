<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
/**
 * Get number_of
 */
use Cake\ORM\TableRegistry;

$number_of_roles = TableRegistry::get('Builder.Roles')->find()->count();
$number_of_users = TableRegistry::get('Builder.Users')->find()->count();
$number_of_tasks = TableRegistry::get('Builder.Roles')->find()->count();

/**
 * Set layout TITLE
 */
$this->assign('title', __('Dashboard'));
$this->assign('subheading', __('Builder Area'));
?>

<div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3><?= __('Welcome on Builder!') ?></h3>
    <small><?= __('The system area for your application in CakePHP.') ?></small>
</div>

<h2 class="page-header"><?= __('Role-Based Access Control') ?></h2>
<div class="row">
    <div class="col-md-4">
        <div class="well well-sm">
            <h3 class="pull-right"><span class="label label-default"><?= $number_of_users ?></span></h3>
            <h3><i class="fa fa-fw fa-user"></i> <a href="<?= $this->Url->build(['controller' => 'users']) ?>"><?= __('Users') ?></a></h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <h3 class="pull-right"><span class="label label-default"><?= $number_of_roles ?></span></h3>
            <h3><i class="fa fa-fw fa-users"></i> <a href="<?= $this->Url->build(['controller' => 'roles']) ?>"><?= __('Roles') ?></a></h3>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well well-sm">
            <h3 class="pull-right"><span class="label label-default"><?= $number_of_tasks ?></span></h3>
            <h3><i class="fa fa-fw fa-tasks"></i> <a href="<?= $this->Url->build(['controller' => 'tasks']) ?>"><?= __('Tasks') ?></a></h3>
        </div>
    </div>
</div>

<h2 class="page-header"><?= __('Builder Actions') ?></h2>
<h4 class="well well-sm"><a href="<?= $this->Url->build(['info']) ?>"><i class="fa fa-info-circle"></i> <?= __('Display App information') ?></a></h4>
