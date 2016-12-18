<div class="row">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="fa fa-terminal"></i> <?= __('Cake Shell') ?></div>
            <div class="panel-body">
                <label><?= __('Enter shell commands and press "Enter" or click "Run Commands"') ?></label>
                <textarea class="form-control" placeholder="Insert shell command and press 'Enter' or click 'Run Commands'" rows="6"></textarea>
                <br/>
                <div class="text-right">
                    <button class="btn btn-primary"><i class="fa fa-cogs"></i> Run Commands</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="alert alert-info">
            <h4 class="page-header"><i class="fa fa-wikipedia-w"></i> Wiki</h4>
            <ul>
                <li><a href="https://github.com/aoliverio/builder/wiki/features" target="_blank">Features</a></li>
                <li><a href="https://github.com/aoliverio/builder/wiki/basic-settings" target="_blank">Basic Settings</a></li>
                <li><a href="https://github.com/aoliverio/builder/wiki/how-to-use" target="_blank">How to use Builder</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
//pr($this->request) 
//$output = shell_exec('ls');
$output = shell_exec(ROOT . '/bin/cake');
echo "<pre>$output</pre>";