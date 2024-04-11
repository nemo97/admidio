<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:00:31
  from '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/form.captcha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc36fb6da10_42705842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74d25daf1ae9c9dfcbd3ce68dbbc7390ad9b37b2' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/sys-template-parts/form.captcha.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc36fb6da10_42705842 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="captcha_puzzle_group" class="form-group captcha row">
    <div class="offset-sm-3 col-sm-9">
        <img id="captcha"
            src="<?php echo $_smarty_tpl->tpl_vars['ADMIDIO_URL']->value;
echo $_smarty_tpl->tpl_vars['FOLDER_LIBS_SERVER']->value;?>
/dapphp/securimage/securimage_show.php"
            alt="CAPTCHA Image" />
        <a class="admidio-icon-link" href="javascript:void(0)"
            onclick="document.getElementById('captcha').src='<?php echo $_smarty_tpl->tpl_vars['ADMIDIO_URL']->value;
echo $_smarty_tpl->tpl_vars['FOLDER_LIBS_SERVER']->value;?>
/dapphp/securimage/securimage_show.php?'
            + Math.random(); return false;">
            <i class="fas fa-sync-alt fa-lg" data-toggle="tooltip"
                title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_RELOAD');?>
"></i>
        </a>
    </div>
</div><?php }
}
