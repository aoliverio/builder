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
        <!-- Navbar Block -->
        <nav class="navbar">
            <?= $this->fetch('navbar') ?>
        </nav>
        <!-- Content Page -->
        <div class="container clearfix">
            <header class="content-header">
                <h1 class="page-header"><?= __(h($this->fetch('title'))) ?></h1>
            </header>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Footer Block -->
        <footer class="footer">
            <?= $this->fetch('footer') ?>
        </footer>
    </body>
</html>