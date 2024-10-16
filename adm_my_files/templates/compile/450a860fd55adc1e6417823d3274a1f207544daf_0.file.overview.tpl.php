<?php
/* Smarty version 4.4.1, created on 2024-10-15 22:41:08
  from '/var/www/admidio/adm_themes/simple/templates/overview.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.4.1',
  'unifunc' => 'content_670f51f41e7867_42790642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '450a860fd55adc1e6417823d3274a1f207544daf' => 
    array (
      0 => '/var/www/admidio/adm_themes/simple/templates/overview.tpl',
      1 => 1727412846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_670f51f41e7867_42790642 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/admidio/adm_program/system/smarty-plugins/function.load_admidio_plugin.php','function'=>'smarty_function_load_admidio_plugin',),));
?>

<div class="row mb-5">
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-login-form">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"login_form",'file'=>"login_form.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-birthday">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"birthday",'file'=>"birthday.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-calendar">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"calendar",'file'=>"calendar.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-random-photo">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"random_photo",'file'=>"random_photo.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-latest-documents-files">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"latest-documents-files",'file'=>"latest-documents-files.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-announcement-list">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"announcement-list",'file'=>"announcement-list.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-event-list">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"event-list",'file'=>"event-list.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    <div class="admidio-overview-plugin col-sm-6 col-lg-4 col-xl-3" id="admidio-plugin-who-is-online">
        <div class="card admidio-card">
            <div class="card-body">
                <?php echo smarty_function_load_admidio_plugin(array('plugin'=>"who-is-online",'file'=>"who-is-online.php"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
</div>
<?php }
}
