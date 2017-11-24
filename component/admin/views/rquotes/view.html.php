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

// No direct access to this file
defined('_JEXEC') or die('Restricted access');




class RquoteViewRquotes extends JViewLegacy
{
	protected $items;
	protected $pagination;
	protected $published;
	
public function display($tpl = null) 
	{
		// Initialise variables.
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->published		= $this->get('Published');
		

		RquoteHelper::addSubmenu('rquotes');
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Set the toolbar
		$this->addToolBar();
$this->sidebar = JHtmlSidebar::render();
		// Display the template
		parent::display($tpl);

	
	}

	
	protected function addToolBar() 
	{
		
		

		$state	= $this->get('State');

		JToolBarHelper::title(JText::_('COM_RQUOTE_MANAGER_RQUOTES'), 'rquote');

		JToolBarHelper::addNew('rquote.add', 'JTOOLBAR_NEW');
	
		JToolBarHelper::editList('rquote.edit', 'JTOOLBAR_EDIT');
		
		JToolBarHelper::divider();
		
		JToolBarHelper::custom('rquotes.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
		
		JToolBarHelper::custom('rquotes.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			
		JToolBarHelper::divider();
		
		JToolBarHelper::archiveList('rquotes.archive','JTOOLBAR_ARCHIVE');
			
		JToolBarHelper::deleteList('', 'rquotes.delete', 'JTOOLBAR_DELETE');

		JToolBarHelper::divider();
		
		JToolBarHelper::preferences('com_rquote');
		
		JToolBarHelper::help('RQUOTE_HELP',true);
	 
		 
		 JHtmlSidebar::setAction('index.php?option=com_rquote&view=rquotes');
	
	
	JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_state',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.state'), true)
		);	
		
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_CATEGORY'),
			'filter_category_id',
			JHtml::_('select.options', JHtml::_('category.options', 'com_rquote'), 'value', 'text', $this->state->get('filter.category_id'))
		);
		
	 		
	}
	
 }
