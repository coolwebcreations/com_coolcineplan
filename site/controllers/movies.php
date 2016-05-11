<?php
/**
 * @version    CVS: 0.1.16
 * @package    Com_Coolcineplan
 * @author     Mike Brandner <mike@coolwebcreations.de>
 * @copyright  Copyright (C) coolwebcreations.de 2016. All rights reserved
 * @license    GNU General Public License Version 2 oder später; siehe LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Movies list controller class.
 *
 * @since  1.6
 */
class CoolcineplanControllerMovies extends CoolcineplanController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Movies', $prefix = 'CoolcineplanModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
