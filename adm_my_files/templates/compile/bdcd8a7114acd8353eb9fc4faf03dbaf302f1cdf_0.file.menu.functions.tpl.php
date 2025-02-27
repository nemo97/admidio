<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/menu.functions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f41d8e56_78094768',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdcd8a7114acd8353eb9fc4faf03dbaf302f1cdf' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/sys-template-parts/menu.functions.tpl',
      1 => 1727412846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670f51f41d8e56_78094768 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="nav admidio-menu-function-node">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuFunctions']->value, 'menuItem');
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
?>
        <?php if (array_key_exists('items',$_smarty_tpl->tpl_vars['menuItem']->value)) {?>
            <li class="nav-item dropdown">
                <a id="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['id'];?>
" class="nav-link btn btn-secondary dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['icon'];?>
 fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['name'];?>

                </a>
                <div class="dropdown-menu dropdown-menu-left">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuItem']->value['items'], 'subItem');
$_smarty_tpl->tpl_vars['subItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['subItem']->value) {
$_smarty_tpl->tpl_vars['subItem']->do_else = false;
?>
                        <a id="<?php echo $_smarty_tpl->tpl_vars['subItem']->value['id'];?>
" class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['subItem']->value['url'];?>
">
                            <i class="<?php echo $_smarty_tpl->tpl_vars['subItem']->value['icon'];?>
 fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['subItem']->value['name'];?>

                        </a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </li>
        <?php } else { ?>
            <li class="nav-item">
                <a id="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['id'];?>
" class="nav-link btn btn-secondary" href="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['url'];?>
">
                    <i class="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['icon'];?>
 fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['name'];?>

                </a>
            </li>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>
<?php }
}
