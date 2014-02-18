<?php 
/*
* Pixel Point Creative - Cinch Menu Module
* License: GNU General Public License version
* See: http://www.gnu.org/copyleft/gpl.html
* Copyright (c) Pixel Point Creative LLC.
* More info at http://www.pixelpointcreative.com
* Last Updated: 3/14/13
*/

?>
<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
if(!defined('DS')){ define('DS',DIRECTORY_SEPARATOR); }
$moduleURI = JURI::base()."modules/mod_cinch_menu/";
$imagesURI = $moduleURI."tmpl/images";

$menu_direction = $params->get("menu_direction");
$menuType = $params->get("menutype");
$startLevel = $params->get("startlevel", 1);
$endLevel = $params->get("endlevel", "all");
$showSub = $params->get("showsub", "true");
$event = $params->get("event","click");
$duration = $params->get("duration",300);
$type = $params->get("type", "accordion");
$subWidth = $params->get("subwidth","200")."px";
$textAlign = $params->get("textalign", "left");
$mainItemColor = $params->get("mainitemcolor", "#ffffff");
$textLinkColor = $params->get("textlinkcolor", "#a3a3a3");
$textHoverColor = $params->get("texthovercolor", "#ed8000");
$showBullet = $params->get("showbullet", "true");
$bulletImage = $imagesURI."/plus.png";
$bulletActive = $imagesURI."/minus.png";
$bulletAlign = $params->get("bulletalign","right");
$jquery = $params->get('jquery');

	JHtml::stylesheet('modules/'.$module->module.'/tmpl/css/accordion.css');
	JHtml::stylesheet('modules/'.$module->module.'/tmpl/css/flyout.css');
	if( !defined('SMART_JQUERY') && $jquery ){
		JHtml::script('modules/'.$module->module.'/tmpl/js/jquery-1.8.2.min.js');
		JHtml::script('modules/'.$module->module.'/tmpl/js/jquery-noconflict.js');
		define('SMART_JQUERY', 1);
	} 
	

if (!class_exists('CinchMenuHelper')) {
    include   "core" . DS . 'accmenureader.php';       
}

$menus	= CinchMenuHelper::getList($menuType, $startLevel, $endLevel, $showSub);

$itemID = JRequest::getInt('Itemid');

if(count($menus)) {
    require JModuleHelper::getLayoutPath('mod_cinch_menu', $type);
}
?>