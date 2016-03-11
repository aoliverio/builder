<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Styles -->
        <?= $this->fetch('css') ?>
        <?= $this->Html->css('builder/signin') ?>
    </head>
    <body>
        <div class="container clearfix">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Scripts -->
        <?= $this->fetch('script') ?>             
        <?= $this->Html->script('builder/signin') ?>
    </body>
</html>