<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= __($this->fetch('title')) ?></title>
        <?= $this->Html->meta('icon') ?>
        <!-- Builder and app styles -->
        <?= $this->fetch('builder-css') ?>
        <?= $this->Html->css('Builder.default') ?>
        <?= $this->fetch('css') ?>
    </head>
    <body>
        <!-- Nav Block -->
        <nav class="nav">
            <?= $this->fetch('nav') ?>
        </nav>
        <!-- Content Page -->
        <div class="container clearfix">
            <?= $this->fetch('breadcrumb') ?>
            <header class="content-header">
                <h1 class="page-header"><?= __($this->fetch('title')) ?></h1>
            </header>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <!-- Footer Block -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-muted"><?= __($this->fetch('copyright')) ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted text-right">Created using <a href="">AOBuilder</a> in <a href="https://cakephp.org/" target="_blank">CakePHP</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Builder base element -->
        <?= $this->fetch('builder-element') ?>
        <!-- Builder and app scripts -->
        <?= $this->fetch('builder-script') ?>
        <?= $this->Html->script('Builder.default') ?>
        <?= $this->fetch('script') ?>
    </body>
</html>
