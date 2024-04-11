<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:07:57
  from '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/card.information.button.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc52da58894_52445136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb25ad1b82d3ac3c7910a805771ea81635af65ff' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/card.information.button.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc52da58894_52445136 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="<?php echo $_smarty_tpl->tpl_vars['card']->value['id'];?>
" class="col-sm-6 col-lg-4 col-xl-3">
    <div class="card admidio-card">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['card']->value['title'];?>
</h5>
            <ul class="list-group list-group-flush">
                <?php if (array_key_exists('actions',$_smarty_tpl->tpl_vars['card']->value) && count($_smarty_tpl->tpl_vars['card']->value['actions']) > 0) {?>
                    <li class="list-group-item">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['card']->value['actions'], 'actionItem');
$_smarty_tpl->tpl_vars['actionItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['actionItem']->value) {
$_smarty_tpl->tpl_vars['actionItem']->do_else = false;
?>
                            <a <?php if ((isset($_smarty_tpl->tpl_vars['actionItem']->value['dataHref']))) {?> class="admidio-icon-link openPopup" href="javascript:void(0);" data-href="<?php echo $_smarty_tpl->tpl_vars['actionItem']->value['dataHref'];?>
"
                                    <?php } else { ?> class="admidio-icon-link" href="<?php echo $_smarty_tpl->tpl_vars['actionItem']->value['url'];?>
"<?php }?>>
                                <i class="<?php echo $_smarty_tpl->tpl_vars['actionItem']->value['icon'];?>
" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['actionItem']->value['tooltip'];?>
"></i></a>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </li>
                <?php }?>

                <?php if (array_key_exists('information',$_smarty_tpl->tpl_vars['card']->value) && count($_smarty_tpl->tpl_vars['card']->value['information']) > 0) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['card']->value['information'], 'informationItem');
$_smarty_tpl->tpl_vars['informationItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['informationItem']->value) {
$_smarty_tpl->tpl_vars['informationItem']->do_else = false;
?>
                        <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['informationItem']->value;?>
</li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
            </ul>
            <?php if (array_key_exists('buttons',$_smarty_tpl->tpl_vars['card']->value) && count($_smarty_tpl->tpl_vars['card']->value['buttons']) > 0) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['card']->value['buttons'], 'buttonItem');
$_smarty_tpl->tpl_vars['buttonItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['buttonItem']->value) {
$_smarty_tpl->tpl_vars['buttonItem']->do_else = false;
?>
                    <a class="btn btn-primary mt-auto" href="<?php echo $_smarty_tpl->tpl_vars['buttonItem']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['buttonItem']->value['name'];?>
</a>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        </div>
    </div>
</div>
<?php }
}
