<?php

use Cake\Utility\Inflector;
use Cake\Core\Configure;

/**
 * 
 */
$breadcrumb = [];

/**
 * 
 */
if (trim($this->request->url) != ''):
    array_push($breadcrumb, [
        'class' => '',
        'href' => $this->Url->build(Configure::read('Builder.dashboard_url')),
        'label' => __('Dashboard')
    ]);
endif;

/**
 * 
 */
if (trim($this->request['plugin']) != '') {
    array_push($breadcrumb, [
        'class' => '',
        'href' => $this->Url->build('/' . trim($this->request['plugin'])),
        'label' => Inflector::humanize(trim($this->request['plugin']))
    ]);
}

/**
 * 
 */
if (trim($this->request['controller']) != 'Pages') {
    array_push($breadcrumb, [
        'class' => '',
        'href' => $this->Url->build(['controller' => trim($this->request['controller']), 'action' => 'index']),
        'label' => Inflector::humanize(trim($this->request['controller']))
    ]);

    array_push($breadcrumb, [
        'class' => 'active',
        'href' => '',
        'label' => Inflector::humanize(trim($this->request['action']))
    ]);
} else {
    if (isset($this->request->params['pass'][0])) {
        array_push($breadcrumb, [
            'class' => 'active',
            'href' => '',
            'label' => Inflector::humanize(trim($this->request->params['pass'][0]))
        ]);
    }
}
?>
<ol class="breadcrumb">
    <?php
    $iter = 1;
    foreach ($breadcrumb as $row) :
        if ($iter == 1)
            $label = '<i class="fa fa-dashboard"></i>' . __('Dashboard');
        else
            $label = Inflector::humanize($row['label']);
        if ($row['class'] == 'active')
            echo '<li class="active">' . $label . '</li>';
        else
            echo '<li><a href="' . strtolower($row['href']) . '">' . $label . '</a></li>';
        $iter++;
    endforeach;
    ?> 
</ol>
