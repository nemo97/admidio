<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/form.button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f42274b7_80715986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cad23dbe32323a0191d36ecef3ae2612fb852466' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/form.button.tpl',
      1 => 1727412846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sys-template-parts/parts/form.part.icon.tpl' => 1,
  ),
),false)) {
function content_670f51f42274b7_80715986 (Smarty_Internal_Template $_smarty_tpl) {
?><button
    id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
    name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?>onclick="self.location.href='<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
'" <?php }?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_12_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
        <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
    <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_12_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
>
<?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.icon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo $_smarty_tpl->tpl_vars['value']->value;?>

</button>



<?php }
}
