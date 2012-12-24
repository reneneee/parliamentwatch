<?php /* Smarty version 2.6.26, created on 2012-12-24 11:53:22
         compiled from CRM/Core/BillingBlock.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Core/BillingBlock.tpl', 27, false),array('modifier', 'crmReplace', 'CRM/Core/BillingBlock.tpl', 162, false),)), $this); ?>
<div class="crm-section">
    <div class="label2"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Choose your method of payment<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
    <div class="clear"></div>
</div>
<?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 2 && ! $this->_tpl_vars['hidePayPalExpress']): ?>
    <div class="crm-section">
        <div class="content"><input type="radio" class="form-radio" name="payment_method" id="payment_1" value="payment_debit">&nbsp;Direct debit authorization&nbsp;&nbsp;&nbsp;<input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_2" value="payment_credit">&nbsp;Credit card&nbsp;&nbsp;<input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_3" value="paypal">Paypal</div>
    </div>
<?php else: ?>
    <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
        <div class="crm-section">
            <div class="content"><input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_1" value="payment_debit">&nbsp;Direct debit authorization&nbsp;&nbsp;&nbsp;<input type="radio" class="form-radio" name="payment_method" id="payment_2" value="payment_credit">&nbsp;Credit card&nbsp;&nbsp;<input type="radio" class="form-radio" name="payment_method" id="payment_3" value="paypal">Paypal</div>
        </div>
    <?php else: ?>
        <div class="crm-section">
            <div class="content"><input type="radio" class="form-radio" name="payment_method" id="payment_1" value="payment_debit">&nbsp;Direct debit authorization&nbsp;&nbsp;&nbsp;<input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_2" value="payment_credit">&nbsp;Credit card&nbsp;&nbsp;<input type="radio" class="form-radio" name="payment_method" id="payment_3" value="paypal">Paypal</div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<div class="crm-section">
    <div class="content"><div id="img-payment-processor-wait" style="display: none"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please wait...<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div></div>
</div>
<?php if ($this->_tpl_vars['form']['credit_card_number'] || $this->_tpl_vars['form']['bank_account_number']): ?>
    <div id="payment_information">
        <fieldset class="billing_mode-group <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>direct_debit_info-group<?php else: ?>credit_card_info-group<?php endif; ?>">
            <legend>
                <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
                    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Direct Debit Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                <?php else: ?>
                    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credit Card Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                <?php endif; ?>
            </legend> 
            <?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 2 && ! $this->_tpl_vars['hidePayPalExpress']): ?>
                <div class="crm-section no-label paypal_button_info-section">	
                    <div class="content description">
                        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>If you have a PayPal account, you can click the PayPal button to continue.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    </div>
                </div>
                <div class="crm-section no-label <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['expressButtonName']]['name']; ?>
-section">	
                    <div class="content description">
                        <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['expressButtonName']]['html']; ?>

                    </div>
                </div>
            <?php endif; ?> 

            <?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 1): ?>
                <div class="crm-section billing_mode-section <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>direct_debit_info-section<?php else: ?>credit_card_info-section<?php endif; ?>">
                    <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['account_holder']['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form']['account_holder']['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['bank_account_number']['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form']['bank_account_number']['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['bank_identification_number']['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form']['bank_identification_number']['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['bank_name']['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form']['bank_name']['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                    <?php else: ?>
                        <?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 2 && ! $this->_tpl_vars['hidePayPalExpress']): ?>
                        <?php else: ?>
                            <div class="crm-section <?php echo $this->_tpl_vars['form']['credit_card_type']['name']; ?>
-section">	
                                <div class="content"><?php echo $this->_tpl_vars['form']['credit_card_type']['html']; ?>
</div>
                                <div class="clear"></div> 
                            </div>
                            <div class="crm-section <?php echo $this->_tpl_vars['form']['credit_card_number']['name']; ?>
-section">	
                                <div class="content"><?php echo $this->_tpl_vars['form']['credit_card_number']['html']; ?>

                                </div>
                                <div class="clear"></div> 
                            </div>
                            <div class="crm-section <?php echo $this->_tpl_vars['form']['cvv2']['name']; ?>
-section">	
                                <div class="content">
                                    <?php echo $this->_tpl_vars['form']['cvv2']['html']; ?>

                                    <img src="<?php echo $this->_tpl_vars['config']->resourceBase; ?>
i/mini_cvv2.gif" alt="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Security Code Location on Credit Card<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" style="vertical-align: text-bottom;" />
                                </div>
                                <div class="clear"></div> 
                            </div>
                            <div class="crm-section <?php echo $this->_tpl_vars['form']['credit_card_exp_date']['name']; ?>
-section">	
                                <div class="content"><?php echo $this->_tpl_vars['form']['credit_card_exp_date']['html']; ?>
</div>
                                <div class="clear"></div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </fieldset>

            <?php if ($this->_tpl_vars['paymentProcessor']['billing_mode'] & 2 && ! $this->_tpl_vars['hidePayPalExpress']): ?>
            <?php else: ?>
                <div class="crm-section sameBilling-section">
                    <div class="label"><label for="sameBilling"></label></div>
                    <div><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>billing address differs from my personal address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
                    <div class="content">
                        <input type="checkbox" name="sameBilling" id="sameBilling"/>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php endif; ?>
            <div id="donation-billing-name-section">
                <fieldset class="billing_name_address-group">
                    <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Billing Name and Address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
                    <div class="crm-section billing_name_address-section">
                        <div class="crm-section billingNameInfo-section">	
                            <div class="content description">
                                <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
                                    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the name of the account holder, and the corresponding billing address.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                <?php else: ?>
                                    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the name as shown on your credit or debit card, and the billing address for this card.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['billing_first_name']['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form']['billing_first_name']['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section <?php echo $this->_tpl_vars['form']['billing_last_name']['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form']['billing_last_name']['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <?php $this->assign('n', "billing_street_address-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <?php $this->assign('n', "billing_city-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <?php $this->assign('n', "billing_country_id-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">	
                            <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form'][$this->_tpl_vars['n']]['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'big') : smarty_modifier_crmReplace($_tmp, 'class', 'big')); ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <?php $this->assign('n', "billing_state_province_id-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">	
                            <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form'][$this->_tpl_vars['n']]['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'big') : smarty_modifier_crmReplace($_tmp, 'class', 'big')); ?>
</div>
                            <div class="clear"></div> 
                        </div>
                        <?php $this->assign('n', "billing_postal_code-".($this->_tpl_vars['bltID'])); ?>
                        <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">	
                            <div class="content"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>
</div>
                            <div class="clear"></div> 
                        </div>
                    </div>
                </fieldset>
            </div>
        <?php else: ?>
        </fieldset>
    <?php endif; ?>
</div>
<?php endif; ?>