<?php

/**
 * @version    CVS: 0.1.16
 * @package    Com_Coolcineplan
 * @author     Mike Brandner <mike@coolwebcreations.de>
 * @copyright  Copyright (C) coolwebcreations.de 2016. All rights reserved
 * @license    GNU General Public License Version 2 oder später; siehe LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Coolcineplan helper.
 *
 * @since  1.6
 */
class CoolcineplanHelpersCoolcineplan
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  string
	 *
	 * @return void
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_COOLCINEPLAN_TITLE_MOVIES'),
			'index.php?option=com_coolcineplan&view=movies',
			$vName == 'movies'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_COOLCINEPLAN_TITLE_SHOWINGS'),
			'index.php?option=com_coolcineplan&view=showings',
			$vName == 'showings'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_COOLCINEPLAN_TITLE_SHOWTYPES'),
			'index.php?option=com_coolcineplan&view=showtypes',
			$vName == 'showtypes'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_COOLCINEPLAN_TITLE_AUDITORIUMS'),
			'index.php?option=com_coolcineplan&view=auditoriums',
			$vName == 'auditoriums'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_COOLCINEPLAN_TITLE_RESERVATIONS'),
			'index.php?option=com_coolcineplan&view=reservations',
			$vName == 'reservations'
		);

JHtmlSidebar::addEntry(
			JText::_('COM_COOLCINEPLAN_TITLE_USERS'),
			'index.php?option=com_coolcineplan&view=users',
			$vName == 'users'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return    JObject
	 *
	 * @since    1.6
	 */
	public static function getActions()
	{
		$user   = JFactory::getUser();
		$result = new JObject;

		$assetName = 'com_coolcineplan';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}


class CoolcineplanHelper extends CoolcineplanHelpersCoolcineplan
{

}
