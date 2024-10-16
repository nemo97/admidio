<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/cookie_note.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f41b3517_73071026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '908011ce81bc02c6195d115e3e4b9acd0f39cb74' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/cookie_note.tpl',
      1 => 1727412846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670f51f41b3517_73071026 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/libs/client/cookieconsent/cookieconsent.min.css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/libs/client/cookieconsent/cookieconsent.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "cookie": {
                "name": "<?php echo $_smarty_tpl->tpl_vars['cookiePrefix']->value;?>
_cookieconsent_status",
                "domain": "<?php echo $_smarty_tpl->tpl_vars['cookieDomain']->value;?>
",
                "path": "<?php echo $_smarty_tpl->tpl_vars['cookiePath']->value;?>
"
            },
            "content": {
                "message": "<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_COOKIE_DESC');?>
",
                "dismiss": "<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_OK');?>
",
                <?php echo $_smarty_tpl->tpl_vars['cookieDataProtectionUrl']->value;?>

                "link": "<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FURTHER_INFORMATIONS');?>
"
            },
            "position": "bottom",
            "theme": "classic",
            "palette": {
                "popup": {
                    "background": "#252e39"
                },
                "button": {
                    "background": "#409099"
                }
            }
        });
    });
<?php echo '</script'; ?>
>
<?php }
}
