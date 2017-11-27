<?php
/**
 * @package     Bink Rotator
 * @subpackage  mod_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

//no direct access
defined('_JEXEC') or die('Restricted access');

if (!defined('DS')) {
  define('DS', DIRECTORY_SEPARATOR);
}

// Add the helper class.
JLoader::register('ModRotatorHelper', __DIR__ . '/helper.php');

// Get the items.
$items = ModRotatorHelper::getItems($params);

// Classes for the module container.
$container_classes = ['rotator-container'];

// If Owl integration is requested, add the JS and CSS.
if ($params->get('owl_integration', 0)) {
  ModRotatorHelper::addOwlIntegration($params);

  // Also add the necessary classes to the container.
  $container_classes[] = 'owl-carousel';
  if ($params->get('owl_theme', 0)) {
    $container_classes[] = 'owl-theme';
  }
}

require JModuleHelper::getLayoutPath('mod_rotator', $params->get('layout', 'default'));
