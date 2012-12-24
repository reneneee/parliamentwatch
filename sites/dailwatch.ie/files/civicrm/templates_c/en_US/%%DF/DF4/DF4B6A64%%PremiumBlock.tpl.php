<?php /* Smarty version 2.6.26, created on 2012-12-24 11:53:22
         compiled from CRM/Contribute/Form/Contribution/PremiumBlock.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contribute/Form/Contribution/PremiumBlock.tpl', 65, false),array('modifier', 'crmMoney', 'CRM/Contribute/Form/Contribution/PremiumBlock.tpl', 85, false),array('modifier', 'cat', 'CRM/Contribute/Form/Contribution/PremiumBlock.tpl', 88, false),)), $this); ?>
<?php if ($this->_tpl_vars['products']): ?>
<div id="premiums" class="premiums-group">
    <?php if ($this->_tpl_vars['context'] == 'makeContribution'): ?>

<?php echo '
<script type="text/javascript">
<!--
// Selects the product (radio button) if user selects an option for that product.
// Putting this function directly in template so they are available for standalone forms.
function selectPremium(optionField) {
    premiumId = optionField.name.slice(8);
    for( i=0; i < document.Main.elements.length; i++) {
        if (document.Main.elements[i].type == \'radio\' && document.Main.elements[i].name == \'selectProduct\' && document.Main.elements[i].value == premiumId ) {
            element = document.Main.elements[i];
            element.checked = true;
        }
    }
}
//-->
</script>
'; ?>


        <fieldset class="crm-group premiums_select-group">
        <?php if ($this->_tpl_vars['premiumBlock']['premiums_intro_title']): ?>
            <legend><?php echo $this->_tpl_vars['premiumBlock']['premiums_intro_title']; ?>
</legend>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['premiumBlock']['premiums_intro_text']): ?>
            <div id="premiums-intro" class="crm-section premiums_intro-section">
                <?php echo $this->_tpl_vars['premiumBlock']['premiums_intro_text']; ?>

            </div> 
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['context'] == 'confirmContribution' || $this->_tpl_vars['context'] == 'thankContribution'): ?>
    <div class="crm-group premium_display-group">
        <div class="header-dark">
            <?php if ($this->_tpl_vars['premiumBlock']['premiums_intro_title']): ?>
                <?php echo $this->_tpl_vars['premiumBlock']['premiums_intro_title']; ?>

            <?php else: ?>
                <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your Premium Selection<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['preview']): ?>
        <?php $this->assign('showSelectOptions', '1'); ?>
    <?php endif; ?>
    <?php echo '<table id="premiums-listings">'; ?><?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?><?php echo '<tr '; ?><?php if ($this->_tpl_vars['context'] == 'makeContribution'): ?><?php echo 'class="odd-row" '; ?><?php endif; ?><?php echo 'valign="top">'; ?><?php if ($this->_tpl_vars['showRadioPremium']): ?><?php echo ''; ?><?php $this->assign('pid', $this->_tpl_vars['row']['id']); ?><?php echo '<td>'; ?><?php echo $this->_tpl_vars['form']['selectProduct'][$this->_tpl_vars['pid']]['html']; ?><?php echo '</td>'; ?><?php endif; ?><?php echo '<td>'; ?><?php if ($this->_tpl_vars['row']['thumbnail']): ?><?php echo '<a href="javascript:popUp(\''; ?><?php echo $this->_tpl_vars['row']['image']; ?><?php echo '\')" ><img src="'; ?><?php echo $this->_tpl_vars['row']['thumbnail']; ?><?php echo '" alt="'; ?><?php echo $this->_tpl_vars['row']['name']; ?><?php echo '" class="no-border" /></a>'; ?><?php endif; ?><?php echo '</td><td><strong>'; ?><?php echo $this->_tpl_vars['row']['name']; ?><?php echo '</strong><br />'; ?><?php echo $this->_tpl_vars['row']['description']; ?><?php echo ' &nbsp;'; ?><?php if (( ( $this->_tpl_vars['premiumBlock']['premiums_display_min_contribution'] && $this->_tpl_vars['context'] == 'makeContribution' ) || $this->_tpl_vars['preview'] == 1 ) && $this->_tpl_vars['row']['min_contribution'] > 0): ?><?php echo ''; ?><?php $this->_tag_stack[] = array('ts', array('1' => ((is_array($_tmp=$this->_tpl_vars['row']['min_contribution'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)))); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '(Contribute at least %1 to be eligible for this gift.)'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['showSelectOptions']): ?><?php echo ''; ?><?php $this->assign('pid', ((is_array($_tmp='options_')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['row']['id']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['row']['id']))); ?><?php echo ''; ?><?php if ($this->_tpl_vars['pid']): ?><?php echo '<div id="product-options"><p>'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['pid']]['html']; ?><?php echo '</p></div>'; ?><?php endif; ?><?php echo ''; ?><?php else: ?><?php echo '<div id="product-options"><p><strong>'; ?><?php echo $this->_tpl_vars['row']['options']; ?><?php echo '</strong></p></div>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['context'] == 'thankContribution' && $this->_tpl_vars['is_deductible'] && $this->_tpl_vars['row']['price']): ?><?php echo '<div id="premium-tax-disclaimer"><p>'; ?><?php $this->_tag_stack[] = array('ts', array('1' => ((is_array($_tmp=$this->_tpl_vars['row']['price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)))); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</p></div>'; ?><?php endif; ?><?php echo '</td></tr>'; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php if ($this->_tpl_vars['showRadioPremium'] && ! $this->_tpl_vars['preview']): ?><?php echo '<tr class="odd-row"><td colspan="4">'; ?><?php echo $this->_tpl_vars['form']['selectProduct']['no_thanks']['html']; ?><?php echo '</td></tr>'; ?><?php endif; ?><?php echo '</table>'; ?>

    <?php if ($this->_tpl_vars['context'] == 'makeContribution'): ?>
        </fieldset>
    <?php elseif (! $this->_tpl_vars['preview']): ?>         </div>
    <?php endif; ?>
</div>
<?php endif; ?>
