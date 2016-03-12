<?php

/**
 * Loader base styles using bower_components
 */
$this->start('css');
echo $this->Html->css([
    '/bower_components/jquery_ui/themes/smoothness/jquery-ui.min.css',
    '/bower_components/bootstrap/dist/css/bootstrap.min.css',
    '/bower_components/fontawesome/css/font-awesome.min.css',
    '/bower_components/datatables/media/css/dataTables.bootstrap.min.css',
    '/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
    '/bower_components/summernote/dist/summernote.css'
]);
$this->end();
