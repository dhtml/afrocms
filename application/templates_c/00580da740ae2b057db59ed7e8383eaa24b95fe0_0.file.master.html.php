<?php
/* Smarty version 3.1.31, created on 2017-03-14 10:26:41
  from "/Users/dhtml/Sites/www/afrocms.com/sandbox/application/themes/default/master.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58c7c561933495_46058674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00580da740ae2b057db59ed7e8383eaa24b95fe0' => 
    array (
      0 => '/Users/dhtml/Sites/www/afrocms.com/sandbox/application/themes/default/master.html',
      1 => 1488545186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58c7c561933495_46058674 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['page_lang']->value;?>
" dir="<?php echo $_smarty_tpl->tpl_vars['page_direction']->value;?>
">
<head>
  <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['theme_url']->value;?>
favicon.ico" type="image/vnd.microsoft.icon" />
  <?php echo $_smarty_tpl->tpl_vars['headData']->value;?>

</head>
<body class="<?php echo $_smarty_tpl->tpl_vars['bodyClass']->value;?>
">
  <?php echo $_smarty_tpl->tpl_vars['pageBody']->value;?>

  <?php echo $_smarty_tpl->tpl_vars['footData']->value;?>

</body>
</html>
<?php }
}
