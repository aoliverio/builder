<%
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.1.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
->map(function($field) use ($immediateAssociations) {
foreach ($immediateAssociations as $alias => $details) {
if ($field === $details['foreignKey']) {
return [$field => $details];
}
}
})
->filter()
->reduce(function($fields, $value) {
return $fields + $value;
}, []);

$groupedFields = collection($fields)
->filter(function($field) use ($schema) {
return $schema->columnType($field) !== 'binary';
})
->groupBy(function($field) use ($schema, $associationFields) {
$type = $schema->columnType($field);
if (isset($associationFields[$field])) {
return 'string';
}
if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
return 'number';
}
if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
return 'date';
}
return in_array($type, ['text', 'boolean']) ? $type : 'string';
})
->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
<div class="panel panel-default">
    <div class="panel-heading">
        <span class="pull-right">
            <small><?= __('Actions:'); ?></small>
            <a class="btn btn-xs" href="<?= $this->Url->build(['controller' => '<%= $singularVar %>', 'action' => 'index']) ?>"><i class="fa fa-list"></i> <?= __('List') ?></a>
        </span>
        <h3 class="panel-title"><i class="fa fa-search-plus"></i> <?= __('<%= $singularHumanName %>'); ?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
<% if ($groupedFields['string']) : %>
            <div class="col-md-6 columns strings">
<% 
foreach ($groupedFields['string'] as $field) :
if (isset($associationFields[$field])) :
$details = $associationFields[$field];
%>
                <label class="subheader"><?= __('<%= Inflector::humanize($details['property']) %>') ?></label>
                <p><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></p>
<% else : %>
                <label class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></label>
                <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
                <hr/>
<% endif; %>
<% endforeach; %>
            </div>
<% endif; %>
<% if ($groupedFields['number']) : %>
            <div class="col-md-2 columns numbers end">
<% foreach ($groupedFields['number'] as $field) : %>
                <label class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></label>
                <p><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></p>
                <hr/>
<% endforeach; %>
            </div>
<% endif; %>
<% if ($groupedFields['date']) : %>
            <div class="col-md-2 columns dates end">
<% foreach ($groupedFields['date'] as $field) : %>
                <label class="subheader"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></label>
                <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
                <hr/>
<% endforeach; %>
            </div>
<% endif; %>
<% if ($groupedFields['boolean']) : %>
            <div class="col-md-2 columns booleans end">
<% foreach ($groupedFields['boolean'] as $field) : %>
                <label class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></label>
                <p><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></p>
                <hr/>
<% endforeach; %>
            </div>
<% endif; %>
        </div>
    </div>
</div>