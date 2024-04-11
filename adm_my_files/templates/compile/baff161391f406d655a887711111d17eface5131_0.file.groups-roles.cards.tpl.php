<?php
/* Smarty version 4.4.1, created on 2024-04-10 16:59:06
  from '/var/www/bcaa.subhas.dev/public_html/adm_themes/simple/templates/modules/groups-roles.cards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_661727ca5b9611_63483583',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baff161391f406d655a887711111d17eface5131' => 
    array (
      0 => '/var/www/bcaa.subhas.dev/public_html/adm_themes/simple/templates/modules/groups-roles.cards.tpl',
      1 => 1712782376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sys-template-parts/card.information.button.tpl' => 1,
  ),
),false)) {
function content_661727ca5b9611_63483583 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('category', $_smarty_tpl->tpl_vars['cards']->value[0]['category']);?>
<h2><?php echo $_smarty_tpl->tpl_vars['cards']->value[0]['category'];?>
</h2>
<div class="row admidio-margin-bottom">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cards']->value, 'card');
$_smarty_tpl->tpl_vars['card']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['card']->value) {
$_smarty_tpl->tpl_vars['card']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['category']->value != $_smarty_tpl->tpl_vars['card']->value['category']) {?>
            </div>
            <h2><?php echo $_smarty_tpl->tpl_vars['card']->value['category'];?>
</h2>
            <div class="row admidio-margin-bottom">
            <?php $_smarty_tpl->_assignInScope('category', $_smarty_tpl->tpl_vars['card']->value['category']);?>
        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/card.information.button.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
