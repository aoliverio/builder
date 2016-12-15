<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Builder and app styles -->
        <?= $this->fetch('builder-css') ?>
        <?= $this->Html->css('builder/signin') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <div class="container clearfix">            
            <div class="form-signin">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
                <h2 class="form-signin-heading"><?= __('Please sign in') ?></h2>
                <?= $this->Form->input('email') ?>
                <?= $this->Form->input('password') ?>
                <?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-primary btn-lg btn-block']); ?>
                <?= $this->Form->end() ?>
            </div>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Builder default element -->
        <?= $this->fetch('builder-element') ?>
        <!-- Builder and app scripts -->
        <?= $this->fetch('builder-script') ?>
        <?= $this->Html->script('builder/signin') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
