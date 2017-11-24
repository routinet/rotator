<?php
defined('_JEXEC') or die;

class RquoteModelPreview extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'quote', 'a.quote',
				'author', 'a.author',
	
			);
		}

		parent::__construct($config);
	}

	protected function getListQuery()
	
	{
		
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		$query->select(
			$this->getState(
				'list.select',
		//		'a.*' 
				'a.id, a.quote ,a.author' 
	
			)
		);
		
		$query->from($db->quoteName('#__rquote').' AS a');

		$query->where('(a.published IN (0, 1))');
// Add the list ordering clause.
		$query->order($db->escape($this->getState('list.ordering', 'a.id')) . ' ' . $db->escape($this->getState('list.direction', 'DESC')));
$query->setLimit('count'
);

//echo $query;
		return $query;
	}
}
