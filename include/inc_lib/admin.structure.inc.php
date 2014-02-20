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


$acat_new = 1;
$acat_id = isset($_GET["cat"]) ? intval($_GET["cat"]) : 0;
$acat_timeout = '';
$acat_nosearch = '';
$acat_nositemap = 1;
$acat_permit = array();
if($acat_id) { //Anzeige der gew�hlten Artikel Kategorie
	$sql = "SELECT * FROM ".DB_PREPEND."phpwcms_articlecat WHERE acat_id=".$acat_id." LIMIT 1";
	if($result_acat = mysql_query($sql, $db) or die("error while reading article category infos")) {
		if($row_acat = mysql_fetch_assoc($result_acat)) {
			$acat_title			= $row_acat["acat_name"];
			$acat_info			= $row_acat["acat_info"];
			$acat_id			= $row_acat["acat_id"];
			$acat_new			= 0;
			$acat_aktiv			= $row_acat["acat_aktiv"];
			$acat_public		= $row_acat["acat_public"];
			$acat_sort			= $row_acat["acat_sort"];
			$acat_alias			= $row_acat["acat_alias"];
			$acat_hidden		= $row_acat["acat_hidden"];
			$acat_template		= $row_acat["acat_template"];
			$acat_ssl			= $row_acat["acat_ssl"];
			$acat_regonly		= $row_acat["acat_regonly"];
			$acat_topcount		= $row_acat["acat_topcount"];
			$acat_maxlist		= $row_acat["acat_maxlist"];
			$acat_redirect		= $row_acat["acat_redirect"];
			$acat_order			= $row_acat["acat_order"];
			$acat_timeout		= $row_acat["acat_cache"];
			$acat_nosearch		= $row_acat["acat_nosearch"];
			$acat_nositemap		= $row_acat["acat_nositemap"];
			$acat_permit		= empty($row_acat["acat_permit"]) ? array() : explode(',', $row_acat["acat_permit"]);
			$acat_cntpart		= (isset($row_acat["acat_cntpart"]) && $row_acat["acat_cntpart"] != '') ? explode(',', $row_acat["acat_cntpart"]) : array();
			$acat_pagetitle		= $row_acat["acat_pagetitle"];
			$acat_paginate		= $row_acat["acat_paginate"];
			$acat_overwrite		= $row_acat["acat_overwrite"];
			$acat_archive		= $row_acat["acat_archive"];
			$acat_class			= $row_acat["acat_class"];
			$acat_keywords		= $row_acat["acat_keywords"];
			$acat_cpdefault		= $row_acat["acat_cpdefault"];
			$acat_lang			= $row_acat["acat_lang"];
			$acat_lang_type		= $row_acat["acat_lang_type"];
			$acat_lang_id		= $row_acat["acat_lang_id"];
			$acat_disable301	= $row_acat['acat_disable301'];
		}

		mysql_free_result($result_acat);
	}
} else {
	$acat_topcount 		= $indexpage['acat_topcount'];
	$acat_order 		= $indexpage['acat_order'];
	$acat_cntpart		= isset($indexpage['acat_cntpart']) ? explode(',', $indexpage['acat_cntpart']) : array();
	$acat_cpdefault		= 0;
}

if(isset($_GET["sort"])) {
	$acat_sort = intval($_GET["sort"]);
}

$acat_order = get_order_sort($acat_order);

?>