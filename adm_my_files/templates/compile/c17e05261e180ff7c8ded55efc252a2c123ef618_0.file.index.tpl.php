<?php
/* Smarty version 4.4.1, created on 2024-04-03 22:51:33
  from '/var/www/html/admidio/adm_program/installation/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc155e86254_23338492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c17e05261e180ff7c8ded55efc252a2c123ef618' => 
    array (
      0 => '/var/www/html/admidio/adm_program/installation/templates/index.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:js_css_files.tpl' => 1,
  ),
),false)) {
function content_660dc155e86254_23338492 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author"   content="Admidio Team" />
    <meta name="robots"   content="noindex" />

    <!-- (c) 2004 - 2023 The Admidio Team - https://www.admidio.org -->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/logo/favicon.ico" />
    <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/logo/admidio_logo_32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/logo/admidio_logo_16.png" sizes="16x16" />
    <link rel="apple-touch-icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/logo/apple-touch-icon.png" sizes="180x180" />

    <title>Admidio - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    <?php $_smarty_tpl->_subTemplateRender("file:js_css_files.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php echo $_smarty_tpl->tpl_vars['additionalHeaderData']->value;?>


    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/installation/templates/installation.css" />

    <?php echo '<script'; ?>
 type="text/javascript">
        <?php echo $_smarty_tpl->tpl_vars['javascriptContent']->value;?>


        $(function() {
            $("[data-toggle=popover]").popover();
            <?php echo $_smarty_tpl->tpl_vars['javascriptContentExecuteAtPageLoad']->value;?>

        });
    <?php echo '</script'; ?>
>
</head>
<body id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="admidio">
    <div id="installation-header" class="admidio-area">
        <div class="admidio-container container">
            <img id="admidio-logo" src="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/logo/admidio_writing_white_150.png" alt="Logo" />
            <span id="installation-headline"><?php echo $_smarty_tpl->tpl_vars['headline']->value;?>
</span>
        </div>
    </div>
    <div id="installation-body" class="admidio-area">
        <div class="admidio-container container">
            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['templateFile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <div id="imprint">Powered by <a href="https://www.admidio.org">Admidio</a> &copy; Admidio Team
                <?php if ($_smarty_tpl->tpl_vars['urlImprint']->value != '') {?>
                    &nbsp;&nbsp;-&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlImprint']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_IMPRINT');?>
</a>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['urlDataProtection']->value != '') {?>
                    &nbsp;&nbsp;-&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['urlDataProtection']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_DATA_PROTECTION');?>
</a>
                <?php }?>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}
