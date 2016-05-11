<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  Search.content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_coolcineplan/router.php';

/**
 * Content search plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  Search.content
 * @since       1.6
 */
class PlgSearchCoolcineplan extends JPlugin
{
	/**
	 * Determine areas searchable by this plugin.
	 *
	 * @return  array  An array of search areas.
	 *
	 * @since   1.6
	 */
	public function onContentSearchAreas()
	{
		static $areas = array(
			'coolcineplan' => 'Coolcineplan'
		);

		return $areas;
	}

	/**
	 * Search content (articles).
	 * The SQL must return the following fields that are used in a common display
	 * routine: href, title, section, created, text, browsernav.
	 *
	 * @param   string  $text      Target search string.
	 * @param   string  $phrase    Matching option (possible values: exact|any|all).  Default is "any".
	 * @param   string  $ordering  Ordering option (possible values: newest|oldest|popular|alpha|category).  Default is "newest".
	 * @param   mixed   $areas     An array if the search it to be restricted to areas or null to search all areas.
	 *
	 * @return  array  Search results.
	 *
	 * @since   1.6
	 */
	public function onContentSearch($text, $phrase = '', $ordering = '', $areas = null)
	{
		$db = JFactory::getDbo();

		if (is_array($areas))
		{
			if (!array_intersect($areas, array_keys($this->onContentSearchAreas())))
			{
				return array();
			}
		}

		$limit = $this->params->def('search_limit', 50);

		$text = trim($text);

		if ($text == '')
		{
			return array();
		}

		$rows = array();

		
//Search Showings.
if ($limit > 0) {
    switch ($phrase) {
        case 'exact':
            $text = $db->quote('%' . $db->escape($text, true) . '%', false);
            $wheres2 = array();
            $wheres2[] = 'a.showingtime LIKE ' . $text;
$wheres2[] = 'a.movie LIKE ' . $text;
            $where = '(' . implode(') OR (', $wheres2) . ')';
            break;

        case 'all':
        case 'any':
        default:
            $words = explode(' ', $text);
            $wheres = array();

            foreach ($words as $word) {
                $word = $db->quote('%' . $db->escape($word, true) . '%', false);
                $wheres2 = array();
                $wheres2[] = 'a.showingtime LIKE ' . $word;
$wheres2[] = 'a.movie LIKE ' . $word;
                $wheres[] = implode(' OR ', $wheres2);
            }

            $where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
            break;
    }

    switch ($ordering) {
        default:
            $order = 'a.id DESC';
            break;
    }

    $query = $db->getQuery(true);

    $query
            ->clear()
            ->select(
                    array(
                        'a.id',
                        'a.id AS title',
                        '"" AS created',
                        'a.id AS text',
                        '"Showing" AS section',
                        '1 AS browsernav'
                    )
            )
            ->from('#__cineplan_showings AS a')
            
            ->where('(' . $where . ')')
            ->group('a.id')
            ->order($order);

    $db->setQuery($query, 0, $limit);
    $list = $db->loadObjectList();
    $limit -= count($list);

    if (isset($list)) {
        foreach ($list as $key => $item) {
            $list[$key]->href = JRoute::_('index.php?option=com_coolcineplan&view=showing&id=' . $item->id, false, 2);
        }
    }

    $rows = array_merge($list, $rows);
}



//Search Showtypes.
if ($limit > 0) {
    switch ($phrase) {
        case 'exact':
            $text = $db->quote('%' . $db->escape($text, true) . '%', false);
            $wheres2 = array();
            $wheres2[] = 'a.showtype LIKE ' . $text;
            $where = '(' . implode(') OR (', $wheres2) . ')';
            break;

        case 'all':
        case 'any':
        default:
            $words = explode(' ', $text);
            $wheres = array();

            foreach ($words as $word) {
                $word = $db->quote('%' . $db->escape($word, true) . '%', false);
                $wheres2 = array();
                $wheres2[] = 'a.showtype LIKE ' . $word;
                $wheres[] = implode(' OR ', $wheres2);
            }

            $where = '(' . implode(($phrase == 'all' ? ') AND (' : ') OR ('), $wheres) . ')';
            break;
    }

    switch ($ordering) {
        default:
            $order = 'a.id DESC';
            break;
    }

    $query = $db->getQuery(true);

    $query
            ->clear()
            ->select(
                    array(
                        'a.id',
                        'a.showtype AS title',
                        '"" AS created',
                        'a.showtype AS text',
                        '"Showtype" AS section',
                        '1 AS browsernav'
                    )
            )
            ->from('#__cineplan_showtypes AS a')
            
            ->where('(' . $where . ')')
            ->group('a.id')
            ->order($order);

    $db->setQuery($query, 0, $limit);
    $list = $db->loadObjectList();
    $limit -= count($list);

    if (isset($list)) {
        foreach ($list as $key => $item) {
            $list[$key]->href = JRoute::_('index.php?option=com_coolcineplan&view=showtype&id=' . $item->id, false, 2);
        }
    }

    $rows = array_merge($list, $rows);
}

		return $rows;
	}
}
