<?php /* Smarty version 2.6.26, created on 2012-12-24 12:36:13
         compiled from CRM/common/buildProfileLink.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'crmURL', 'CRM/common/buildProfileLink.tpl', 5, false),array('block', 'ts', 'CRM/common/buildProfileLink.tpl', 7, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
    function buildLinks( element, profileId ) {
      if ( profileId >= 1 ) {
        var ufFieldUrl = '; ?>
"<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/admin/uf/group/field','q' => 'reset=1&action=browse&gid=','h' => 0), $this);?>
"<?php echo ';
        ufFieldUrl = ufFieldUrl + profileId;
        var editTitle = '; ?>
"<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>edit profile<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"<?php echo ';
        element.parent().find(\'span.profile-links\').html(\'<a href="\' + ufFieldUrl +\'" target="_blank" title="\'+ editTitle+\'">\'+ editTitle+\'</a>\');
      } else {
        element.parent().find(\'span.profile-links\').html(\'\');
      }
    }
</script>
'; ?>
