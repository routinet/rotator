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
defined('_JEXEC') or die;

/**
 * Rquote component helper.
 */
abstract class RquoteHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
//public static function addSubmenu($vName = 'rquotes')
	{
		JHtmlSidebar::addEntry(JText::_('COM_RQUOTE_SUBMENU_MESSAGES'), 'index.php?option=com_rquote', $submenu == 'messages');
		JHtmlSidebar::addEntry(JText::_('COM_RQUOTE_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_rquote', $submenu == 'categories');
		JHtmlSidebar::addEntry(JText::_('COM_RQUOTE_SUBMENU_PREVIEW'), 'index.php?option=com_rquote&view=preview&extension=com_rquote', $submenu == 'preview');
		// set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-rquote {background-image: url(../media/com_rquote/images/rquote-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_RQUOTE_ADMINISTRATION_CATEGORIES'));
		}
		
	}
	/**
	 * Get the actions
	 */
	public static function getActions($messageId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		if (empty($messageId)) {
			$assetName = 'com_rquote';
		}
		else {
			$assetName = 'com_rquote.message.'.(int) $messageId;
		}

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete','core.edit.state','core.edit.filter_categoty_id'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
}
