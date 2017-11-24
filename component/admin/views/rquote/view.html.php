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

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * Rquote View
 */
class RquoteViewRquote extends JViewLegacy
{
	protected $state;
	protected $item;
	protected $form;

	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		$script = $this->get('Script');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
		$this->script = $script;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		JRequest::setVar('hidemainmenu', true);
		$user = JFactory::getUser();
		$isNew = $this->item->id == 0;

		JToolBarHelper::title($isNew ? JText::_('COM_RQUOTE_NEW_RQUOTE') : JText::_('COM_RQUOTE_EDIT_RQUOTE'), 'rquote');
		// Built the actions for new and existing records.
		if ($isNew) 
		{
			// For new records, check the create permission.
			JToolBarHelper::apply('rquote.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('rquote.save', 'JTOOLBAR_SAVE');
			JToolBarHelper::custom('rquote.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);

			JToolBarHelper::cancel('rquote.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{

			// We can save the new record
			JToolBarHelper::apply('rquote.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('rquote.save', 'JTOOLBAR_SAVE');

					
			JToolBarHelper::custom('rquote.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);

			JToolBarHelper::custom('rquote.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);

			JToolBarHelper::cancel('rquote.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	
	protected function setDocument() 
	{
		$isNew = $this->item->id == 0;
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_RQUOTE_RQUOTE_CREATING') : JText::_('COM_RQUOTE_RQUOTE_EDITING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_rquote/views/rquote/submitbutton.js");
		JText::script('COM_RQUOTE_RQUOTE_ERROR_UNACCEPTABLE');
	}
}
