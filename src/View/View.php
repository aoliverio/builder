<?php

namespace Builder\View;

use Cake\View\View as BaseView;
use Cake\Utility\Inflector;
use Cake\Core\Configure;

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
         * Set copyright from Builder configs
         */
        $copyright = (Configure::check('Builder.copyright')) ? Configure::read('Builder.copyright') : '[Builder.copyright]';
        $this->assign('copyright', $copyright);

        /**
         * Set name from Builder configs
         */
        $name = (Configure::check('Builder.name')) ? Configure::read('Builder.name') : '[Builder.name]';
        $this->assign('name', $name);

        /**
         * Use Builder Helpers
         */
        $this->loadHelper('Flash', ['className' => 'Builder.Flash']);

        /**
         * Set default layout for App using Layout/default
         */
        if ($this->layout === 'default')
            $this->layout('Builder.default');

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
         * Loader base styles using bower_components and default Builder settings
         */
        $this->start('builder-css');
        echo $this->Html->css([
            '/builder/bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css',
            '/builder/bower_components/bootstrap/dist/css/bootstrap.min.css',
            '/builder/bower_components/fontawesome/css/font-awesome.min.css',
            '/builder/bower_components/datatables/media/css/dataTables.bootstrap.min.css',
            '/builder/bower_components/summernote/dist/summernote.css',
            '/builder/css/base.css'
        ]);
        $this->end();

        /**
         * Laoder base scripts using bower_components and default Builder settings
         */
        $this->start('builder-script');
        echo $this->Html->script([
            '/builder/bower_components/jquery/dist/jquery.min.js',
            '/builder/bower_components/jquery-ui/jquery-ui.min.js',
            '/builder/bower_components/bootstrap/dist/js/bootstrap.min.js',
            '/builder/bower_components/datatables/media/js/jquery.dataTables.min.js',
            '/builder/bower_components/datatables/media/js/dataTables.bootstrap.js',
            '/builder/bower_components/summernote/dist/summernote.min.js',
            '/builder/js/base.js'
        ]);
        $this->end();

        /**
         * Load Builder default constructor element form Builder/Element/Constructor
         */
        $this->prepend('builder-element', $this->element('Builder.Constructor/default'));

        /**
         * If empty 'nav' block, set default navbar using Builder/Element
         */
        if (!$this->fetch('nav'))
            $this->assign('nav', $this->element('Builder.navbar-fixed-top'));

        /**
         * If empty 'breadcrumb' block, set default breadcrumb using Builder/Element
         */
        if (!$this->fetch('breadcrumb'))
            $this->assign('breadcrumb', $this->element('Builder.breadcrumb'));

        /**
         * Set default title for layout using controller name
         */
        $this->assign('title', Inflector::humanize(Inflector::tableize($this->request->controller)));
    }

}
