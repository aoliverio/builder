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

$fields = collection($fields)->filter(function($field) use ($schema) {
    return $schema->columnType($field) !== 'binary';
});
%>
<?php $this->layout = null ?>
<h4><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($<%= $singularVar %>) ?>
<% foreach ($fields as $field) : %>
<% if (in_array($field, $primaryKey)) { %>
<% continue; %>
<% } %>
<% if (isset($keyFields[$field])) { %>
<% $fieldData = $schema->column($field); %>
<% if (!empty($fieldData['null'])) { %>
    <?= $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]); ?>
<% } else { %>
    <?= $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>]); ?>
<% } %>
<% continue; %>
<% } %>
<% if (!in_array($field, ['created', 'modified', 'created_by', 'modified_by'])) { %>
<% $fieldData = $schema->column($field); %>
<% if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) { %>
    <?= $this->Form->input('<%= $field %>', ['empty' => true, 'default' => '']); ?>
        <% } else { %>
    <?= $this->Form->input('<%= $field %>'); ?>
<% } %>
<% } %>
<% endforeach; %>
<% if (!empty($associations['BelongsToMany'])) { %>
<% foreach ($associations['BelongsToMany'] as $assocName => $assocData) : %>
    <?= $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>]); ?>
<% endforeach; %>
<% } %>
    <hr/>
    <div class="text-center">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>  
    </div>
    <?= $this->Form->end() ?>
</div>