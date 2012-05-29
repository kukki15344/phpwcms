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

// this is a html entities and its decode parameter
// based on list at http://www.htmlhelp.com/reference/html40/entities/

$SPECIAL_ENTITIES_TABLES['latin1_encode'] = array (
    "&nbsp;", 
    "&iexcl;", 
    "&cent;", 
    "&pound;", 
    "&curren;", 
    "&yen;", 
    "&brvbar;", 
    "&sect;", 
    "&uml;", 
    "&copy;", 
    "&ordf;", 
    "&laquo;", 
    "&not;", 
    "&shy;", 
    "&reg;", 
    "&macr;", 
    "&deg;", 
    "&plusmn;", 
    "&sup2;", 
    "&sup3;", 
    "&acute;", 
    "&micro;", 
    "&para;", 
    "&middot;", 
    "&cedil;", 
    "&sup1;", 
    "&ordm;", 
    "&raquo;", 
    "&frac14;", 
    "&frac12;", 
    "&frac34;", 
    "&iquest;", 
    "&Agrave;", 
    "&Aacute;", 
    "&Acirc;", 
    "&Atilde;", 
    "&Auml;", 
    "&Aring;", 
    "&AElig;", 
    "&Ccedil;", 
    "&Egrave;", 
    "&Eacute;", 
    "&Ecirc;", 
    "&Euml;", 
    "&Igrave;", 
    "&Iacute;", 
    "&Icirc;", 
    "&Iuml;", 
    "&ETH;", 
    "&Ntilde;", 
    "&Ograve;", 
    "&Oacute;", 
    "&Ocirc;", 
    "&Otilde;", 
    "&Ouml;", 
    "&times;", 
    "&Oslash;", 
    "&Ugrave;", 
    "&Uacute;", 
    "&Ucirc;", 
    "&Uuml;", 
    "&Yacute;", 
    "&THORN;", 
    "&szlig;", 
    "&agrave;", 
    "&aacute;", 
    "&acirc;", 
    "&atilde;", 
    "&auml;", 
    "&aring;", 
    "&aelig;", 
    "&ccedil;", 
    "&egrave;", 
    "&eacute;", 
    "&ecirc;", 
    "&euml;", 
    "&igrave;", 
    "&iacute;", 
    "&icirc;", 
    "&iuml;", 
    "&eth;", 
    "&ntilde;", 
    "&ograve;", 
    "&oacute;", 
    "&ocirc;", 
    "&otilde;", 
    "&ouml;", 
    "&divide;", 
    "&oslash;", 
    "&ugrave;", 
    "&uacute;", 
    "&ucirc;", 
    "&uuml;", 
    "&yacute;", 
    "&thorn;", 
    "&yuml;"
    );

$SPECIAL_ENTITIES_TABLES['symbol_encode'] = array(
    "&fnof;", 
    "&Alpha;", 
    "&Beta;", 
    "&Gamma;", 
    "&Delta;", 
    "&Epsilon;", 
    "&Zeta;", 
    "&Eta;", 
    "&Theta;", 
    "&Iota;", 
    "&Kappa;", 
    "&Lambda;", 
    "&Mu;", 
    "&Nu;", 
    "&Xi;", 
    "&Omicron;", 
    "&Pi;", 
    "&Rho;", 
    "&Sigma;", 
    "&Tau;", 
    "&Upsilon;", 
    "&Phi;", 
    "&Chi;", 
    "&Psi;", 
    "&Omega;", 
    "&alpha;", 
    "&beta;", 
    "&gamma;", 
    "&delta;", 
    "&epsilon;", 
    "&zeta;", 
    "&eta;", 
    "&theta;", 
    "&iota;", 
    "&kappa;", 
    "&lambda;", 
    "&mu;", 
    "&nu;", 
    "&xi;", 
    "&omicron;", 
    "&pi;", 
    "&rho;", 
    "&sigmaf;", 
    "&sigma;", 
    "&tau;", 
    "&upsilon;", 
    "&phi;", 
    "&chi;", 
    "&psi;", 
    "&omega;", 
    "&thetasym;", 
    "&upsih;", 
    "&piv;", 
    "&bull;", 
    "&hellip;", 
    "&prime;", 
    "&Prime;", 
    "&oline;", 
    "&frasl;", 
    "&weierp;", 
    "&image;", 
    "&real;", 
    "&trade;", 
    "&alefsym;", 
    "&larr;", 
    "&uarr;", 
    "&rarr;", 
    "&darr;", 
    "&harr;", 
    "&crarr;", 
    "&lArr;", 
    "&uArr;", 
    "&rArr;", 
    "&dArr;", 
    "&hArr;", 
    "&forall;", 
    "&part;", 
    "&exist;", 
    "&empty;", 
    "&nabla;", 
    "&isin;", 
    "&notin;", 
    "&ni;", 
    "&prod;", 
    "&sum;", 
    "&minus;", 
    "&lowast;", 
    "&radic;", 
    "&prop;", 
    "&infin;", 
    "&ang;", 
    "&and;", 
    "&or;", 
    "&cap;", 
    "&cup;", 
    "&int;", 
    "&there4;", 
    "&sim;", 
    "&cong;", 
    "&asymp;", 
    "&ne;", 
    "&equiv;", 
    "&le;", 
    "&ge;", 
    "&sub;", 
    "&sup;", 
    "&nsub;", 
    "&sube;", 
    "&supe;", 
    "&oplus;", 
    "&otimes;", 
    "&perp;", 
    "&sdot;", 
    "&lceil;", 
    "&rceil;", 
    "&lfloor;", 
    "&rfloor;", 
    "&lang;", 
    "&rang;", 
    "&loz;", 
    "&spades;", 
    "&clubs;", 
    "&hearts;", 
    "&diams;"
    );
    
$SPECIAL_ENTITIES_TABLES['specialchars_encode'] = array( 
    "&quot;", 
    "&amp;", 
    "&lt;", 
    "&gt;", 
    "&OElig;", 
    "&oelig;", 
    "&Scaron;", 
    "&scaron;", 
    "&Yuml;", 
    "&circ;", 
    "&tilde;", 
    "&ensp;", 
    "&emsp;", 
    "&thinsp;", 
    "&zwnj;", 
    "&zwj;", 
    "&lrm;", 
    "&rlm;", 
    "&ndash;", 
    "&mdash;", 
    "&lsquo;", 
    "&rsquo;", 
    "&sbquo;", 
    "&ldquo;", 
    "&rdquo;", 
    "&bdquo;", 
    "&dagger;", 
    "&Dagger;", 
    "&permil;", 
    "&lsaquo;", 
    "&rsaquo;", 
    "&euro;"
    );
        
$SPECIAL_ENTITIES_TABLES['latin1_decode'] = array (
    " ", 
    "¡", 
    "¢", 
    "£", 
    "¤", 
    "¥", 
    "¦", 
    "§", 
    "¨", 
    "©", 
    "ª", 
    "«", 
    "¬", 
    "­", 
    "®", 
    "¯", 
    "°", 
    "±", 
    "²", 
    "³", 
    "´", 
    "µ", 
    "¶", 
    "·", 
    "¸", 
    "¹", 
    "º", 
    "»", 
    "¼", 
    "½", 
    "¾", 
    "¿", 
    "À", 
    "Á", 
    "Â", 
    "Ã", 
    "Ä", 
    "Å", 
    "Æ", 
    "Ç", 
    "È", 
    "É", 
    "Ê", 
    "Ë", 
    "Ì", 
    "Í", 
    "Î", 
    "Ï", 
    "Ð", 
    "Ñ", 
    "Ò", 
    "Ó", 
    "Ô", 
    "Õ", 
    "Ö", 
    "×", 
    "Ø", 
    "Ù", 
    "Ú", 
    "Û", 
    "Ü", 
    "Ý", 
    "Þ", 
    "ß", 
    "à", 
    "á", 
    "â", 
    "ã", 
    "ä", 
    "å", 
    "æ", 
    "ç", 
    "è", 
    "é", 
    "ê", 
    "ë", 
    "ì", 
    "í", 
    "î", 
    "ï", 
    "ð", 
    "ñ", 
    "ò", 
    "ó", 
    "ô", 
    "õ", 
    "ö", 
    "÷", 
    "ø", 
    "ù", 
    "ú", 
    "û", 
    "ü", 
    "ý", 
    "þ", 
    "ÿ"
    );
    
$SPECIAL_ENTITIES_TABLES['symbol_decode'] = array(
	"&#402;", 
	"&#913;", 
	"&#914;", 
	"&#915;", 
	"&#916;", 
	"&#917;", 
	"&#918;", 
	"&#919;", 
	"&#920;", 
	"&#921;", 
	"&#922;", 
	"&#923;", 
	"&#924;", 
	"&#925;", 
	"&#926;", 
	"&#927;", 
	"&#928;", 
	"&#929;", 
	"&#931;", 
	"&#932;", 
	"&#933;", 
	"&#934;", 
	"&#935;", 
	"&#936;", 
	"&#937;", 
	"&#945;", 
	"&#946;", 
	"&#947;", 
	"&#948;", 
	"&#949;", 
	"&#950;", 
	"&#951;", 
	"&#952;", 
	"&#953;", 
	"&#954;", 
	"&#955;", 
	"&#956;", 
	"&#957;", 
	"&#958;", 
	"&#959;", 
	"&#960;", 
	"&#961;", 
	"&#962;", 
	"&#963;", 
	"&#964;", 
	"&#965;", 
	"&#966;", 
	"&#967;", 
	"&#968;", 
	"&#969;", 
	"&#977;", 
	"&#978;", 
	"&#982;", 
	"&#8226;", 
	"&#8230;", 
	"&#8242;", 
	"&#8243;", 
	"&#8254;", 
	"&#8260;", 
	"&#8472;", 
	"&#8465;", 
	"&#8476;", 
	"&#8482;", 
	"&#8501;", 
	"&#8592;", 
	"&#8593;", 
	"&#8594;", 
	"&#8595;", 
	"&#8596;", 
	"&#8629;", 
	"&#8656;", 
	"&#8657;", 
	"&#8658;", 
	"&#8659;", 
	"&#8660;", 
	"&#8704;", 
	"&#8706;", 
	"&#8707;", 
	"&#8709;", 
	"&#8711;", 
	"&#8712;", 
	"&#8713;", 
	"&#8715;", 
	"&#8719;", 
	"&#8721;", 
	"&#8722;", 
	"&#8727;", 
	"&#8730;", 
	"&#8733;", 
	"&#8734;", 
	"&#8736;", 
	"&#8743;", 
	"&#8744;", 
	"&#8745;", 
	"&#8746;", 
	"&#8747;", 
	"&#8756;", 
	"&#8764;", 
	"&#8773;", 
	"&#8776;", 
	"&#8800;", 
	"&#8801;", 
	"&#8804;", 
	"&#8805;", 
	"&#8834;", 
	"&#8835;", 
	"&#8836;", 
	"&#8838;", 
	"&#8839;", 
	"&#8853;", 
	"&#8855;", 
	"&#8869;", 
	"&#8901;", 
	"&#8968;", 
	"&#8969;", 
	"&#8970;", 
	"&#8971;", 
	"&#9001;", 
	"&#9002;", 
	"&#9674;", 
	"&#9824;", 
	"&#9827;", 
	"&#9829;", 
	"&#9830;"
    );
    
$SPECIAL_ENTITIES_TABLES['specialchars_decode'] = array( 
    '"', 
    '&', 
    '<', 
    '>', 
	"&#338;", 
	"&#339;", 
	"&#352;", 
	"&#353;", 
	"&#376;", 
	"&#710;", 
	"&#732;", 
	"&#8194;", 
	"&#8195;", 
	"&#8201;", 
	"&#8204;", 
	"&#8205;", 
	"&#8206;", 
	"&#8207;", 
	"&#8211;", 
	"&#8212;", 
	"&#8216;", 
	"&#8217;", 
	"&#8218;", 
	"&#8220;", 
	"&#8221;", 
	"&#8222;", 
	"&#8224;", 
	"&#8225;", 
	"&#8240;", 
	"&#8249;", 
	"&#8250;", 
	"&#8364;"
    );
	
?>