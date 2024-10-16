<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/parts/form.part.icon.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f4206b41_91582440',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '216b64110fbe54ee84948f91955026a93854b1b5' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/parts/form.part.icon.tpl',
      1 => 1727412846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670f51f4206b41_91582440 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['icon']->value) {?>
    <?php if (Image::isFontAwesomeIcon($_smarty_tpl->tpl_vars['icon']->value)) {?>
        <i class="<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
 fas" <?php if ((isset($_smarty_tpl->tpl_vars['label']->value))) {?>data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['label']->value;?>
"<?php }?>></i>
    <?php } else { ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['label']->value))) {?>alt="<?php echo $_smarty_tpl->tpl_vars['label']->value;?>
"<?php }?> />
    <?php }
}
}
}
