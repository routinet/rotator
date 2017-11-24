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

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * General Controller of Rquote component
 */
class RquoteController extends JControllerLegacy
{
	/**
	 * display task
	 *
	 * @return void
	 */
//	function display($cachable = false) 
	function display($cachable = false, $urlparams = false)
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Rquotes'));

		// call parent behavior
		parent::display($cachable);

		// Set the submenu
//		RquoteHelper::addSubmenu('messages');
	}
}
