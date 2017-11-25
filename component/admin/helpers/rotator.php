<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
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

  }

}
