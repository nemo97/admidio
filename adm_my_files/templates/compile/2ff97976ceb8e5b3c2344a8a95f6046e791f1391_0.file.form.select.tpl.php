<?php
/* Smarty version 4.4.1, created on 2024-04-10 16:58:35
  from '/var/www/bcaa.subhas.dev/public_html/adm_themes/simple/templates/sys-template-parts/form.select.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_661727abb68b96_57201064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ff97976ceb8e5b3c2344a8a95f6046e791f1391' => 
    array (
      0 => '/var/www/bcaa.subhas.dev/public_html/adm_themes/simple/templates/sys-template-parts/form.select.tpl',
      1 => 1712782376,
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
function content_661727abb68b96_57201064 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_group" class="form-group <?php if ($_smarty_tpl->tpl_vars['data']->value['formtype'] != 'vertical' && $_smarty_tpl->tpl_vars['data']->value['formtype'] != 'navbar') {?>row<?php }?> <?php if ($_smarty_tpl->tpl_vars['property']->value == 1) {?>admidio-form-group-required<?php }?>">
    <label for="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['data']->value['formtype'] != 'vertical' && $_smarty_tpl->tpl_vars['data']->value['formtype'] != 'navbar') {?>col-sm-3<?php }?> control-label">
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.icon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php echo $_smarty_tpl->tpl_vars['label']->value;?>

        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.iconhelp.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </label>
    <div class="<?php if ($_smarty_tpl->tpl_vars['data']->value['formtype'] != 'vertical' && $_smarty_tpl->tpl_vars['data']->value['formtype'] != 'navbar') {?>col-sm-9<?php }?>">
        <select <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_0_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
            <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
" <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>>
            <?php $_smarty_tpl->_assignInScope('group', '');?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['values']->value, 'optionvar');
$_smarty_tpl->tpl_vars['optionvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['optionvar']->value) {
$_smarty_tpl->tpl_vars['optionvar']->do_else = false;
?>
                <?php if (array_key_exists("group",$_smarty_tpl->tpl_vars['optionvar']->value) && $_smarty_tpl->tpl_vars['optionvar']->value["group"] != $_smarty_tpl->tpl_vars['group']->value) {?>
                    <?php if ($_smarty_tpl->tpl_vars['group']->value != '') {?></optgroup><?php }?>
                    <optgroup label="<?php echo $_smarty_tpl->tpl_vars['optionvar']->value["group"];?>
">
                    <?php $_smarty_tpl->_assignInScope('group', ((string)$_smarty_tpl->tpl_vars['optionvar']->value["group"]));?>
                <?php }?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['optionvar']->value["id"];?>
" <?php if ($_smarty_tpl->tpl_vars['defaultValue']->value == $_smarty_tpl->tpl_vars['optionvar']->value["id"]) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['optionvar']->value["value"];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['group']->value != '') {?></optgroup><?php }?>
        </select>

        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.helptext.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.warning.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<?php }
}
