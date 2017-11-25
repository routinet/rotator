<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

defined('_JEXEC') or die;

class RotatorModelBlocks extends RotatorModelBaseList {

  protected $_table_name = 'blocks';

  protected function addQueryRelations(&$query) {
    $query->join('LEFT', "#__categories cat on cat.id=main.catid")
      ->select(["cat.title as cat_name"]);

    $catid = $this->getState('filter.category_id', 0);
    if ($catid) {
      $this->filter_fields['catid'] = $catid;
    }

    $pub = $this->getState('filter.pub', NULL);
    error_log("pub=".var_export($pub,1));
    if (!is_null($pub) && $pub !== '*' & $pub !== '') {
      $this->setFilter('published', $pub);
    }
  }

  protected function populateState($ordering = NULL, $direction = NULL) {
    $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
    $this->setState('filter.search', $search);

    $published = $this->getUserStateFromRequest($this->context . '.filter.pub', 'filter_pub', '', 'string');
    $this->setState('filter.pub', $published);

    $categoryId = $this->getUserStateFromRequest($this->context . '.filter.category_id', 'filter_category_id', '');
    $this->setState('filter.category_id', $categoryId);
  }

}
