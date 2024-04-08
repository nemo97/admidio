<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:15:59
  from '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/form.editor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc70fb5d442_17559149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb6aa18352ec9925a14bf8776aa8a27cce26e58f' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/form.editor.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sys-template-parts/parts/form.part.icon.tpl' => 1,
    'file:sys-template-parts/parts/form.part.iconhelp.tpl' => 1,
    'file:sys-template-parts/parts/form.part.helptext.tpl' => 1,
    'file:sys-template-parts/parts/form.part.warning.tpl' => 1,
  ),
),false)) {
function content_660dc70fb5d442_17559149 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_group" class="form-group form-group-editor">
    <label for="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="control-label">
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.icon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php echo $_smarty_tpl->tpl_vars['label']->value;?>

        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.iconhelp.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </label>
  <div <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_0_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
  <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
  <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>>
    <textarea id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" style="width: 100%"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</textarea>
  </div>
  
  <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.helptext.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.warning.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
