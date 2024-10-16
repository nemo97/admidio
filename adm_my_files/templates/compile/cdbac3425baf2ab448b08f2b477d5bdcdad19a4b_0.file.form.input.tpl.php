<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/form.input.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f41fb014_54533637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cdbac3425baf2ab448b08f2b477d5bdcdad19a4b' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/form.input.tpl',
      1 => 1727412846,
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
function content_670f51f41fb014_54533637 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['data']->value['property'] == 4) {?>
<input
    type="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"
    name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
    id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
    value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_5_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
    <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
    <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>>
<?php } else { ?>
<div
    id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_group"
    class="form-group <?php if ($_smarty_tpl->tpl_vars['data']->value['formtype'] != 'vertical' && $_smarty_tpl->tpl_vars['data']->value['formtype'] != 'navbar') {?>row<?php }?> <?php if ($_smarty_tpl->tpl_vars['property']->value == 1) {?>admidio-form-group-required<?php }?>">
    <label for="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['data']->value['formtype'] != 'vertical' && $_smarty_tpl->tpl_vars['data']->value['formtype'] != 'navbar') {?>col-sm-3<?php }?> control-label">
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.icon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php echo $_smarty_tpl->tpl_vars['label']->value;?>

        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.iconhelp.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </label>
    <div class="<?php if ($_smarty_tpl->tpl_vars['data']->value['formtype'] != 'vertical' && $_smarty_tpl->tpl_vars['data']->value['formtype'] != 'navbar') {?>col-sm-9<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'datetime') {?>
            <input
            type="date"
            name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            value="<?php echo $_smarty_tpl->tpl_vars['data']->value['attributes']['dateValue'];?>
"
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes']['dateValueAttributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_6_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
            <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
            <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            >
            <input
            type="time"
            name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_time"
            id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_time"
            value="<?php echo $_smarty_tpl->tpl_vars['data']->value['attributes']['timeValue'];?>
"
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes']['timeValueAttributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_7_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
            <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
            <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_7_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            >
            <?php echo $_smarty_tpl->tpl_vars['htmlAfter']->value;?>

        <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'date') {?>
            <input
            type="date"
            name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_8_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
            <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
            <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_8_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            >
            <?php echo $_smarty_tpl->tpl_vars['htmlAfter']->value;?>

        <?php } elseif ($_smarty_tpl->tpl_vars['type']->value == 'password') {?>
            <input
            type="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"
            name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_9_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
            <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
            <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_9_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            >
            <?php if ($_smarty_tpl->tpl_vars['data']->value['passwordStrength'] == 1) {?>
            <div id="admidio-password-strength" class="progress <?php echo $_smarty_tpl->tpl_vars['data']->value['attributes']['class'];?>
">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                <div id="admidio-password-strength-minimum"></div>
            </div>
            <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['htmlAfter']->value;?>

        <?php } else { ?>
        <input
            type="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
"
            name="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"
            value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['attributes'], 'itemvar');
$_smarty_tpl->tpl_vars['itemvar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemvar']->key => $_smarty_tpl->tpl_vars['itemvar']->value) {
$_smarty_tpl->tpl_vars['itemvar']->do_else = false;
$__foreach_itemvar_10_saved = $_smarty_tpl->tpl_vars['itemvar'];
?>
            <?php echo $_smarty_tpl->tpl_vars['itemvar']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['itemvar']->value;?>
"
            <?php
$_smarty_tpl->tpl_vars['itemvar'] = $__foreach_itemvar_10_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            >
            <?php echo $_smarty_tpl->tpl_vars['htmlAfter']->value;?>

        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.helptext.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/parts/form.part.warning.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<?php }
}
}
