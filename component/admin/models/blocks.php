<?php
/**
 * Rotator component by Steve Binkowski.
 * Model for a list of Blocks.
 */

defined('_JEXEC') or die;

/*
 *   `id`           INT(11)             NOT NULL AUTO_INCREMENT,
  `catid`        INT(11)             NOT NULL DEFAULT '0',
  `title`        TEXT                NOT NULL,
  `description`  TEXT                NOT NULL,
  `content`      TEXT                NOT NULL,
  `content_type` VARCHAR(20)         NOT NULL DEFAULT 'html',
  `params`       TEXT                NOT NULL,
  `published`    TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  `created_by`   INT(11)             NOT NULL DEFAULT 0,
  `created`      TIMESTAMP                    DEFAULT CURRENT_TIMESTAMP,

 */

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
