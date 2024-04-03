<?php
/* Smarty version 4.4.1, created on 2024-04-03 14:00:14
  from '/var/www/html/admidio/adm_themes/simple/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_660dc35ea7e361_62218649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd06af65c808e5ecfd88e3c7d213de7e9ea570b3e' => 
    array (
      0 => '/var/www/html/admidio/adm_themes/simple/templates/index.tpl',
      1 => 1712167162,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:js_css_files.tpl' => 1,
    'file:cookie_note.tpl' => 1,
    'file:sys-template-parts/menu.main.tpl' => 1,
    'file:sys-template-parts/menu.functions.tpl' => 1,
  ),
),false)) {
function content_660dc35ea7e361_62218649 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- (c) The Admidio Team - https://www.admidio.org -->

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['urlTheme']->value;?>
/images/favicon.ico" />
    <link rel="apple-touch-icon" type="image/png" href="<?php echo $_smarty_tpl->tpl_vars['urlTheme']->value;?>
/images/apple-touch-icon.png" sizes="180x180" />

    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    <?php $_smarty_tpl->_subTemplateRender("file:js_css_files.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php echo $_smarty_tpl->tpl_vars['additionalHeaderData']->value;?>


    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['urlTheme']->value;?>
/css/admidio.css" />

    <?php echo '<script'; ?>
 type="text/javascript">
        var gRootPath  = "<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
";
        var gThemePath = "<?php echo $_smarty_tpl->tpl_vars['urlTheme']->value;?>
";

        <?php echo $_smarty_tpl->tpl_vars['javascriptContent']->value;?>


        // add javascript code to page that will be executed after page is fully loaded
        $(function() {
            $("[data-toggle=popover]").popover();
            $("[data-toggle=tooltip]").tooltip();

            // Sidebar toggle behavior
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });

            <?php echo $_smarty_tpl->tpl_vars['javascriptContentExecuteAtPageLoad']->value;?>


            // function to handle modal window and load data from url
            $(document).on('click', '.openPopup', function (){
                $('.modal-dialog').attr('class', 'modal-dialog ' + $(this).attr('data-class'));
                $('.modal-content').load($(this).attr('data-href'),function(){
                    $('#admidio-modal').modal({
                        show:true
                    });
                });
            });

            // remove data from modal if modal is closed
            $("body").on("hidden.bs.modal", ".modal", function() {
                $(this).removeData("bs.modal");
            });
        });
    <?php echo '</script'; ?>
>

        <?php if ($_smarty_tpl->tpl_vars['cookieNote']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender("file:cookie_note.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>
</head>
<body id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="admidio">
    <div id="admidio-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">Test</div>
        </div>
    </div>

    <nav class="navbar fixed-top navbar-light navbar-expand flex-column flex-md-row bd-navbar" id="admidio-main-navbar">
        <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/overview.php">
            <img class="d-none d-md-block align-top" src="<?php echo $_smarty_tpl->tpl_vars['urlTheme']->value;?>
/images/admidio_logo.png"
                alt="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_ADMIDIO_SHORT_DESC');?>
" title="<?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_ADMIDIO_SHORT_DESC');?>
">
        </a>
        <span id="headline-organization" class="d-block d-lg-none"><?php echo $_smarty_tpl->tpl_vars['organizationName']->value;?>
</span>
        <span id="headline-membership" class="d-none d-lg-block"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_ONLINE_MEMBERSHIP_ADMINISTRATION');?>
 - <?php echo $_smarty_tpl->tpl_vars['organizationName']->value;?>
</span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
            <?php if ($_smarty_tpl->tpl_vars['validLogin']->value) {?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/modules/profile/profile.php"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_MY_PROFILE');?>
</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/logout.php"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_LOGOUT');?>
</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/system/login.php"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_LOGIN');?>
</a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['registrationEnabled']->value) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['urlAdmidio']->value;?>
/adm_program/modules/registration/registration.php"><?php echo $_smarty_tpl->tpl_vars['l10n']->value->get('SYS_REGISTRATION');?>
</a>
                    </li>
                <?php }?>
            <?php }?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-xl-nowrap">
            <div class="col-12 col-md-3 col-xl-2 admidio-sidebar" id="sidebar">
                <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/menu.main.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>

            <div class="admidio-content-col col-12 col-md-9 col-xl-10">
                <nav class="admidio-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navigationStack']->value, 'navElementArray', true);
$_smarty_tpl->tpl_vars['navElementArray']->iteration = 0;
$_smarty_tpl->tpl_vars['navElementArray']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['navElementArray']->value) {
$_smarty_tpl->tpl_vars['navElementArray']->do_else = false;
$_smarty_tpl->tpl_vars['navElementArray']->iteration++;
$_smarty_tpl->tpl_vars['navElementArray']->last = $_smarty_tpl->tpl_vars['navElementArray']->iteration === $_smarty_tpl->tpl_vars['navElementArray']->total;
$__foreach_navElementArray_0_saved = $_smarty_tpl->tpl_vars['navElementArray'];
?>
                            <?php if (!empty($_smarty_tpl->tpl_vars['navElementArray']->value['icon'])) {?>
                                <?php $_smarty_tpl->_assignInScope('breadcrumbIcon', "<i class=\"admidio-icon-chain fas ".((string)$_smarty_tpl->tpl_vars['navElementArray']->value['icon'])."\"></i>");?>
                            <?php } else { ?>
                                <?php $_smarty_tpl->_assignInScope('breadcrumbIcon', '');?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['navElementArray']->iteration == $_smarty_tpl->tpl_vars['navElementArray']->last) {?>
                                <li class="breadcrumb-item active"><?php echo $_smarty_tpl->tpl_vars['breadcrumbIcon']->value;
echo $_smarty_tpl->tpl_vars['navElementArray']->value['text'];?>
</li>
                            <?php } else { ?>
                                <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['navElementArray']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['breadcrumbIcon']->value;
echo $_smarty_tpl->tpl_vars['navElementArray']->value['text'];?>
</a></li>
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['navElementArray'] = $__foreach_navElementArray_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ol>
                </nav>

                <div id="content" class="admidio-content" role="main">
                    <div class="admidio-content-header">
                        <h1 class="admidio-module-headline"><?php echo $_smarty_tpl->tpl_vars['headline']->value;?>
</h1>
                        <?php $_smarty_tpl->_subTemplateRender('file:sys-template-parts/menu.functions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    </div>

                                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>


                                        <?php if ($_smarty_tpl->tpl_vars['templateFile']->value != '') {?>
                        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['templateFile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php }?>

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
        </div>
    </div>
</body>
</html>
<?php }
}
