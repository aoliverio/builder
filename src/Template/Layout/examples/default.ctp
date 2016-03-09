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
        <?= $this->fetch('css') ?>
        <!-- Scripts -->
        <?= $this->Element('Builder.constructor/default-layout-js') ?>
        <?= $this->Html->script('builder/base') ?>
        <?= $this->Html->script('builder/default') ?>
        <?= $this->fetch('js') ?>
    </head>
    <body>
        <!-- Layout Navbar -->
        <?= $this->fetch('navbar') ?>
        <!-- Page Content -->
        <div class="container clearfix">
            <h1 class="page-header"><?= __($this->fetch('title')) ?></h1>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>