<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:00:14
  from '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/menu.main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc35ea8b060_61477569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32e8fc019012d172a0f09b528502cb058d752812' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/menu.main.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc35ea8b060_61477569 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="admidio-headline-mobile-menu d-md-none p-2">
    <span class="text-uppercase"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_MENU');?>
</span>
    <button class="btn btn-link d-md-none collapsed float-right" type="button" data-toggle="collapse"
            data-target="#admidio-main-menu" aria-controls="admidio-main-menu" aria-expanded="false">
        <i class="fas fa-bars fa-fw"></i>
    </button>
</div>
<nav class="admidio-menu-list collapse" id="admidio-main-menu">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuNavigation']->value, 'menuGroup');
$_smarty_tpl->tpl_vars['menuGroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuGroup']->value) {
$_smarty_tpl->tpl_vars['menuGroup']->do_else = false;
?>
        <div class="admidio-menu-header"><?php echo $_smarty_tpl->tpl_vars['menuGroup']->value['name'];?>
</div>
        <ul class="nav admidio-menu-node flex-column mb-0">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuGroup']->value['items'], 'menuItem');
$_smarty_tpl->tpl_vars['menuItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menuItem']->value) {
$_smarty_tpl->tpl_vars['menuItem']->do_else = false;
?>
                <li class="nav-item">
                    <a id="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['id'];?>
" class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['url'];?>
">
                        <i class="<?php echo $_smarty_tpl->tpl_vars['menuItem']->value['icon'];?>
 fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['name'];?>

                        <?php if ($_smarty_tpl->tpl_vars['menuItem']->value['badgeCount'] > 0) {?>
                            <span class="badge badge-light"><?php echo $_smarty_tpl->tpl_vars['menuItem']->value['badgeCount'];?>
</span>
                        <?php }?>
                    </a>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</nav>
<?php }
}
