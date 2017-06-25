<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

/**
 * Set layout TITLE
 */
$this->assign('title', __('App Information'));
$this->assign('subheading', __('Builder Area'));
?>

<h2 class="page-header"><?= __('Loaded Plugin') ?></h2>
<?php foreach (Plugin::loaded() as $row): ?>
    <p class="alert alert-warning"><a href="<?= $this->Url->build('/' . $row) ?>"><?= $row ?></a></p>
<?php endforeach; ?>
<hr/>

<h2 class="page-header"><?= __('Database') ?></h2>
<?php
try {
    $connection = ConnectionManager::get('default');
    $connected = $connection->connect();
} catch (Exception $connectionError) {
    $connected = false;
    $errorMsg = $connectionError->getMessage();
    if (method_exists($connectionError, 'getAttributes')):
        $attributes = $connectionError->getAttributes();
        if (isset($errorMsg['message'])):
            $errorMsg .= '<br />' . $attributes['message'];
        endif;
    endif;
}
?>
<?php if ($connected) : ?>
    <p class="alert alert-success">CakePHP is able to connect to the database.</p>
<?php else: ?>
    <p class="alert alert-danger">CakePHP is NOT able to connect to the database.<br /><?= $errorMsg ?></p>
<?php endif; ?>
<hr/>

<h2 class="page-header"><?= __('Environment') ?></h2>
<?php if (version_compare(PHP_VERSION, '5.5.9', '>=')): ?>
    <p class="alert alert-success">Your version of PHP is 5.5.9 or higher (detected <?= PHP_VERSION ?>).</p>
<?php else: ?>
    <p class="alert alert-danger">Your version of PHP is too low. You need PHP 5.5.9 or higher to use CakePHP (detected <?= PHP_VERSION ?>).</p>
<?php endif; ?>
<?php if (extension_loaded('mbstring')): ?>
    <p class="alert alert-success">Your version of PHP has the mbstring extension loaded.</p>
<?php else: ?>
    <p class="alert alert-danger">Your version of PHP does NOT have the mbstring extension loaded.</p>;
<?php endif; ?>
<?php if (extension_loaded('openssl')): ?>
    <p class="alert alert-success">Your version of PHP has the openssl extension loaded.</p>
<?php elseif (extension_loaded('mcrypt')): ?>
    <p class="alert alert-success">Your version of PHP has the mcrypt extension loaded.</p>
<?php else: ?>
    <p class="alert alert-danger">Your version of PHP does NOT have the openssl or mcrypt extension loaded.</p>
<?php endif; ?>
<?php if (extension_loaded('intl')): ?>
    <p class="alert alert-success">Your version of PHP has the intl extension loaded.</p>
<?php else: ?>
    <p class="alert alert-danger">Your version of PHP does NOT have the intl extension loaded.</p>
<?php endif; ?>
<hr/>

<h2 class="page-header"><?= __('Filesystem') ?></h2>
<?php if (is_writable(TMP)): ?>
    <p class="alert alert-success">Your tmp directory is writable.</p>
<?php else: ?>
    <p class="alert alert-danger">Your tmp directory is NOT writable.</p>
<?php endif; ?>
<?php if (is_writable(LOGS)): ?>
    <p class="alert alert-success">Your logs directory is writable.</p>
<?php else: ?>
    <p class="alert alert-danger">Your logs directory is NOT writable.</p>
<?php endif; ?>
<?php $settings = Cache::config('_cake_core_'); ?>
<?php if (!empty($settings)): ?>
    <p class="alert alert-success">The <em><?= $settings['className'] ?>Engine</em> is being used for core caching. To change the config edit config/app.php</p>
<?php else: ?>
    <p class="alert alert-danger">Your cache is NOT working. Please check the settings in config/app.php</p>
<?php endif; ?>
