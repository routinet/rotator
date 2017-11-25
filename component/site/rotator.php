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

// import joomla controller library
jimport('joomla.application.component.controller');
if(!defined('DS')){
define('DS',DIRECTORY_SEPARATOR);
//error_reporting(0);
}
require_once(JPATH_COMPONENT.DS.'helper.php');

//get style sheets
$document = JFactory::getDocument();
$cssFile='./media/com_rquote/css/rquote.css';
$document->addStyleSheet($cssFile);

// Get an instance of the controller prefixed by Rquote
$controller = JControllerLegacy::getInstance('Rquote');

// Perform the Request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
