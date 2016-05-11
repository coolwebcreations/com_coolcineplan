<?php

/**
 * @version    CVS: 0.1.16
 * @package    Com_Coolcineplan
 * @author     Mike Brandner <mike@coolwebcreations.de>
 * @copyright  Copyright (C) coolwebcreations.de 2016. All rights reserved
 * @license    GNU General Public License Version 2 oder später; siehe LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Class CoolcineplanFrontendHelper
 *
 * @since  1.6
 */
class CoolcineplanHelpersCoolcineplan
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_coolcineplan/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_coolcineplan/models/' . strtolower($name) . '.php';
			$model = JModelLegacy::getInstance($name, 'CoolcineplanModel');
		}

		return $model;
	}
}
