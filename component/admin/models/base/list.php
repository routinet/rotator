<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * NyccEventList Model
 *
 * @since  0.0.1
 */
class RotatorModelBaseList extends \Joomla\CMS\MVC\Model\ListModel {
  /**
   * The physical table name for this model
   *
   * @var string
   * @since 0.0.1
   */
  protected $_table_name = '';

  protected $_table_prefix = 'rotator';

  /**
   * NyccEventsModelBaseList constructor.
   *
   * @param array $config
   * @since 0.0.1
   */
  public function __construct(array $config) {
    if (!$this->_table_name) {
      throw new RuntimeException(get_called_class() . " failed to identify its table");
    }
    parent::__construct($config);
  }

  /**
   * Sets a filter parameter.  If the filter parameter already exists, it
   * will be overwritten with the new value.  This can effectively erase a
   * filter if the new value is NULL - it will not be considered active.
   *
   * @param      $filter_name
   * @param null $filter_value
   *
   *
   * @since 0.0.1
   */
  public function setFilter($filter_name, $filter_value = NULL) {
    $this->filter_fields[$filter_name] = $filter_value;
  }

  public function getFilters() {
    return $this->filter_fields;
  }

  /**
   * Override in child to modify the query object
   *
   * @param JDatabaseQuery object
   * @since 0.0.1
   */
  protected function addQueryRelations(&$query) {

  }

  /**
   * Method to build an SQL query to load the list data.
   * TODO: this method should use $this->state properly..  hrrmm.. maybe not..
   * TODO: State is only populated on construct.  This method allows for
   * TODO: dynamic alterations of filter_fields.  Maybe a combination of both
   * TODO: in a cascade?
   *
   * @since  0.0.1
   * @return      string  An SQL query
   */
  protected function getListQuery() {
    // Initialize variables.
    $query = $this->_db->getQuery(true);

    // Create the base select statement.
    $prefix = $this->_table_prefix ? "{$this->_table_prefix}_" : '';
    $query->select('main.*')->from($query->quoteName("#__{$prefix}{$this->_table_name}") . ' as main');

    $this->addQueryRelations($query);

    if ($this->filter_fields) {
      $query = RotatorHelperUtils::addFilterConditions($query, $this->filter_fields);
    }

    return $query;
  }
}