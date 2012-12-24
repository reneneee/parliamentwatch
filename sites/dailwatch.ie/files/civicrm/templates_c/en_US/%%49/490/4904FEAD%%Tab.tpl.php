<?php /* Smarty version 2.6.26, created on 2012-12-24 12:32:55
         compiled from CRM/Contribute/Form/ContributionPage/Tab.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'CRM/Contribute/Form/ContributionPage/Tab.tpl', 31, false),array('function', 'crmURL', 'CRM/Contribute/Form/ContributionPage/Tab.tpl', 36, false),array('function', 'help', 'CRM/Contribute/Form/ContributionPage/Tab.tpl', 44, false),)), $this); ?>
<div class="crm-actions-ribbon crm-contribpage-tab-actions-ribbon">
   <ul id="actions">
    	<li><div id="crm-contribpage-links-wrapper">
    	      <div id="crm-contribpage-links-link">
                <span><div class="icon dropdown-icon"></div><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Links<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
              </div>
    	        <div class="ac_results" id="crm-contribpage-links-list">
    	      	   <div class="crm-contribpage-links-list-inner">
    	      	   	<ul>
                            <li><a class="crm-contribpage-contribution" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contribute/add','q' => "reset=1&action=add&context=standalone"), $this);?>
"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>New Contribution<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></li>
                            <li><a class="crm-contribution-test" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contribute/transact','q' => "reset=1&action=preview&id=".($this->_tpl_vars['contributionPageID'])), $this);?>
"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Online Contribution (Test-drive)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></li>
                            <li><a class="crm-contribution-live" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contribute/transact','q' => "reset=1&id=".($this->_tpl_vars['contributionPageID'])), $this);?>
" target="_blank"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Online Contribution (Live)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a></li>
    		        </ul>
    	           </div>
    	      </div>
        </div></li>
        <div>
              <?php echo smarty_function_help(array('id' => "id-configure-contrib-pages"), $this);?>

        </div>
  </ul>
  <div class="clear"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/TabHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script>

cj(\'body\').click(function() {
	cj(\'#crm-contribpage-links-list\').hide();
	});

cj(\'#crm-contribpage-links-link\').click(function(event) {
	cj(\'#crm-contribpage-links-list\').toggle();
	event.stopPropagation();
	});

</script>
'; ?>