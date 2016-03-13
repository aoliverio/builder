<?php

namespace Builder\View;

use Cake\View\View as BaseView;

/**
 * 
 */
class View extends BaseView {

    /**
     * 
     */
    public function initialize() {
        parent::initialize();

        /**
         *  Set form templates
         */
        $_templates = [
            'dateWidget' => '<ul class="list-inline"><li class="year">{{year}}</li><li class="month">{{month}}</li><li class="day">{{day}}</li><li class="hour">{{hour}}</li><li class="minute">{{minute}}</li><li class="second">{{second}}</li><li class="meridian">{{meridian}}</li></ul>',
            'error' => '<div class="help-block">{{content}}</div>',
            'help' => '<div class="help-block">{{content}}</div>',
            'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}{{help}}</div>',
            'inputContainerError' => '<div class="form-group {{type}}{{required}} has-error">{{content}}{{error}}{{help}}</div>',
            'checkboxWrapper' => '<div class="checkbox"><label>{{input}}{{label}}</label></div>',
            'multipleCheckboxWrapper' => '<div class="checkbox">{{label}}</div>',
            'radioInlineFormGroup' => '{{label}}<div class="radio-inline-wrapper">{{input}}</div>',
            'radioNestingLabel' => '<div class="radio">{{hidden}}<label{{attrs}}>{{input}}{{text}}</label></div>',
            'staticControl' => '<p class="form-control-static">{{content}}</p>',
            'inputGroupAddon' => '<span class="{{class}}">{{content}}</span>',
            'inputGroupContainer' => '<div class="input-group">{{prepend}}{{content}}{{append}}</div>',
            'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
            'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
            'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
            'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
        ];

        /**
         * 
         */
        $this->Form->templates($_templates);


        /**
         * Loader base styles using bower_components
         */
        $this->start('css');
        echo $this->Html->css([
            '/bower_components/jquery_ui/themes/smoothness/jquery-ui.min.css',
            '/bower_components/bootstrap/dist/css/bootstrap.min.css',
            '/bower_components/fontawesome/css/font-awesome.min.css',
            '/bower_components/datatables/media/css/dataTables.bootstrap.min.css',
            '/bower_components/summernote/dist/summernote.css'
        ]);
        $this->end();

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
            '/bower_components/summernote/dist/summernote.min.js'
        ]);
        $this->end();
    }

}
