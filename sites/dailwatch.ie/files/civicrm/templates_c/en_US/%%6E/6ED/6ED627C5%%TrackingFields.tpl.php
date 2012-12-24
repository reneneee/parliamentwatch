<?php /* Smarty version 2.6.26, created on 2012-12-24 11:53:22
         compiled from CRM/common/TrackingFields.tpl */ ?>
<?php if ($this->_tpl_vars['trackingFields'] && ! empty ( $this->_tpl_vars['trackingFields'] )): ?>
<?php echo '
<script type="text/javascript">
cj(
   function( ) {
'; ?>

    <?php $_from = $this->_tpl_vars['trackingFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trackingFieldName'] => $this->_tpl_vars['dontCare']):
?>
       cj("#<?php echo $this->_tpl_vars['trackingFieldName']; ?>
").parent().parent().hide( );
    <?php endforeach; endif; unset($_from); ?>
<?php echo '
  }
);
</script>
'; ?>

<?php endif; ?>