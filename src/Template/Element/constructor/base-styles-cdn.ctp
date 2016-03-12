<?php

/**
 * Loader base styles using CDN resources
 */
$this->start('css');
echo $this->Html->css([
    'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css',
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
    '//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css'
]);
$this->end();
