<?php
/**
 * @package     Bink Rotator
 * @subpackage  mod_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

//no direct access
defined('_JEXEC') or die('Restricted access');

class ModRotatorHelper {

  public static function getItems($params) {
    // Get the desired category.
    $catid = $params->get('catid',0);

    // Get the database and a new query.
    $db = \Joomla\CMS\Factory::getDbo();
    $query = $db->getQuery(true);

    // Set the query.
    $query->select('main.*')
      ->from($query->quoteName("#__rotator_blocks") . ' as main')
      ->where('main.published=1');

    // If a category was selected, add it as a filter.
    if ($catid) {
      $query->where("main.catid='$catid'");
    }

    // Execute and return the results.
    $db->setQuery($query);
    return $db->loadObjectList();
  }

  public static function addOwlIntegration($params) {
    // Make sure jQuery is loaded.
    \Joomla\CMS\HTML\HTMLHelper::_('behavior.framework', TRUE);
    \Joomla\CMS\HTML\HTMLHelper::_('bootstrap.framework');

    // Create the base path to the module.
    $base_path = \Joomla\CMS\Uri\Uri::base() . 'modules/mod_rotator';

    // Add Owl carousel to the document.
    $doc = \Joomla\CMS\Factory::getDocument();
    $doc->addScript($base_path . '/assets/owl/owl.carousel.js');

    // Add the theme, if necessary.
    if ($params->get('owl_theme', 1)) {
      $doc->addStyleSheet($base_path . '/assets/owl/owl.carousel.css');
      $doc->addStyleSheet($base_path . '/assets/owl/owl.theme.default.css');
    }

    // Add the custom init parameters to the Joomla JS options.
    $owl = '{' . $params->get('owl_params', '') . '}';
    $owl_json = json_decode(str_replace(['{{', '}}'], ['{', '}'], $owl), true);
    $doc->addScriptOptions('mod_rotator_owl_integration', $owl_json);

    // Include an initialization script.
    $owl_script = "jQuery(document).ready(function () {" .
      "var owlOptions = Joomla.getOptions('mod_rotator_owl_integration')," .
      "mod_rotator_owl = jQuery('.rotator-container.owl-carousel');" .
      "mod_rotator_owl.owlCarousel(owlOptions);" .
      "});";
    $doc->addScriptDeclaration($owl_script);
  }
}