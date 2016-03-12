<?php

/**
 * Laoder base scripts using bower_components
 */
$this->start('script');
echo $this->Html->script([
    '/bower_components/jquery/dist/jquery.min.js',
    '/bower_components/jquery-ui/jquery-ui.min.js',
    '/bower_components/bootstrap/dist/js/bootstrap.min.js',
    '/bower_components/datatables/media/js/jquery.dataTables.min.js',
    '/bower_components/datatables/media/js/dataTables.bootstrap.js',
    '/bower_components/moment/min/moment.min.js',
    '/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    '/bower_components/summernote/dist/summernote.min.js'
]);
$this->end();
