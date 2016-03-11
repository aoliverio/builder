<?php

/**
 * Laoder base scripts using CDN resources
 */
$this->start('script');
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',
    'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js',
    '//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js',
    '//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js'
]);
$this->end();
