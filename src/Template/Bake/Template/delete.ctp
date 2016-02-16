<?php $this->layout = null ?>
<h3 class="page-header"><?= __('Delete <%= $singularHumanName %>'); ?></h3>
<div>
    <?= $this->Form->create($<%= $singularVar %>); ?>
    <p><?= __('Are you sure you want to delete # {0}?', $<%= $singularVar %>->id); ?></p>
    <hr/>
    <div class="text-center">
        <button class="btn btn-danger" type="submit"><?= __('Confirm') ?></button>  
    </div>
    <?= $this->Form->end(); ?>
</div>