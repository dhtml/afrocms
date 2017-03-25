<?php
/**
* converts post data to array
*
* @param array $post The post data
* @param string $name The name of the key
* @param string $value The value of the key
*
* @return array
*/
function datagrid2array($post=array(),$name,$value)
{
$response=array();
if(!isset($post['tblAppendGrid_rowOrder'])) {return $response;}

$order=explode(',',$post['tblAppendGrid_rowOrder']);

foreach($order as $pos)
{
  $_key= isset($post["tblAppendGrid_{$name}_{$pos}"]) ? $post["tblAppendGrid_{$name}_{$pos}"] : $post["tblAppendGrid_Adt{$name}_{$pos}"];
  $_val= isset($post["tblAppendGrid_{$value}_{$pos}"]) ? $post["tblAppendGrid_{$value}_{$pos}"] : $post["tblAppendGrid_Adt{$value}_{$pos}"];
  $response[$_key]=$_val;
}

return $response;
}





$langfile="";
$xmlcont=array();
$jsondata='';

if(isset($_POST['langfile']) && !empty($_POST['langfile']) && file_exists($_POST['langfile'])) {

//file_put_contents(__DIR__."/post.txt",serialize($_POST));

//get language file
$langfile=$_POST['langfile'];

//detect submission
if(isset($_POST['save'])) {
  $datagrid=datagrid2array($_POST,'Key','Description');
  $xml=array2xml($datagrid,'resources');
  file_put_contents($langfile,$xml);
}

//load language file
$xmlstr=file_get_contents($langfile);
$xmlcont=xmlstring2array($xmlstr);

//convert language file to json
$json=array();
foreach($xmlcont as $key=>$value) {
$json[]=array('Key'=>$key,'Description'=>$value);
}

$jsondata=json_encode($json);
} else {
$jsondata="[]";
}

addScript("lang_data=$jsondata;",'top','inline');


//stdout($jsondata);
?>

<form method="post">

<select name="langfile" onchange="this.form.submit();" style="font-size:16px;padding:10px;margin-bottom:10px;margin-top:10px;"
class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">

<?php
$output="";
$output.="<option>Pick a language file for editing</option>";
foreach($this->lang->loaded as $plugin=>$langs) {
  //echo "<optgroup label=\"{$plugin}\">\n";
  foreach($langs as $lang) {
    $lang2=str_replace(APPPATH.'plugins/','',$lang);

    $select= $langfile==$lang ? ' selected="selected" ' : '';
    $output.="<option $select value=\"{$lang}\">{$lang2}</option>";
  }
  //echo "<optgroup>\n";
}
echo $output;
?>
</select>

<div <?php if(!empty($langfile)) {echo ' style="display:none;" ';} ?>>
<p style="font-weight:bold;">
To edit the language settings of a plugin, please select the language file from the dropdown list above.
</p>
</div>

<div <?php if(empty($langfile)) {echo ' style="display:none;" ';} ?>>

<table id="tblAppendGrid">
</table>
<br />

<button id="btnLoad" name="save" value="save" type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button"><span class="ui-button-text">
    Save Changes</span></button>
</form>

</div>
