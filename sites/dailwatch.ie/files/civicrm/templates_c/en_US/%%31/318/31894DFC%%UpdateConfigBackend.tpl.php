<?php /* Smarty version 2.6.26, created on 2012-12-24 11:49:59
         compiled from CRM/Admin/Form/Setting/UpdateConfigBackend.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Admin/Form/Setting/UpdateConfigBackend.tpl', 29, false),array('modifier', 'crmReplace', 'CRM/Admin/Form/Setting/UpdateConfigBackend.tpl', 41, false),)), $this); ?>
<div class="crm-block crm-form-block crm-config-backend-form-block">
<div id="help">
    <p>
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Use this form if you need to reset the Base Directory Path and Base URL settings for your CiviCRM installation. These settings are stored in the database, and generally need adjusting after moving a CiviCRM installation to another location in the file system and/or to another URL.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
    <p>
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>CiviCRM will attempt to detect the new values that should be used. These are provided below as the default values for the <strong>New Base Directory</strong> and <strong>New Base URL</strong> fields.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
</div>  
        <div><?php echo $this->_tpl_vars['form']['_qf_UpdateConfigBackend_next_cleanup']['html']; ?>
</div>  
        <table>
            <tr class="crm-config-backend-form-block-oldBaseDir">
                <td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Old Base Directory<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                <td><?php echo $this->_tpl_vars['oldBaseDir']; ?>
</td>
            </tr>
            <tr class="crm-config-backend-form-block-newBaseDir">
                <td class="label"><?php echo $this->_tpl_vars['form']['newBaseDir']['label']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['newBaseDir']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'huge') : smarty_modifier_crmReplace($_tmp, 'class', 'huge')); ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>For Drupal installs, this is the absolute path to the location of the 'files' directory. For Joomla installs this is the absolute path to the location of the 'media' directory.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
            <tr class="crm-config-backend-form-block-oldBaseURL">
                <td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Old Base URL<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                <td><?php echo $this->_tpl_vars['oldBaseURL']; ?>
</td>
            </tr>
            <tr class="crm-config-backend-form-block-newBaseURL">
                <td class="label"><?php echo $this->_tpl_vars['form']['newBaseURL']['label']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['newBaseURL']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'huge') : smarty_modifier_crmReplace($_tmp, 'class', 'huge')); ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This is the URL for your Drupal or Joomla site URL (e.g. http://www.mysite.com/drupal/).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
<?php if ($this->_tpl_vars['oldSiteName']): ?>
            <tr class="crm-config-backend-form-block-oldSiteName">
                <td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Old Site Name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td>
                <td><?php echo $this->_tpl_vars['oldSiteName']; ?>
</td>
            </tr>
            <tr class="crm-config-backend-form-block-newSiteName">
                <td class="label"><?php echo $this->_tpl_vars['form']['newSiteName']['label']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['newSiteName']['html'])) ? $this->_run_mod_handler('crmReplace', true, $_tmp, 'class', 'huge') : smarty_modifier_crmReplace($_tmp, 'class', 'huge')); ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This is the your site name for a multisite install.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
<?php endif; ?>  
        </table>
        <div><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<div class="spacer"></div>
</div>