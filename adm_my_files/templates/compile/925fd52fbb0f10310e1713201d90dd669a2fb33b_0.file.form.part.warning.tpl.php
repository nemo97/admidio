<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/parts/form.part.warning.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f42148a0_02569805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '925fd52fbb0f10310e1713201d90dd669a2fb33b' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/parts/form.part.warning.tpl',
      1 => 1727412846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670f51f42148a0_02569805 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['alertWarning']->value) {?>
    <div class="alert alert-warning mt-3" role="alert">
        <i class="fas fa-exclamation-triangle"></i><?php echo $_smarty_tpl->tpl_vars['alertWarning']->value;?>

    </div>
<?php }
}
}
