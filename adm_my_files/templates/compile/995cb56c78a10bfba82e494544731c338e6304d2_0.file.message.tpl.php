<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:15:04
  from '/var/www/html/admidio/adm_themes/simple/templates/message.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc6d80e3887_94038490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '995cb56c78a10bfba82e494544731c338e6304d2' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/message.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc6d80e3887_94038490 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="message admidio-max-with">
    <p class="lead"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>

    <?php if ($_smarty_tpl->tpl_vars['url']->value != '') {?>
        <?php if ($_smarty_tpl->tpl_vars['showYesNoButtons']->value) {?>
            <button id="admButtonYes" class="btn btn-primary" type="button" onclick="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                <i class="fas fa-check-circle"></i>
                &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_YES");?>
&nbsp;&nbsp;&nbsp;
            </button>
            <button id="admButtonNo" class="btn btn-secondary" type="button" onclick="history.back()">
                <i class="fas fa-minus-circle"></i>
                &nbsp;<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_NO");?>

            </button>
        <?php } else { ?>
                        <button class="btn btn-primary admidio-margin-bottom" onclick="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_NEXT");?>

                <i class="fas fa-arrow-circle-right"></i>
            </button>
        <?php }?>
    <?php } else { ?>
                <button class="btn btn-primary admidio-margin-bottom" onclick="history.back()">
            <i class="fas fa-arrow-circle-left"></i>
            <?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_BACK");?>

        </button>
    <?php }?>
</div>
<?php }
}
