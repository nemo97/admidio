<?php
/* Smarty version 4.4.1, created on 2024-04-10 16:59:07
  from '/var/www/bcaa.subhas.dev/public_html/adm_themes/simple/templates/modules/documents-files.list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_661727cbee8c34_96276622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fb1b031e4a4199787811104371a5dc5ac0d9f38' => 
    array (
      0 => '/var/www/bcaa.subhas.dev/public_html/adm_themes/simple/templates/modules/documents-files.list.tpl',
      1 => 1712782376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661727cbee8c34_96276622 (Smarty_Internal_Template $_smarty_tpl) {
if (strlen($_smarty_tpl->tpl_vars['infoAlert']->value) > 0) {?>
    <div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i><?php echo $_smarty_tpl->tpl_vars['infoAlert']->value;?>
</div>
<?php }?>

<div class="table-responsive">
    <table id="documents-files-table" class="table table-hover" width="100%" style="width: 100%;">
        <thead>
            <tr>
                <th><i class="fas fa-fw fa-folder-open" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FOLDER');?>
 / <?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FILE_TYPE');?>
"></i></th>
                <th><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_NAME');?>
</th>
                <th><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_DATE_MODIFIED');?>
</th>
                <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_SIZE');?>
</th>
                <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_COUNTER');?>
</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr id="row_<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
                    <td><a class="admidio-icon-link" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['row']->value['icon'];?>
" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"></i></a></td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</a>
                        <?php if (strlen($_smarty_tpl->tpl_vars['row']->value['description']) > 0) {?>
                            <i class="fas fa-info-circle admidio-info-icon" data-toggle="popover"
                                data-html="true" data-trigger="hover click" data-placement="auto"
                                title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_DESCRIPTION');?>
" data-content="<?php echo $_smarty_tpl->tpl_vars['row']->value['description'];?>
"></i>
                        <?php }?>
                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['timestamp'];?>
</td>
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
</td>
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['counter'];?>
</td>
                    <td class="text-right">
                        <?php if (array_key_exists('actions',$_smarty_tpl->tpl_vars['row']->value)) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value['actions'], 'actionItem');
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
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['row']->value['existsInFileSystem'] == false) {?>
                            <i class="fas fa-exclamation-triangle" style="color:red;" data-toggle="popover" data-trigger="hover click" data-placement="left"
                               title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_WARNING');?>
" data-content="<?php if ($_smarty_tpl->tpl_vars['row']->value['folder']) {
echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FOLDER_NOT_EXISTS');
} else {
echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FILE_NOT_EXIST_DELETE_FROM_DB');
}?>"></i>
                        <?php }?>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>

<?php if (count($_smarty_tpl->tpl_vars['unregisteredList']->value) > 0) {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_UNMANAGED_FILES');?>
</h2>
    <p class="lead admidio-max-with"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_ADDITIONAL_FILES');?>
</p>
    <div class="table-responsive">
        <table id="documents-files-unregistered-table" class="table table-hover" width="100%" style="width: 100%;">
            <thead>
            <tr>
                <th><i class="fas fa-fw fa-folder-open" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FOLDER');?>
 / <?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_FILE_TYPE');?>
"></i></th>
                <th><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_NAME');?>
</th>
                <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_SIZE');?>
</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['unregisteredList']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                <tr>
                    <td><i class="<?php echo $_smarty_tpl->tpl_vars['row']->value['icon'];?>
" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
"></i></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</td>
                    <td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['size'];?>
</td>
                    <td class="text-right">
                        <a class="admidio-icon-link" href="<?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
">
                            <i class="fas fa-plus-circle" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_ADD_TO_DATABASE');?>
"></i>
                        </a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
<?php }
}
}
