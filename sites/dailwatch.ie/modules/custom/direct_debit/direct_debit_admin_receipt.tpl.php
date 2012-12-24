<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $vars['language']->language; ?>" lang="<?php print $vars['language']->language; ?>" dir="<?php print $vars['language']->dir; ?>">

    <head>
        <title><?php print($vars['title']); ?></title>
        <?php print($vars['html_head']) ?>
    </head>

    <body>

        <div id="direct_debit_receipt_wrapper">
            <div id="direct_debit_receipt">
                <h1 class="title"><?php print($vars['title']); ?></h1>

                <div class="content">

                    <div class="header"><?php print($vars['header']); ?></div>

                    <div class="issuer">
                        <?php print($vars['issuer']['description']); ?>
                        <p>
                            <?php print($vars['issuer']['content']['name']); ?><br />
                            <?php print($vars['issuer']['content']['street']); ?><br />
                            <?php print($vars['issuer']['content']['city']); ?>
                        </p>
                    </div>

                    <div class="contributor">
                        <?php print($vars['contributor']['description']); ?>
                        <p>
                            <?php if (!empty($vars['contributor']['content']['organization_name'])) : ?>
                                <?php print($vars['contributor']['content']['organization_name']); ?><br />
                            <?php endif; ?>
                            <?php print($vars['contributor']['content']['name']); ?><br />
                            <?php print($vars['contributor']['content']['city']); ?><br />
                            <?php print($vars['contributor']['content']['street']); ?>
                        </p>
                    </div>

                    <div class="amount_numeric">
                        <?php print($vars['amount_numeric']['description']); ?>
                        <p>
                            <?php print($vars['amount_numeric']['content']); ?>
                        </p>
                    </div>

                    <?php
                    /*
                      <div class="amount_verbalized">
                      <?php print($vars['amount_verbalized']['description']); ?>
                      <?php print($vars['amount_verbalized']['content']); ?>
                      </div>
                     */
                    ?>

                    <div class="date">
                        <?php print($vars['date']['description']); ?>
                        <p>
                            <?php print($vars['date']['content']); ?>
                        </p>
                    </div>

                    <div class="footer"><?php print($vars['footer']); ?></div>

                </div>
            </div>
        </div>
    </body>
</html>