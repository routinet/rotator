<?php

/**
 * Rotator component by Steve Binkowski.
 * Helper Class.
 */

// No direct access to this file
defined('_JEXEC') or die;

abstract class RotatorHelper {

  /**
   * Create the sidebar menu for the admin panel.
   */
  public static function addSubmenu($submenu) {
    $menu_options = [
      'COM_ROTATOR_SUBMENU_BLOCKS'     => [
        'link' => 'option=com_rotator',
        'title' => 'COM_ROTATOR_ADMIN_LABEL_BLOCKS',
      ],
      'COM_ROTATOR_SUBMENU_CATEGORIES' => [
        'link' => 'option=com_categories&view=categories&extension=com_rotator',
        'title' => 'COM_ROTATOR_ADMIN_LABEL_CATEGORIES',
      ],
    ];

    foreach ($menu_options as $key => $val) {
      $link = isset($val['link']) ? "?{$val['link']}" : '';
      $label = strtolower(\Joomla\CMS\Language\Text::_($key));

      JHtmlSidebar::addEntry(
        \Joomla\CMS\Language\Text::_($key),
        "index.php$link",
        $submenu == $label
      );
    }

    // TODO: remove?
    //JHtmlSidebar::addEntry(JText::_('COM_RQUOTE_SUBMENU_PREVIEW'), 'index.php?option=com_rquote&view=preview&extension=com_rquote', $submenu == 'preview');
  }

  /**
   * Get the actions
   */
  // TODO: not sure if this is necessary.  Did original allow public create?
  /*
   *
  public static function getActions($messageId = 0) {
    $user   = JFactory::getUser();
    $result = new JObject;

    if (empty($messageId)) {
      $assetName = 'com_rquote';
    }
    else {
      $assetName = 'com_rquote.message.' . (int) $messageId;
    }

    $actions = [
      'core.admin',
      'core.manage',
      'core.create',
      'core.edit',
      'core.delete',
      'core.edit.state',
      'core.edit.filter_categoty_id',
    ];

    foreach ($actions as $action) {
      $result->set($action, $user->authorise($action, $assetName));
    }

    return $result;
  }
  */
}
