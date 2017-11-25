<?php

/**
 * Rotator component by Steve Binkowski.
 * Central Controller for the extension.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class RotatorController extends \Joomla\CMS\MVC\Controller\BaseController {

  /**
   * display task
   *
   * @return void
   */
  function display($cachable = FALSE, $urlparams = FALSE) {
    $app = \Joomla\CMS\Factory::getApplication();

    // set default view if not set
    $app->input->set('view', $app->input->get('view', 'Blocks'));
    //JRequest::setVar('view', JRequest::getCmd('view', 'Blocks'));

    // call parent behavior
    parent::display($cachable);
  }
}
