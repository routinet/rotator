<?php

/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

if (!defined('DS')) {
  define('DS', DIRECTORY_SEPARATOR);
}

// require helper files
JLoader::registerPrefix('RotatorHelper', JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers');
JLoader::registerPrefix('RotatorModel', JPATH_COMPONENT_ADMINISTRATOR . DS . 'models');
JLoader::registerPrefix('RotatorTable', JPATH_COMPONENT_ADMINISTRATOR . DS . 'tables');

// Special because of integration with com_categories
JLoader::register('RotatorHelper', JPATH_COMPONENT_ADMINISTRATOR . DS . 'helpers' . DS . 'rotator.php');

// Get an instance of the controller.
$controller = \Joomla\CMS\MVC\Controller\BaseController::getInstance('Rotator');

// Perform the task.
$controller->execute(\Joomla\CMS\Factory::getApplication()->input->get('task'));

// Redirect if set by the controller.
$controller->redirect();
