<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Styles -->
        <?= $this->Element('Builder.constructor/default-layout-css') ?>
        <?= $this->Html->css('builder/base') ?>
        <?= $this->Html->css('builder/signin') ?>
        <?= $this->fetch('css') ?>

        <!-- Scripts -->
        <?= $this->Element('Builder.constructor/default-layout-js') ?>
        <?= $this->Html->script('builder/base') ?>
        <?= $this->Html->script('builder/signin') ?>
        <?= $this->fetch('js') ?>
    </head>
    <body>
        <div class="container clearfix">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>