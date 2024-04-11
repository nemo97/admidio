<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:11:39
  from '/var/www/html/admidio/adm_themes/simple/templates/message_modal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc60b4c9f93_30996260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd35e1e1bac3910b87326de03a9dd500b1f45539d' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/message_modal.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660dc60b4c9f93_30996260 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal-header">
    <h3 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['messageHeadline']->value;?>
</h3>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div>

<div class="modal-footer">
    <?php if ($_smarty_tpl->tpl_vars['url']->value != '') {?>
        <?php if ($_smarty_tpl->tpl_vars['showYesNoButtons']->value) {?>
            <button id="admButtonYes" class="btn btn-primary" type="button" onclick="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
                <i class="fas fa-check-circle"></i>
                &nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_YES");?>
&nbsp;&nbsp;&nbsp;
            </button>
            <button id="admButtonNo" class="btn btn-secondary" type="button" data-dismiss="modal">
                <i class="fas fa-minus-circle"></i>
                &nbsp;<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_NO");?>

            </button>
        <?php } else { ?>
                        <button class="btn btn-primary admidio-margin-bottom" onclick="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get("SYS_NEXT");?>

                <i class="fas fa-arrow-circle-right"></i>
            </button>
        <?php }?>
        <div id="status-message" class="mt-4 w-100"></div>
    <?php }?>
</div>
<?php }
}
