<?php
/**
 * @version		$Id: rquote.php  2/5/2011 
 * @package		Joomla16.rquote
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author		Kevin Burke
 * @link		http://www.mytidbits.us
 * @license		License GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

//jimport('joomla.application.component.modellist');


class RquoteModelRquotes extends JModelList
{
	
	
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id', 'a.id',
				'quote', 'a.quote',
				'catid', 'a.catid', 'category_title',
				'state', 'a.state',
				'published', 'a.published',
				'daily_number','a.daily_number',
				'author','a.author',
				'notes','a.notes',
				'display_date','a.display_date',
				'createdate','a.modified',
				'user_id','a.user_id'
			);
		}

		parent::__construct($config);
	}
	
	
	
	protected function populateState($ordering = null, $direction = null)
	{
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);


		$published = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
		$this->setState('filter.state', $published);

		$categoryId = $this->getUserStateFromRequest($this->context.'.filter.category_id', 'filter_category_id', '');
		$this->setState('filter.category_id', $categoryId);


		// Load the parameters.
//		$params = JComponentHelper::getParams('com_rquote');
//		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.quote', 'asc');
	}

	
	
	protected function getListQuery()
	{
		// Create a new query object.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		// Select the required fields from the table.
		$query->select($this->getState('list.select','a.*'));
		$query->from('`#__rquote` AS a');
				
		// Join over the categories.
		$query->select('c.title AS category_title');
		$query->join('LEFT', '#__categories AS c ON c.id = a.catid');
		// Join over the user_name.
		$query->select('u.name AS user_title');
		$query->join('LEFT', '#__users AS u ON u.id = a.user_id');
		// Filter by published state
		$published = $this->getState('filter.state');
		if (is_numeric($published))
		{
			$query->where('a.published = '.(int) $published);
		} elseif ($published === '')
		{
			$query->where('(a.published IN (0, 1))');
		}

		// Filter by category.
		$categoryId = $this->getState('filter.category_id');
		if (is_numeric($categoryId)) {
			$query->where('a.catid = '.(int) $categoryId);
		}

		// Filter by search in title
		$search = $this->getState('filter.search');
		if (!empty($search))
		{
			if (stripos($search, 'id:') === 0)
			{
				$query->where('a.id = '.(int) substr($search, 3));
			} else {
				$search = $db->Quote('%'.$db->escape($search, true).'%');
				$query->where('(a.quote LIKE '.$search.' OR a.author LIKE '.$search.')');
			}
		}

	
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');

//		$query->order($db->getEscaped($orderCol.' '.$orderDirn));
$query->order($db->escape($orderCol.' '.$orderDirn));
//$query->order= JDatabase->escape($orderCol.' '.$orderDirn) ;
//	echo nl2br(str_replace('#__','jos_',$query)); 
		
		return $query;
	}
}
