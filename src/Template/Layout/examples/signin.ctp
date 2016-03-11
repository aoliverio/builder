<?php
/**
 * Laod base styles and scripts using Builder.constructor elements
 */
$this->element('Builder.constructor/base-styles');
$this->element('Builder.constructor/base-scripts');

/**
 * Append layout custom style files
 */
$this->append('css');
echo $this->Html->css(['builder/base', 'builder/signin']);
$this->end;

/**
 * Append layout custom script files
 */
$this->append('script');
echo $this->Html->script(['builder/base', 'builder/signin']);
$this->end;
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
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Scripts -->
        <?= $this->fetch('script') ?>             
    </body>
</html>