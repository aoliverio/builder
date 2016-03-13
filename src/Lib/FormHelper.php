<?php

namespace Builder\Lib;

/**
 * 
 */
class FormHelper {

    /**
     * 
     * @return type
     */
    public static function getTemplates() {
        return [
            'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
            'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
            'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>',
            'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
            'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
            'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
        ];
    }

}
