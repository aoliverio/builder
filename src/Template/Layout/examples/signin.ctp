<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Element('Builder.constructor/default-layout-css'); ?>
        <?= $this->Element('Builder.constructor/default-layout-js'); ?>
    </head>
    <body>
        <div class="container clearfix">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>