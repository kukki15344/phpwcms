<?php
/*************************************************************************************
   Copyright notice
   
   (c) 2002-2012 Oliver Georgi <oliver@phpwcms.de> // All rights reserved.
 
   This script is part of PHPWCMS. The PHPWCMS web content management system is
   free software; you can redistribute it and/or modify it under the terms of
   the GNU General Public License as published by the Free Software Foundation;
   either version 2 of the License, or (at your option) any later version.
  
   The GNU General Public License can be found at http://www.gnu.org/copyleft/gpl.html
   A copy is found in the textfile GPL.txt and important notices to the license 
   from the author is found in LICENSE.txt distributed with these scripts.
  
   This script is distributed in the hope that it will be useful, but WITHOUT ANY 
   WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
   PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 
   This copyright notice MUST APPEAR in all copies of the script!
*************************************************************************************/

// ----------------------------------------------------------------
// obligate check for phpwcms constants
if (!defined('PHPWCMS_ROOT')) {
   die("You Cannot Access This Script Directly, Have a Nice Day.");
}
// ----------------------------------------------------------------



// Content Type Reference

$content['reference'] = unserialize($crow["acontent_form"]);
$content['reference']["tmpl"] = render_device( @file_get_contents(PHPWCMS_TEMPLATE.'inc_cntpart/reference/'.$content['reference']["tmpl"]) );
if(!$content['reference']["tmpl"]) {

	$content['reference']["tmpl"] = '<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1%" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr><td>[REF]{REF}[/REF]</td></tr>
      [CAPTION]<tr><td>{CAPTION}</td></tr>[/CAPTION]
    </table>
    [LIST]{LIST}[/LIST]</td>
    <td width="14" valign="top">&nbsp;</td>
    <td width="98%" valign="top">[TITLE]<h3>{TITLE}</h3>[/TITLE]
[SUB]<h4>{SUB}</h4>[/SUB]
[TEXT]<p>{TEXT}</p>[/TEXT]</td>
  </tr>
</table>';

}



$content['reference']['ref_caption'] = '';
$content['reference']['ref_image']   = '[NO&nbsp;IMAGE]';
$content['reference']['ref_list']    = '';

// check if there is an image
$content['reference']['ref_count'] = count($content['reference']["list"]);
if($content['reference']['ref_count']) {

	// caption
	$content['reference']['caption_list'] = explode("\n", $content['reference']['caption']);
	$ci = 0;
	if(is_array($content['reference']['caption_list']) && count($content['reference']['caption_list'])) {
		foreach($content['reference']['caption_list'] as $captkey => $captvalue) {
			$content['reference']['caption_list'][$captkey] = html_specialchars(trim($captvalue));
			$ci++;
		}
		if($content['reference']['caption_list'][0]) {
			$content['reference']['ref_caption']  = '<div id="refcaptid'.$crow['acontent_id'].'" style="display:inline;">';
			$content['reference']['ref_caption'] .= $content['reference']['caption_list'][0];
			$content['reference']['ref_caption'] .= '</div>';
		}
	}
	for($ci; $ci < $content['reference']['ref_count']; $ci++) {
		$content['reference']['caption_list'][$ci] = '';
	}
	
	// javascript ID
	$content['reference']['ref_id'] = 'refimgid'.$crow['acontent_id'];
	
	// starting large image
	$thumb_image = get_cached_image(
						array(	"target_ext"	=>	$content['reference']["list"][0][3],
								"image_name"	=>	$content['reference']["list"][0][2] . '.' . $content['reference']["list"][0][3],
								"max_width"		=>	$content['reference']["list"][0][4],
								"max_height"	=>	$content['reference']["list"][0][5],
								"thumb_name"	=>	md5(	$content['reference']["list"][0][2].
															$content['reference']["list"][0][4].
															$content['reference']["list"][0][5].
															$phpwcms["sharpen_level"])
        					  )	);
	
	
	if($thumb_image != false) {
	
		//$img_name = html_specialchars($content['reference']["list"][0][1]);
		$content['reference']['ref_image']  = '<img src="'.PHPWCMS_IMAGES . $thumb_image[0] ;
		$content['reference']['ref_image'] .= '" border="'.$content['reference']['border'].'" '; //.$thumb_image[3]
		$content['reference']['ref_image'] .= ' alt="" ';//title="'.$img_name.'" 
		$content['reference']['ref_image'] .= 'id="'.$content['reference']['ref_id'].'" name="'.$content['reference']['ref_id'].'" />';
	
	}
	
	/*
	if($content['reference']["zoom"]) {
	
		$zoominfo = get_cached_image(
						array(	"target_ext"	=>	$content['reference']["list"][0][3],
								"image_name"	=>	$content['reference']["list"][0][2] . '.' . $content['reference']["list"][0][3],
								"max_width"		=>	$phpwcms["img_prev_width"],
								"max_height"	=>	$phpwcms["img_prev_height"],
								"thumb_name"	=>	md5($content['reference']["list"][0][2].$phpwcms["img_prev_width"].
														$phpwcms["img_prev_height"].$phpwcms["sharpen_level"])
        					  )	);
	
		if($zoominfo != false) {
			$popup_link  = 'image_zoom.php?show='.base64_encode($zoominfo[0].'?'.$zoominfo[3]);
			$content['reference']['ref_image'] =	'<a href="'.$popup_link.'" onclick="window.open(\''.$popup_link.
													"','previewpic','width=".$zoominfo[1].",height=".$zoominfo[2].
													"');return false;\">".$content['reference']['ref_image'].'</a>';
		}
	
	}
	*/
	
	if($content['reference']['ref_count'] > 1) {
		$ci = 0;
		// open table row if horizontal
		if($content['reference']['basis']) {
			$content['reference']['x1'] = "<tr>\n";
			$content['reference']['x2'] = "</tr>\n";
			$content['reference']['x3'] = '';
			$content['reference']['x4'] = "</tr>\n";
		} else {
			$content['reference']['ref_list'] .= "<tr>\n";
			$content['reference']['x1'] = '';
			$content['reference']['x2'] = "\n";
			$content['reference']['x3'] = "</tr>\n";
			$content['reference']['x4'] = '';
		}
		$content['reference']['x5'] = '';
		$content['reference']['x6'] = '';
		
		$content['reference']['x8'] = 0;
		if(preg_match('/\[CAPTION\](.*?)\[\/CAPTION\]/is', $content['reference']["tmpl"])) {
			$content['reference']['x8'] = 1;
		}
		
		// loop images
		foreach($content['reference']["list"] as $captkey => $captvalue) {
		
			$content['reference']['x5'] = '';
			$content['reference']['x6'] = '';
				
			// space between images
			if($ci && $content['reference']['space']) {
			
				$content['reference']['ref_list'] .= $content['reference']['x1'];
				$content['reference']['ref_list'] .= '<td><img src="img/leer.gif" alt="" ';
				$content['reference']['ref_list'] .= 'width="'.$content['reference']['space'].'" height="';
				$content['reference']['ref_list'] .= $content['reference']['space'].'" border="0" /></td>';
				$content['reference']['ref_list'] .= $content['reference']['x2'];

			}
			$content['reference']['ref_list'] .= $content['reference']['x1'];
			$content['reference']['ref_list'] .= '<td';
			switch($content['reference']["pos"]) {
				case 1:	$content['reference']['ref_list'] .= ' align="left" valign="top"';		break;
				case 2:	$content['reference']['ref_list'] .= ' align="left" valign="middle"';	break;
				case 3:	$content['reference']['ref_list'] .= ' align="left" valign="bottom"';	break;
				case 4:	$content['reference']['ref_list'] .= ' align="center" valign="top"';	break;
				case 5:	$content['reference']['ref_list'] .= ' align="center" valign="middle"';	break;
				case 6:	$content['reference']['ref_list'] .= ' align="center" valign="bottom"';	break;
				case 7:	$content['reference']['ref_list'] .= ' align="right" valign="top"';		break;
				case 8:	$content['reference']['ref_list'] .= ' align="right" valign="middle"';	break;
				case 9:	$content['reference']['ref_list'] .= ' align="right" valign="bottom"';	break;
			}
			$content['reference']['ref_list'] .= '>';

			if($content['reference']["zoom"]) {
			
				// build additional reference popup images
				$zoominfo = get_cached_image(
						array(	"target_ext"	=>	$content['reference']["list"][$captkey][3],
								"image_name"	=>	$content['reference']["list"][$captkey][2] . '.' . $content['reference']["list"][$captkey][3],
								"max_width"		=>	$phpwcms["img_prev_width"],
								"max_height"	=>	$phpwcms["img_prev_height"],
								"thumb_name"	=>	md5($content['reference']["list"][$captkey][2].$phpwcms["img_prev_width"].
														$phpwcms["img_prev_height"].$phpwcms["sharpen_level"])
        					  )	);
			
	
				if($zoominfo != false) {
					$popup_link  = 'image_zoom.php?'.getClickZoomImageParameter($zoominfo[0].'?'.$zoominfo[3]);
		
					$content['reference']['x5'] =	'<a href="'.$popup_link.'" onclick="window.open(\''.$popup_link.
													"','previewpic','width=".$zoominfo[1].",height=".$zoominfo[2].
													"');return false;\">";
					$content['reference']['x6'] = '</a>';
				}
	
			}

			$content['reference']['ref_list'] .= $content['reference']['x5'];
			
			$over_image = get_cached_image(
						array(	"target_ext"	=>	$content['reference']["list"][$captkey][3],
								"image_name"	=>	$content['reference']["list"][$captkey][2] . '.' . $content['reference']["list"][$captkey][3],
								"max_width"		=>	$content['reference']["list"][$captkey][4],
								"max_height"	=>	$content['reference']["list"][$captkey][5],
								"thumb_name"	=>	md5(	$content['reference']["list"][$captkey][2].
															$content['reference']["list"][$captkey][4].
															$content['reference']["list"][$captkey][5].
															$phpwcms["sharpen_level"])
        					  )	);
			
			
			$thumb_image = get_cached_image(
						array(	"target_ext"	=>	$content['reference']["list"][$captkey][3],
								"image_name"	=>	$content['reference']["list"][$captkey][2] . '.' . $content['reference']["list"][$captkey][3],
								"max_width"		=>	$content['reference']["temp_list_width"],
								"max_height"	=>	$content['reference']["temp_list_height"],
								"thumb_name"	=>	md5(	$content['reference']["list"][$captkey][2].
															$content['reference']["temp_list_width"].
															$content['reference']["temp_list_height"].
															$phpwcms["sharpen_level"])
        					  )	);
			
			if($thumb_image != false) {
				
				initFrontendJS();
	
				if(!empty($content['reference']['caption_list'][$captkey])) {
					$img_name = $content['reference']['caption_list'][$captkey];
				} else {
					$img_name = html_specialchars($content['reference']["list"][$captkey][1]);
				}
				$content['reference']['ref_list'] .= '<img src="'.PHPWCMS_IMAGES . $thumb_image[0] ;
				$content['reference']['ref_list'] .= '" border="'.$content['reference']['border'].'" ';
				$content['reference']['ref_list'] .= $thumb_image[3].' alt="'.$img_name.'" title="'.$img_name;
				$content['reference']['ref_list'] .= '" id="'.$content['reference']['ref_id'].'a'.$captkey;
				$content['reference']['ref_list'] .= '" name="'.$content['reference']['ref_id'].'a'.$captkey.'" ';
				
				// switch large image onmouseover
				$content['reference']['ref_list'] .= 'onmouseover="';
				if($over_image != false) {
					$content['reference']['ref_list'] .= "MM_swapImage('".$content['reference']['ref_id'];
					$content['reference']['ref_list'] .= "','','". PHPWCMS_IMAGES . $over_image[0]."',1);";
				}
				// make single quotes js compatible
				$content['reference']['x7'] = js_singlequote($content['reference']['caption_list'][$captkey]);
				// check if layer for caption available
				if($content['reference']['x8'] && $content['reference']['caption_list'][$captkey]) {
					$content['reference']['ref_list'] .= "addText('refcaptid".$crow['acontent_id']."','";
					$content['reference']['ref_list'] .= $content['reference']['x7']."');";
				}
				$content['reference']['ref_list'] .= "MM_displayStatusMsg('".$content['reference']['x7']."');return ";
				$content['reference']['ref_list'] .= 'document.MM_returnValue;" />'.$content['reference']['x6']."</td>\n";
				$content['reference']['ref_list'] .= $content['reference']['x4'];
	
			}
			$ci++;
		}
		// close table row if horizontal
		$content['reference']['ref_list'] .= $content['reference']['x3'];
		// wrap it in the table
		$content['reference']['ref_list']  = '<table border="0" cellspacing="0" cellpadding="0">'.$content['reference']['ref_list'].'</table>';
	}
	
}


$content['reference']["tmpl"] = render_cnt_template($content['reference']["tmpl"], 'TITLE', html_specialchars($crow["acontent_title"]));
$content['reference']["tmpl"] = render_cnt_template($content['reference']["tmpl"], 'SUB', html_specialchars($crow["acontent_subtitle"]));
$content['reference']["tmpl"] = render_cnt_template($content['reference']["tmpl"], 'TEXT', nl2br($content['reference']["text"]));
$content['reference']["tmpl"] = render_cnt_template($content['reference']["tmpl"], 'CAPTION', $content['reference']['ref_caption']);
$content['reference']["tmpl"] = render_cnt_template($content['reference']["tmpl"], 'LIST', $content['reference']['ref_list']);
$content['reference']["tmpl"] = render_cnt_template($content['reference']["tmpl"], 'REF', $content['reference']['ref_image']);


$CNT_TMP .= $content['reference']["tmpl"];

?>