<?php
/**
 * Append layout custom style files
 */
$this->append('css');
echo $this->Html->css(['builder/base', 'builder/signin']);
$this->end();

/**
 * Append layout custom script files
 */
$this->append('script');
echo $this->Html->script(['builder/base', 'builder/signin']);
$this->end();
?>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Styles -->
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <div class="container clearfix">            
            <div class="form-signin">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <h2 class="form-signin-heading"><?= __('Please sign in') ?></h2>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-primary btn-lg btn-block']); ?>
                <?= $this->Form->end() ?>
            </div>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Scripts -->
        <?= $this->fetch('script') ?>             
    </body>
</html>
