<?php
/* Smarty version 4.4.1, created on 2024-04-03 22:51:33
  from '/var/www/html/admidio/adm_program/installation/templates/installation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc155e88913_66484424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d710b2ddee5b9b9a0132aa72ff508b527f11418' => 
    array (
      0 => '/var/www/html/admidio/adm_program/installation/templates/installation.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc155e88913_66484424 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="installation-dialog">
    <h3><?php echo $_smarty_tpl->tpl_vars['subHeadline']->value;?>
</h3>

    <p><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</p>

    <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
</div>
<?php }
}
