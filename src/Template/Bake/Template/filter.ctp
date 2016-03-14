<?php $this->layout = null ?>
<h4><?= __('Filter <%= $singularHumanName %>'); ?></h4>
<hr/>
<div>
    <?= $this->Form->create($<%= $singularVar %>); ?>
<% if (!empty($associations['BelongsToMany'])) { %>
<% foreach ($associations['BelongsToMany'] as $assocName => $assocData) { %>
    <?= $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>, 'class' => 'form-control']); ?>
<% } %>
<% } else { %>
    <?= __('No filter template are builded. Make your filter here!'); ?>
<% } %>
    <hr/>
    <div class="text-center">
        <button class="btn btn-success" type="submit"><?= __('Filter'); ?></button>  
    </div>
    <?= $this->Form->end(); ?>
</div>