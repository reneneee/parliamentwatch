<?php /* Smarty version 2.6.26, created on 2012-12-24 12:36:13
         compiled from CRM/Contribute/Form/ContributionPage/Custom.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contribute/Form/ContributionPage/Custom.tpl', 28, false),array('function', 'crmURL', 'CRM/Contribute/Form/ContributionPage/Custom.tpl', 30, false),array('function', 'docURL', 'CRM/Contribute/Form/ContributionPage/Custom.tpl', 33, false),array('function', 'help', 'CRM/Contribute/Form/ContributionPage/Custom.tpl', 46, false),)), $this); ?>
<div class="crm-block crm-form-block crm-contribution-contributionpage-custom-form-block">
<div id="help">
    <p><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You may want to collect information from contributors beyond what is required to make a contribution. For example, you may want to inquire about volunteer availability and skills. Add any number of fields to your contribution form by selecting CiviCRM Profiles (collections of fields) to include at the beginning of the page, and/or at the bottom.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>

        <?php ob_start(); ?><?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/admin/uf/group','q' => "reset=1&action=browse"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('crmURL', ob_get_contents());ob_end_clean(); ?>
    <?php if ($this->_tpl_vars['noProfile']): ?> 
        <div class="status message"> 
            <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['crmURL'],'2' => 'Profile')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No Profile(s) have been configured / enabled for your site. You need to first configure <a href="%1"><strong>&raquo; %2</a>(s).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo smarty_function_docURL(array('page' => 'Profiles Admin'), $this);?>

        </div>
    <?php else: ?>
        <p><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['crmURL'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can use existing CiviCRM Profiles on your page - OR create profile(s) specifically for use in Online Contribution pages. Go to <a href='%1'>Administer CiviCRM Profiles</a> if you need to review, modify or create profiles (you can come back at any time to select or update the Profile(s) used for this page).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
    <?php endif; ?>
</div>
<?php if (! $this->_tpl_vars['noProfile']): ?> 
<div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
    <table class="form-layout-compressed">
    <tr class="crm-contribution-contributionpage-custom-form-block-custom_pre_id">
       <td class="label"><?php echo $this->_tpl_vars['form']['custom_pre_id']['label']; ?>

       </td>
       <td class="html-adjust"><?php echo $this->_tpl_vars['form']['custom_pre_id']['html']; ?>
&nbsp;<span class="profile-links"></span><br />
          <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Include additional fields in this online contribution page by configuring and selecting a CiviCRM Profile to be included above the billing information (but after the introductory message, amounts, and honoree section).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo smarty_function_help(array('id' => "contrib-profile"), $this);?>
</span>
          </td>
    </tr>
    <tr class="crm-contribution-contributionpage-custom-form-block-custom_post_id">
       <td class="label"><?php echo $this->_tpl_vars['form']['custom_post_id']['label']; ?>

       </td>
       <td class="html-adjust"><?php echo $this->_tpl_vars['form']['custom_post_id']['html']; ?>
&nbsp;<span class="profile-links"></span><br/>
          <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Include additional fields in this online contribution page by configuring and selecting a CiviCRM Profile to be included at the bottom of the page.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
       </td>
    </tr>
    <tr class='crm-contribution-contributionpage-custom-form--block-create-new-profile'>
        <td class="label"></td>
        <td><a href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/admin/uf/group/add','q' => 'reset=1&action=add'), $this);?>
" target="_blank"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Click here for new profile<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
    </tr>
</table>
<?php endif; ?>
<div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/buildProfileLink.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
    //show edit profile field links
    cj(function() {
        // show edit for profile
        cj(\'select[id^="custom_p"]\').change( function( ) {
            buildLinks( cj(this), cj(this).val());
        });
        
        // make sure we set edit links for profile when form loads
        cj(\'select[id^="custom_p"]\').each( function(e) {
            buildLinks( cj(this), cj(this).val()); 
        });
    });
</script>
'; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formNavigate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>