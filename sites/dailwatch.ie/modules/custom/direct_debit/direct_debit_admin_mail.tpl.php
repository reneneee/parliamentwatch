<?php print($vars['header']); ?>

<?php print($vars['issuer']['description']); ?>

<?php print($vars['issuer']['content']['name']); ?>

<?php print($vars['issuer']['content']['street']); ?>

<?php print($vars['issuer']['content']['city']); ?>

<?php print($vars['contributor']['description']); ?>

<?php if (!empty($vars['contributor']['content']['organization_name'])) : ?>
    <?php print($vars['contributor']['content']['organization_name']); ?>
<?php endif; ?>

<?php print($vars['contributor']['content']['name']); ?>

<?php print($vars['contributor']['content']['city']); ?>

<?php print($vars['contributor']['content']['street']); ?>

<?php print($vars['amount_numeric']['description']); ?>

<?php print($vars['amount_numeric']['content']); ?>

<?php print($vars['date']['description']); ?>

<?php print($vars['date']['content']); ?>

<?php

print($vars['footer'])?>