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
    }

}
