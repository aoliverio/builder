<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $cakeDescription ?>:<?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <?= $this->Element('Builder.constructor/default-layout-css'); ?>
        <?= $this->Element('Builder.constructor/default-layout-js'); ?>
        <script>
            $(document).ready(function () {
                $('dataTable').dataTable();
            });
        </script>
    </head>
    <body>
        <?= $this->element('navbar') ?>
        <div class="container clearfix">
            <h1 class="page-header"><?= $this->fetch('title') ?></h1>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </body>
</html>