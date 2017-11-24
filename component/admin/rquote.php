<?php

/**
 * @version		$Id: rquote.php  6/26/2011 
 * @package		Joomla16.rquote
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author		Kevin Burke
 * @link		http://www.mytidbits.us
 * @license		License GNU General Public License version 2 or later
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

if(!defined('DS')){
define('DS',DIRECTORY_SEPARATOR);
//error_reporting(0);
}

// require helper file
JLoader::register('RquoteHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'rquote.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Rquote
$controller = JControllerLegacy::getInstance('Rquote');

// Perform the Request task
//line changed to fix k2 conflict
//$controller->execute(JRequest::getCmd('task'));
$controller->execute(JFactory::getApplication()->input->get('task'));
// Redirect if set by the controller
$controller->redirect();
