<?php /* Smarty version 2.6.26, created on 2012-12-24 11:53:22
         compiled from CRM/Contribute/Form/Contribution/Main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contribute/Form/Contribution/Main.tpl', 65, false),array('modifier', 'crmMoney', 'CRM/Contribute/Form/Contribution/Main.tpl', 93, false),array('function', 'crmURL', 'CRM/Contribute/Form/Contribution/Main.tpl', 311, false),)), $this); ?>
<?php if ($this->_tpl_vars['onbehalf']): ?> 
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/OnBehalfOf.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
<?php else: ?>
    <?php echo '
        <script type="text/javascript">
        <!--
        // Putting these functions directly in template so they are available for standalone forms

        function useAmountOther() {
            for( i=0; i < document.Main.elements.length; i++ ) {
                element = document.Main.elements[i];
                if ( element.type == \'radio\' && element.name == \'amount\' ) {
                    if (element.value == \'amount_other_radio\' ) {
                        element.checked = true;
                    } else {
                        element.checked = false;
                    }
                }
            }
        }

        function clearAmountOther() {
          if (document.Main.amount_other == null) return; // other_amt field not present; do nothing
          document.Main.amount_other.value = "";
        }
//        jQuery(function(){
//            var states = jQuery(".custom_pre_profile-group .state_province-Primary-section").html();
//            jQuery(\'<div class="crm-section country-states-section">\'+states+\'</div>\').insertAfter(".crm-contribution-main-form-block .amount_other-section");
//        });
        //-->
        </script>
    '; ?>


    <?php if ($this->_tpl_vars['action'] & 1024): ?> 
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/PreviewHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <?php endif; ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/TrackingFields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php ob_start(); ?><span class="marker" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This field is required.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">*</span><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('reqMark', ob_get_contents());ob_end_clean(); ?>
<div class="crm-block crm-contribution-main-form-block">
    <div id="intro_text" class="crm-section intro_text-section">
        <?php echo $this->_tpl_vars['intro_text']; ?>

    </div>
    <?php if ($this->_tpl_vars['islifetime'] || $this->_tpl_vars['ispricelifetime']): ?>
        <div id="help">You have a current Lifetime Membership which does not need top be renewed.</div> 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['priceSet'] && empty ( $this->_tpl_vars['useForMember'] )): ?>
        <div id="priceset"> 
            <fieldset>
                <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Price/Form/PriceSet.tpl", 'smarty_include_vars' => array('extends' => 'Contribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </fieldset>
        </div>
    <?php else: ?>  
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/MembershipBlock.tpl", 'smarty_include_vars' => array('context' => 'makeContribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if ($this->_tpl_vars['form']['amount']): ?>
            <div class="crm-section <?php echo $this->_tpl_vars['form']['amount']['name']; ?>
-section">
                <div class="label"><?php echo $this->_tpl_vars['form']['amount']['label']; ?>
</div>
                <div class="content"><?php echo $this->_tpl_vars['form']['amount']['html']; ?>
</div>
                <div class="clear"></div> 
            </div>
        <?php endif; ?> 
        <?php if ($this->_tpl_vars['is_allow_other_amount']): ?>
            <div class="crm-section <?php echo $this->_tpl_vars['form']['amount_other']['name']; ?>
-section">
                <div class="label"><?php echo $this->_tpl_vars['form']['amount_other']['label']; ?>
</div>
                <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['amount_other']['html'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</div>
                <div class="clear"></div> 
            </div>
        <?php endif; ?> 

        <div class="crm-section country-states-section">
            <span>Choose your donation target (Optional)</span>
            <span class="tooltip" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Lorem ipsum dolor sit amet, consecteruer<br>adipiscing elit. Aenean commodo ligula eget<br>dollor. Aenean massa. Cum sociis natoque<br>penatibus et magnis dis parturient montes,<br>nascetur ridiculus mus. Donec quam felis,<br>ultricies nec, pellentesque eu, pretium quis,</br>sem. Nulla consequat massa quis enim.<br>Donec pede justo, fringilla vel, aliquet nec,<br>valputate eget, arcu In enim justo, rhoncus<br>ut, imperdiet a, venenatis vitae, justo.<br>Nullam dictum felis eu pede mollis pretium.<br>Ingeger tincidunt. Cras dapibus.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
                <p class="donation_target_bg_img">&nbsp;</p>
            </span> 
        </div>

        <?php if ($this->_tpl_vars['pledgeBlock']): ?> 
            <?php if ($this->_tpl_vars['is_pledge_payment']): ?>
                <div class="crm-section <?php echo $this->_tpl_vars['form']['pledge_amount']['name']; ?>
-section">
                    <div class="label"><?php echo $this->_tpl_vars['form']['pledge_amount']['label']; ?>
&nbsp;<span class="marker">*</span></div>
                    <div class="content"><?php echo $this->_tpl_vars['form']['pledge_amount']['html']; ?>
</div>
                    <div class="clear"></div> 
                </div>
            <?php else: ?>
                <div class="crm-section <?php echo $this->_tpl_vars['form']['is_pledge']['name']; ?>
-section">
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['is_pledge']['html']; ?>
&nbsp;
                        <?php if ($this->_tpl_vars['is_pledge_interval']): ?>
                            <?php echo $this->_tpl_vars['form']['pledge_frequency_interval']['html']; ?>
&nbsp;
                        <?php endif; ?>
                        <?php echo $this->_tpl_vars['form']['pledge_frequency_unit']['html']; ?>
&nbsp;<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>for<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>&nbsp;<?php echo $this->_tpl_vars['form']['pledge_installments']['html']; ?>
&nbsp;<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>installments.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                    </div>
                </div>
            <?php endif; ?> 
        <?php endif; ?> 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['is_pay_later']): ?>
        <div class="crm-section <?php echo $this->_tpl_vars['form']['is_pay_later']['name']; ?>
-section">
            <div class="content"><?php echo $this->_tpl_vars['form']['is_pay_later']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['is_pay_later']['label']; ?>
</div>
        </div>
    <?php endif; ?> 
    <?php if ($this->_tpl_vars['form']['is_recur']): ?>
        <div class="crm-section <?php echo $this->_tpl_vars['form']['is_recur']['name']; ?>
-section">
            <div class="content">
                <p><strong><?php echo $this->_tpl_vars['form']['is_recur']['html']; ?>
 <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>every<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> &nbsp;<?php echo $this->_tpl_vars['form']['frequency_interval']['html']; ?>
 &nbsp; <?php echo $this->_tpl_vars['form']['frequency_unit']['html']; ?>
&nbsp; <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>for<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> &nbsp; <?php echo $this->_tpl_vars['form']['installments']['html']; ?>
 &nbsp;<?php echo $this->_tpl_vars['form']['installments']['label']; ?>
</strong>
                </p>
                <p><span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your recurring contribution will be processed automatically for the number of installments you specify. You can leave the number of installments blank if you want to make an open-ended commitment. In either case, you can choose to cancel at any time.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 
                        <?php if ($this->_tpl_vars['is_email_receipt']): ?>
                            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You will receive an email receipt for each recurring contribution. The receipts will include a link you can use if you decide to modify or cancel your future contributions.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> 
                        <?php endif; ?>
                    </span></p>
            </div>
        </div>
    <?php endif; ?> 
    <?php if ($this->_tpl_vars['pcpSupporterText']): ?>
        <div class="crm-section pcpSupporterText-section">
            <div class="content"><?php echo $this->_tpl_vars['pcpSupporterText']; ?>
</div>
        </div>
    <?php endif; ?>
    <?php $this->assign('n', "email-".($this->_tpl_vars['bltID'])); ?>
    <div class="crm-section <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['name']; ?>
-section">
        <div class="label"><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['label']; ?>
</div>
        <div class="content">
            <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['n']]['html']; ?>

        </div>
        <div class="clear"></div> 
    </div>

    <?php if ($this->_tpl_vars['form']['is_for_organization']): ?>
        <div class="crm-section <?php echo $this->_tpl_vars['form']['is_for_organization']['name']; ?>
-section">
            <div class="content">
                <?php echo $this->_tpl_vars['form']['is_for_organization']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['is_for_organization']['label']; ?>

            </div>
        </div>
    <?php endif; ?>


    <?php if ($this->_tpl_vars['is_for_organization']): ?> 
        <div id='onBehalfOfOrg' class="crm-section"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/OnBehalfOf.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <?php endif; ?> 
    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/CMSUser.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/PremiumBlock.tpl", 'smarty_include_vars' => array('context' => 'makeContribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 

    <?php if ($this->_tpl_vars['honor_block_is_active']): ?>
        <fieldset class="crm-group honor_block-group">
            <legend><?php echo $this->_tpl_vars['honor_block_title']; ?>
</legend>
            <div class="crm-section honor_block_text-section">
                <?php echo $this->_tpl_vars['honor_block_text']; ?>

            </div>
            <?php if ($this->_tpl_vars['form']['honor_type_id']['html']): ?>
                <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_type_id']['name']; ?>
-section">
                    <div class="content" >
                        <?php echo $this->_tpl_vars['form']['honor_type_id']['html']; ?>

                        <span class="crm-clear-link">(<a href="#" title="unselect" onclick="unselectRadio('honor_type_id', '<?php echo $this->_tpl_vars['form']['formName']; ?>
');enableHonorType(); return false;"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>clear<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>)</span>
                        <div class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please include the name, and / or email address of the person you are honoring.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
                    </div>
                </div>
            <?php endif; ?>
            <div id="honorType" class="honoree-name-email-section">
                <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_prefix_id']['name']; ?>
-section">	
                    <div class="content"><?php echo $this->_tpl_vars['form']['honor_prefix_id']['html']; ?>
</div>
                </div>
                <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_first_name']['name']; ?>
-section">	
                    <div class="label"><?php echo $this->_tpl_vars['form']['honor_first_name']['label']; ?>
</div>
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['honor_first_name']['html']; ?>

                    </div>
                    <div class="clear"></div> 
                </div>
                <div class="crm-section <?php echo $this->_tpl_vars['form']['honor_last_name']['name']; ?>
-section">	
                    <div class="label"><?php echo $this->_tpl_vars['form']['honor_last_name']['label']; ?>
</div>
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['honor_last_name']['html']; ?>

                    </div>
                    <div class="clear"></div> 
                </div>
                <div id="honorTypeEmail" class="crm-section <?php echo $this->_tpl_vars['form']['honor_email']['name']; ?>
-section">
                    <div class="label"><?php echo $this->_tpl_vars['form']['honor_email']['label']; ?>
</div>
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['honor_email']['html']; ?>

                    </div>
                    <div class="clear"></div> 
                </div>
            </div>
        </fieldset>
    <?php endif; ?> 

    <div class="crm-group custom_pre_profile-group">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['customPre'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <?php if ($this->_tpl_vars['pcp']): ?>
        <fieldset class="crm-group pcp-group">
            <div class="crm-section pcp-section">
                <div class="crm-section display_in_roll-section">
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['pcp_display_in_roll']['html']; ?>
 &nbsp;
                        <?php echo $this->_tpl_vars['form']['pcp_display_in_roll']['label']; ?>

                    </div>
                    <div class="clear"></div> 
                </div>
                <div id="nameID" class="crm-section is_anonymous-section">
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['pcp_is_anonymous']['html']; ?>

                    </div>
                    <div class="clear"></div> 
                </div>
                <div id="nickID" class="crm-section pcp_roll_nickname-section">
                    <div class="label"><?php echo $this->_tpl_vars['form']['pcp_roll_nickname']['label']; ?>
</div>
                    <div class="content"><?php echo $this->_tpl_vars['form']['pcp_roll_nickname']['html']; ?>

                        <div class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the name you want listed with this contribution. You can use a nick name like 'The Jones Family' or 'Sarah and Sam'.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
                    </div>
                    <div class="clear"></div> 
                </div>
                <div id="personalNoteID" class="crm-section pcp_personal_note-section">
                    <div class="label"><?php echo $this->_tpl_vars['form']['pcp_personal_note']['label']; ?>
</div>
                    <div class="content">
                        <?php echo $this->_tpl_vars['form']['pcp_personal_note']['html']; ?>

                        <div class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter a message to accompany this contribution.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
                    </div>
                    <div class="clear"></div> 
                </div>
            </div>
        </fieldset>
    <?php endif; ?> 

    <?php if ($this->_tpl_vars['is_monetary']): ?> 
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/BillingBlock.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <?php endif; ?> 

    <div class="crm-group custom_post_profile-group">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['customPost'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>

    <div id="payment_notice">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your information is being transmitted encrypted.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <span class="tooltip" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Lorem ipsum dolor sit amet, consecteruer<br>adipiscing elit. Aenean commodo ligula eget<br>dollor. Aenean massa. Cum sociis natoque<br>penatibus et magnis dis parturient montes,<br>nascetur ridiculus mus. Donec quam felis,<br>ultricies nec, pellentesque eu, pretium quis,</br>sem. Nulla consequat massa quis enim.<br>Donec pede justo, fringilla vel, aliquet nec,<br>valputate eget, arcu In enim justo, rhoncus<br>ut, imperdiet a, venenatis vitae, justo.<br>Nullam dictum felis eu pede mollis pretium.<br>Ingeger tincidunt. Cras dapibus.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>">
            <p class="donation_target_bg_img">&nbsp;</p>
        </span>
    </div>

    <?php if ($this->_tpl_vars['isCaptcha']): ?> 
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/common/ReCAPTCHA.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
    <?php endif; ?> 
    <div id="paypalExpress">
        <?php if ($this->_tpl_vars['is_monetary']): ?> 
             
            <?php if ($this->_tpl_vars['paymentProcessor']['payment_processor_type'] == 'PayPal_Express'): ?> 
                <?php $this->assign('expressButtonName', '_qf_Main_upload_express'); ?>
                <fieldset class="crm-group paypal_checkout-group">
                    <legend><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Checkout with PayPal<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></legend>
                    <div class="section">
                        <div class="crm-section paypalButtonInfo-section">
                            <div class="content">
                                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click the PayPal button to continue.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
                            </div>
                            <div class="clear"></div> 
                        </div>	
                        <div class="crm-section <?php echo $this->_tpl_vars['expressButtonName']; ?>
-section">
                            <div class="content">
                                <?php echo $this->_tpl_vars['form'][$this->_tpl_vars['expressButtonName']]['html']; ?>
 <span class="description">Checkout securely. Pay without sharing your financial information. </span>
                            </div>
                            <div class="clear"></div> 
                        </div>
                    </div>	
                </fieldset>
            <?php endif; ?> 
        <?php endif; ?>
    </div>
    <div id="crm-submit-buttons" class="crm-submit-buttons">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <?php if ($this->_tpl_vars['footer_text']): ?>
        <div id="footer_text" class="crm-section contribution_footer_text-section">
            <p><?php echo $this->_tpl_vars['footer_text']; ?>
</p>
        </div>
    <?php endif; ?>
    <br>
    <?php if ($this->_tpl_vars['isShare']): ?>
    <?php ob_start(); ?><?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contribute/transact','q' => "reset=1&amp;id=".($this->_tpl_vars['contributionPageID']),'a' => true,'fe' => 1,'h' => 1), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('eventUrl', ob_get_contents());ob_end_clean(); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/SocialNetwork.tpl", 'smarty_include_vars' => array('url' => $this->_tpl_vars['eventUrl'],'title' => $this->_tpl_vars['title'],'pageURL' => $this->_tpl_vars['eventUrl'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['form']['is_pay_later'] && $this->_tpl_vars['hidePaymentInformation']): ?> 
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/showHideByFieldValue.tpl", 'smarty_include_vars' => array('trigger_field_id' => 'is_pay_later','trigger_value' => "",'target_element_id' => 'payment_information','target_element_type' => "table-row",'field_type' => 'radio','invert' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<script type="text/javascript">
<?php if ($this->_tpl_vars['pcp']): ?>pcpAnonymous();<?php endif; ?>
<?php echo '
var is_monetary = '; ?>
<?php echo $this->_tpl_vars['is_monetary']; ?>
<?php echo '
if (! is_monetary ) {
    if ( document.getElementsByName("is_pay_later")[0] ) {
	document.getElementsByName("is_pay_later")[0].disabled = true;
    }
}
if ( '; ?>
"<?php echo $this->_tpl_vars['form']['is_recur']; ?>
"<?php echo ' ) {
    if ( document.getElementsByName("is_recur")[0].checked == true ) { 
	window.onload = function() {
	    enablePeriod();
	}
    }
}
function enablePeriod ( ) {
    var frqInt  = '; ?>
"<?php echo $this->_tpl_vars['form']['frequency_interval']; ?>
"<?php echo ';
    if ( document.getElementsByName("is_recur")[0].checked == true ) { 
	document.getElementById(\'installments\').value = \'\';
	if ( frqInt ) {
	    document.getElementById(\'frequency_interval\').value    = \'\';
	    document.getElementById(\'frequency_interval\').disabled = true;
	}
	document.getElementById(\'installments\').disabled   = true;
	document.getElementById(\'frequency_unit\').disabled = true;

	//get back to auto renew settings. 
	var allowAutoRenew = '; ?>
'<?php echo $this->_tpl_vars['allowAutoRenewMembership']; ?>
'<?php echo ';
	if ( allowAutoRenew && cj("#auto_renew") ) {
	   showHideAutoRenew( null );
	}	
    } else {
	if ( frqInt ) {
	    document.getElementById(\'frequency_interval\').disabled = false;
	}
	document.getElementById(\'installments\').disabled   = false;
	document.getElementById(\'frequency_unit\').disabled = false;
	
	//disabled auto renew settings.
	var allowAutoRenew = '; ?>
'<?php echo $this->_tpl_vars['allowAutoRenewMembership']; ?>
'<?php echo ';
	if ( allowAutoRenew && cj("#auto_renew") ) {
	    cj("#auto_renew").attr( \'checked\', false );
	    cj(\'#allow_auto_renew\').hide( );
	} 
	
    }
}

'; ?>
<?php if ($this->_tpl_vars['relatedOrganizationFound'] && $this->_tpl_vars['reset']): ?><?php echo '
   cj( "#is_for_organization" ).attr( \'checked\', true );
   showOnBehalf( false );
'; ?>
<?php elseif ($this->_tpl_vars['onBehalfRequired']): ?><?php echo '
   showOnBehalf( true );
'; ?>
<?php endif; ?><?php echo '

'; ?>
<?php if ($this->_tpl_vars['honor_block_is_active'] && $this->_tpl_vars['form']['honor_type_id']['html']): ?><?php echo '
    enableHonorType();
'; ?>
 <?php endif; ?><?php echo '

function enableHonorType( ) {
    var element = document.getElementsByName("honor_type_id");
    for (var i = 0; i < element.length; i++ ) {
	var isHonor = false;	
	if ( element[i].checked == true ) {
	    var isHonor = true;
	    break;
	}
    }
    if ( isHonor ) {
	show(\'honorType\', \'block\');
	show(\'honorTypeEmail\', \'block\');
    } else {
	document.getElementById(\'honor_first_name\').value = \'\';
	document.getElementById(\'honor_last_name\').value  = \'\';
	document.getElementById(\'honor_email\').value      = \'\';
	document.getElementById(\'honor_prefix_id\').value  = \'\';
	hide(\'honorType\', \'block\');	
	hide(\'honorTypeEmail\', \'block\');
    }
}

function pcpAnonymous( ) {
    // clear nickname field if anonymous is true
    if ( document.getElementsByName("pcp_is_anonymous")[1].checked ) { 
        document.getElementById(\'pcp_roll_nickname\').value = \'\';
    }
    if ( ! document.getElementsByName("pcp_display_in_roll")[0].checked ) { 
        hide(\'nickID\', \'block\');
        hide(\'nameID\', \'block\');
	hide(\'personalNoteID\', \'block\');
    } else {
        if ( document.getElementsByName("pcp_is_anonymous")[0].checked ) {
            show(\'nameID\', \'block\');
            show(\'nickID\', \'block\');
	    show(\'personalNoteID\', \'block\');
        } else {
            show(\'nameID\', \'block\');
            hide(\'nickID\', \'block\');
	    hide(\'personalNoteID\', \'block\');
        }
    }
}
'; ?>
<?php if ($this->_tpl_vars['form']['is_pay_later'] && $this->_tpl_vars['paymentProcessor']['payment_processor_type'] == 'PayPal_Express'): ?><?php echo ' 
    showHidePayPalExpressOption();
'; ?>
 <?php endif; ?><?php echo '
function showHidePayPalExpressOption()
{
    if (document.getElementsByName("is_pay_later")[0].checked) {
	show("crm-submit-buttons");
	hide("paypalExpress");
    } else {
	show("paypalExpress");
	hide("crm-submit-buttons");
    }
}
'; ?>

</script>
<?php endif; ?>