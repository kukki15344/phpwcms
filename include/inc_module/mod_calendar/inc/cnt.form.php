<?php
/**
 * phpwcms content management system
 *
 * @author Oliver Georgi <oliver@phpwcms.de>
 * @copyright Copyright (c) 2002-2014, Oliver Georgi
 * @license http://opensource.org/licenses/GPL-2.0 GNU GPL-2
 * @link http://www.phpwcms.de
 *
 **/

// ----------------------------------------------------------------
// obligate check for phpwcms constants
if (!defined('PHPWCMS_ROOT')) {
   die("You Cannot Access This Script Directly, Have a Nice Day.");
}
// ----------------------------------------------------------------


// Calendar module content part form fields

// it's typically implemented in a 2 column table

// -> a spacer table row
//	<tr><td colspan="2"><img src="img/lines/l538_70.gif" alt="" width="538" height="1" /></td></tr>

// -> this can be used as spaceholfer
//	<tr><td colspan="2"><img src="img/leer.gif" alt="" width="1" height="6" /></td></tr>

// -> this is the tyical way to format rows with label and input 
//	<tr>
//		<td align="right" class="chatlist">Field label</td>
//		<td><input type="text" value="" /></td>
//	</tr>

// current module vars are stored in $phpwcms['modules'][$content["module"]]
// var to modules path: $phpwcms['modules'][$content["module"]]['path']

// before you can use module content part vars check if value is valid and what you are expect
// when defining modules vars it is always recommend to name t "modulename_varname".

if(empty($content['glossary']['glossary_template'])) {
	$content['glossary']['glossary_template'] = '';
}
if(empty($content['glossary']['glossary_filter'])) {
	$content['glossary']['glossary_filter'] = '';
}
if(empty($content['glossary']['glossary_maxwords'])) {
	$content['glossary']['glossary_maxwords'] = '';
}
if(empty($content['glossary']['glossary_tag'])) {
	$content['glossary']['glossary_tag'] = '';
}
if(empty($content['glossary']['glossary_noentry'])) {
	$content['glossary']['glossary_noentry'] = '';
}



?>
<!-- top spacer - seperate from title/subtitle section -->
<tr><td colspan="2" style="padding-bottom:8px"><img src="img/lines/l538_70.gif" alt="" width="538" height="1" /></td></tr>
<!-- start custom fields here -->

<!-- retrieve templates -->
<tr>
	<td align="right" class="chatlist"><?php echo $BL['be_admin_struct_template'] ?>:&nbsp;</td>
	<td><select name="glossary_template" id="glossary_template" class="f11b">
<?php

	echo '<option value="">'.$BL['be_admin_tmpl_default'].'</option>'.LF;

// templates for forum
$tmpllist = get_tmpl_files($phpwcms['modules'][$content["module"]]['path'].'template');
if(is_array($tmpllist) && count($tmpllist)) {
	foreach($tmpllist as $val) {
		$vals = '';
		if($val == $content['glossary']['glossary_template']) $vals= ' selected="selected"';
		$val = html_specialchars($val);
		echo '<option value="'.$val.'"'.$vals.'>'.$val."</option>\n";
	}
}
				  
?>				  
		</select></td>
</tr>
<!-- end templates -->

<!-- little space -->
<tr><td colspan="2"><img src="img/leer.gif" alt="" width="1" height="15" /></td></tr>
<!-- end space -->

<!-- input field -->
<tr>
	<td>&nbsp;</td>
	<td valign="top" class="chatlist" style="padding-bottom:3px;"><?php echo $BL['modules'][$content["module"]]['input_filter_descr'] ?></td>
</tr>
<tr>
	<td align="right" class="chatlist"><?php echo $BL['modules'][$content["module"]]['input_filter'] ?>:&nbsp;</td>
	<td><input type="text" name="glossary_filter" id="glossary_filter" value="<?php echo html_specialchars($content['glossary']['glossary_filter']) ?>" class="f11b" style="width: 440px" maxlength="1000" /></td>
</tr>
<!-- end field -->

<tr><td colspan="2"><img src="img/leer.gif" alt="" width="1" height="8" /></td></tr>

<tr>
	<td align="right" class="chatlist"><?php echo $BL['modules'][$content["module"]]['listview'] ?>:&nbsp;</td>
	<td><table cellpadding="0" cellspacing="0" border="0" summary="">
		<tr>
			<td><input name="glossary_maxwords" type="text" class="f11b" id="glossary_maxwords" style="width: 50px;" size="5" maxlength="5" onKeyUp="if(!parseInt(this.value)) this.value='';" value="<?php echo $content['glossary']['glossary_maxwords'] ?>" /></td>
			<td class="chatlist">&nbsp;<?php echo $BL['modules'][$content["module"]]['max_words'] ?></td>
		</tr>
	</table></td>
</tr>

<tr><td colspan="2"><img src="img/leer.gif" alt="" width="1" height="8" /></td></tr>

<tr>
	<td align="right" class="chatlist"><?php echo $BL['modules'][$content["module"]]['glossary_token'] ?>:&nbsp;</td>
	<td><input type="text" name="glossary_tag" id="glossary_tag" value="<?php echo html_specialchars($content['glossary']['glossary_tag']) ?>" class="f11b" style="width: 440px" maxlength="1000" /></td>
</tr>

<tr><td colspan="2"><img src="img/leer.gif" alt="" width="1" height="8" /></td></tr>

<tr>
	<td align="right" class="chatlist" style="padding:3px 5px 0 0" valign="top"><?php echo $BL['modules'][$content["module"]]['no_entry'] ?>:</td>
	<td><textarea name="glossary_noentry" id="glossary_noentry" class="f11" rows="5" style="width: 440px"><?php echo html_specialchars($content['glossary']['glossary_noentry']) ?></textarea></td>
</tr>

<!-- end custom fields -->
<!-- bottom spacer - is followed by status "visible" checkbox -->
<tr><td colspan="2" style="padding-top:8px"><img src="img/lines/l538_70.gif" alt="" width="538" height="1" /></td></tr>
