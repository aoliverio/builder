<?php

use Cake\Core\Configure;

/**
 * 
 */
$navbar = (Configure::check('Builder.navbar')) ? Configure::read('Builder.navbar') : [];
?>
<!-- Bootstrap3 navbar -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $this->Url->build('/'); ?>"><i class="fa fa-home"></i> <?= __($this->fetch('name')) ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <?php foreach ($navbar as $nav) : ?>
                    <li><a href="<?= $this->Url->build($nav['url']) ?>"><?= $nav['label'] ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $this->Url->build('/builder/users/logout'); ?>"><i class="fa fa-sign-out"></i> <?= __('Logout') ?></a></li>
            </ul>
        </div>
    </div>
</nav>