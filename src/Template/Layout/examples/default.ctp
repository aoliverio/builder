<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= __($this->fetch('title')) ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Styles -->
        <?= $this->Element('Builder.constructor/default-layout-css') ?>
        <?= $this->Html->css('builder/base') ?>
        <?= $this->Html->css('builder/default') ?>        
        <!-- Scripts -->
        <?= $this->Element('Builder.constructor/default-layout-js') ?>
        <?= $this->Html->script('builder/base') ?>
        <?= $this->Html->script('builder/default') ?>
    </head>
    <body>
        <!-- Layout Navbar -->
        <?php if (file_exists(APP . 'Template' . DS . 'Element' . DS . 'navbar.ctp')) : ?>
            <?= $this->element('navbar') ?>
        <?php endif; ?>
        <!-- Page Content -->
        <div class="container clearfix">
            <h1 class="page-header"><?= __($this->fetch('title')) ?></h1>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>