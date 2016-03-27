<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right">
            <small><?= __('Actions:'); ?></small>
            <a class="btn btn-xs" href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']) ?>"><i class="fa fa-list"></i> <?= __('List') ?></a>
        </span>
        <h3 class="panel-title"><i class="fa fa-search-plus"></i> <?= __('User'); ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6 columns strings">
                <label class="subheader"><?= __('Name') ?></label>
                <p><?= h($user->name) ?></p>
                <hr/>
                <label class="subheader"><?= __('Email') ?></label>
                <p><?= h($user->email) ?></p>
                <hr/>
                <label class="subheader"><?= __('Username') ?></label>
                <p><?= h($user->username) ?></p>
                <hr/>
                <label class="subheader"><?= __('Password') ?></label>
                <p><?= h($user->password) ?></p>
                <hr/>
            </div>
            <div class="col-md-2 columns numbers end">
                <label class="subheader"><?= __('Id') ?></label>
                <p><?= $this->Number->format($user->id) ?></p>
                <hr/>
            </div>
            <div class="col-md-2 columns dates end">
                <label class="subheader"><?= __('Created') ?></label>
                <p><?= h($user->created) ?></p>
                <hr/>
                <label class="subheader"><?= __('Modified') ?></label>
                <p><?= h($user->modified) ?></p>
                <hr/>
            </div>
            <div class="col-md-2 columns booleans end">
                <label class="subheader"><?= __('Is Blocked') ?></label>
                <p><?= $user->is_blocked ? __('Yes') : __('No'); ?></p>
                <hr/>
            </div>
        </div>
    </div>
</div>