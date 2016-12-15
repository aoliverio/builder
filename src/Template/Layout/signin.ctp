<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Builder and app styles -->
        <?= $this->fetch('builder-css') ?>
        <?= $this->Html->css('Builder.signin') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <div class="container clearfix">            
            <div class="form-signin">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
                <h1 class="form-signin-heading text-center"><i class="fa fa-sign-in"></i> <?= __('Login Area') ?></h1>
                <?= $this->Form->input('email', ['placeholder' => 'Please insert email...']) ?>
                <?= $this->Form->input('password', ['placeholder' => 'Please insert password...']) ?>
                <?= $this->Form->button(__('Sign In'), ['class' => 'btn btn-primary btn-lg btn-block']); ?>
                <?= $this->Form->end() ?>
            </div>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Builder default element -->
        <?= $this->fetch('builder-element') ?>
        <!-- Builder and app scripts -->
        <?= $this->fetch('builder-script') ?>
        <?= $this->Html->script('Builder.signin') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
