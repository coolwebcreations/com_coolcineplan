<?php

/**
 * @version     CVS: 0.1.16
 * @package     com_coolcineplan
 * @subpackage  mod_coolcineplan
 * @author      Mike Brandner <mike@coolwebcreations.de>
 * @copyright   Copyright (C) coolwebcreations.de 2016. All rights reserved
 * @license     GNU General Public License Version 2 oder später; siehe LICENSE.txt
 */
defined('_JEXEC') or die;

// Include the syndicate functions only once
JLoader::register('ModCoolcineplanHelper', dirname(__FILE__) . '/helper.php');

$doc = JFactory::getDocument();

/* */
$doc->addStyleSheet(JURI::base() . '/media/mod_coolcineplan/css/style.css');

/* */
$doc->addScript(JURI::base() . '/media/mod_coolcineplan/js/script.js');

require JModuleHelper::getLayoutPath('mod_coolcineplan', $params->get('content_type', 'blank'));
