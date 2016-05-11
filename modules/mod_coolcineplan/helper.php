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

/**
 * Helper for mod_coolcineplan
 *
 * @package     com_coolcineplan
 * @subpackage  mod_coolcineplan
 * @since       1.6
 */
class ModCoolcineplanHelper
{
	/**
	 * Retrieve component items
	 *
	 * @param   Joomla\Registry\Registry &$params module parameters
	 *
	 * @return array Array with all the elements
	 */
	public static function getList(&$params)
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		/* @var $params Joomla\Registry\Registry */
		$query
			->select('*')
			->from($params->get('table'))
			->where('state = 1');

		$db->setQuery($query, $params->get('offset'), $params->get('limit'));
		$rows = $db->loadObjectList();

		return $rows;
	}

	/**
	 * Retrieve component items
	 *
	 * @param   Joomla\Registry\Registry &$params module parameters
	 *
	 * @return mixed stdClass object if the item was found, null otherwise
	 */
	public static function getItem(&$params)
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		/* @var $params Joomla\Registry\Registry */
		$query
			->select('*')
			->from($params->get('item_table'))
			->where('id = ' . intval($params->get('item_id')));

		$db->setQuery($query);
		$element = $db->loadObject();

		return $element;
	}

	/**
	 * Render element
	 *
	 * @param   Joomla\Registry\Registry $table_name  Table name
	 * @param   string                   $field_name  Field name
	 * @param   string                   $field_value Field value
	 *
	 * @return string
	 */
	public static function renderElement($table_name, $field_name, $field_value)
	{
		$result = '';
		        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
		switch ($table_name)
		{
			
		case '#__cineplan_movies':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'movietitle':
		$result = $field_value;
		break;
		case 'moviecontent':
		$result = $field_value;
		break;
		case 'moviecomment':
		$result = $field_value;
		break;
		case 'director':
		$result = $field_value;
		break;
		case 'actors':
		$result = $field_value;
		break;
		case 'country':
		$result = $field_value;
		break;
		case 'year':
		$result = $field_value;
		break;
		case 'rentalcompany':
		$result = $field_value;
		break;
		case 'poster':
		$result = $field_value;
		break;
		case 'length':
		$result = $field_value;
		break;
		case 'genre':
		$result = $field_value;
		break;
		case 'age':
		$result = $field_value;
		break;
		case 'trailer_id':
		$result = $field_value;
		break;
		}
		break;
		case '#__cineplan_showings':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'showingtime':
		$result = $field_value;
		break;
		case 'movie':
		$query = "SELECT id, movietitle FROM #__cineplan_movies HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->movietitle) ? $field_value : $results->movietitle;
		break;
		case 'auditorium':
		$query = "SELECT id, auditorium_name FROM #__cineplan_auditoriums HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->auditorium_name) ? $field_value : $results->auditorium_name;
		break;
		case 'showtype':
		$query = "SELECT id, showtype FROM #__cineplan_showtypes HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->showtype) ? $field_value : $results->showtype;
		break;
		}
		break;
		case '#__cineplan_showtypes':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'showtype':
		$result = $field_value;
		break;
		case 'description':
		$result = $field_value;
		break;
		case 'image':
		$result = $field_value;
		break;
		}
		break;
		case '#__cineplan_auditoriums':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'auditorium_name':
		$result = $field_value;
		break;
		case 'seats':
		$result = $field_value;
		break;
		case 'auditorium_image':
		$result = $field_value;
		break;
		}
		break;
		case '#__cineplan_reservations':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'show_id':
		$query = "SELECT id, date FROM #__cineplan_shows HAVING id LIKE '" . $field_value . "'";
		$db->setQuery($query);
		$results = $db->loadObject();
		$result = empty($results->time) ? $field_value : $results->time;
		break;
		}
		break;
		case '#__cineplan_users':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		case 'modified_by':
		$user = JFactory::getUser($field_value);
		$result = $user->name;
		break;
		}
		break;
		}

		return $result;
	}

	/**
	 * Returns the translatable name of the element
	 *
	 * @param   Joomla\Registry\Registry &$params Module parameters
	 * @param   string                   $field   Field name
	 *
	 * @return string Translatable name.
	 */
	public static function renderTranslatableHeader(&$params, $field)
	{
		return JText::_(
			'MOD_COOLCINEPLAN_HEADER_FIELD_' . str_replace('#__', '', strtoupper($params->get('table'))) . '_' . strtoupper($field)
		);
	}

	/**
	 * Checks if an element should appear in the table/item view
	 *
	 * @param   string $field name of the field
	 *
	 * @return boolean True if it should appear, false otherwise
	 */
	public static function shouldAppear($field)
	{
		$noHeaderFields = array('checked_out_time', 'checked_out', 'ordering', 'state');

		return !in_array($field, $noHeaderFields);
	}

	
}
