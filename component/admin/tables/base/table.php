<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2016 Steve Binkowski.  All Rights Reserved.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Location Table class
 *
 * @since  0.0.1
 */
class RotatorTableBaseTable extends \Joomla\CMS\Table\Table {

  /**
   * @var string
   * @since 0.0.1
   */
  protected $_table_name = '';

  /**
   * @var string
   * @since 0.0.1
   */
  protected $_table_prefix = 'rotator';

  /**
   * An array of fields, e.g. `active`, which are boolean fields presented
   * as field type "checkbox".  The default table class does not properly
   * handle setting a false state.
   *
   * @see   NyccEventsTableBaseTable->_convertBoolIntFields()
   * @var array
   * @since 0.0.1
   */
  protected $boolint_fields = [];

  /**
   * Constructor
   *
   * @since   0.0.1
   * @throws  RuntimeException
   *
   * @param   JDatabaseDriver &$db A database connector object
   */
  public function __construct(&$db) {
    if (!$this->_table_name) {
      throw new RuntimeException(get_called_class() . " failed to identify its table");
    }
    $prefix = $this->_table_prefix ? "{$this->_table_prefix}_" : '';
    parent::__construct("#__{$prefix}{$this->_table_name}", 'id', $db);
  }

  /**
   * Takes submitted form data and sets missing checkbox fields to zero.
   * This is necessary because the JTable does not properly detect
   * missing checkbox fields, i.e., checkboxes left unchecked.
   *
   * @param $src
   *
   * @return mixed
   *
   * @since version
   */
  protected function _convertBoolIntFields($src) {
    foreach ($this->boolint_fields as $val) {
      if (!array_key_exists($val, $src)) {
        $src[$val] = 0;
      }
    }
    return $src;
  }

  /**
   * @param  array|object $src
   * @param  array        $ignore
   *
   * @return bool
   *
   * @since  0.0.1
   */
  public function bind($src, $ignore = []) {
    return parent::bind($this->_convertBoolIntFields($src), $ignore);
  }

  /**
   * An abstract of the query generation code from parent::load().  This
   * allows calling code to get the base query, and alter it (e.g., with
   * relational joins) prior to calling.
   *
   * @see   JTable::load()
   *
   * @param mixed $keys
   *   An optional primary key value to load the row by, or an array of fields
   *   to match. If not set the instance property value is used.
   *
   * @return \JDatabaseQuery|false
   *
   * @since 0.0.1
   */
  public function getTableQuery($keys = NULL) {
    // Standardize the passed keys
    $keys = $this->resolveKeys($keys);

    // Generate the base query for this table.
    $query  = $this->_db->getQuery(TRUE)
      ->select('main.*')
      ->from("{$this->_tbl} as main");
    $fields = array_keys($this->getProperties());


    foreach ($keys as $field => $value) {
      // Check that $field is in the table.
      if (!in_array($field, $fields)) {
        throw new UnexpectedValueException(sprintf('Missing field in database: %s &#160; %s.', get_class($this), $field));
      }
      // Add the search tuple to the query.
      $query->where('main.' . $this->_db->quoteName($field) . ' = ' . $this->_db->quote($value));
    }

    return $query;
  }

  /**
   * Overrides parent::load() in order to abstract the query generation to a
   * separate method.  This is necessary to allow for generating the base query
   * for a table, and allowing other calling code to alter the table, e.g.,
   * to add relational joins, etc.
   *
   * @param   mixed   $keys    An optional primary key value to load the row
   *                           by, or an array of fields to match. If not set
   *                           the instance property value is used.
   * @param   boolean $reset   True to reset the default values before loading
   *                           the new row.
   *
   * @return  boolean  True if successful. False if row not found.
   *
   * @since   0.0.1
   */
  public function load($keys = NULL, $reset = TRUE) {
    // Implement JObservableInterface: Pre-processing by observers
    $this->_observers->update('onBeforeLoad', [$keys, $reset]);

    if ($reset) {
      $this->reset();
    }

    $query = $this->getTableQuery($keys);

    // if query===false, there was nothing to load/no query built
    if ($query === FALSE) {
      return TRUE;
    }

    $this->_db->setQuery($query);

    $row = $this->_db->loadAssoc();

    // Check that we have a result.
    if (empty($row)) {
      $result = FALSE;
    }
    else {
      // Bind the object with the row and return.
      $result = $this->bind($row);
    }

    // Implement JObservableInterface: Post-processing by observers
    $this->_observers->update('onAfterLoad', [&$result, $row]);

    return $result;
  }

  /**
   * An abstraction of the code identifying primary key search values.
   *
   * @see   JTable::load()
   *
   * @param mixed $keys
   *   An optional primary key value to load the row by, or an array of fields
   *   to match. If not set the instance property value is used.
   *
   * @return mixed
   *
   * @since 0.0.1
   */
  public function resolveKeys($keys = NULL) {
    // If the key is empty, check to see if the current key is populated.
    // If yes, use it.  If not, leave - nothing to load.
    if (empty($keys)) {
      $keys = [];
      foreach ($this->_tbl_keys as $key) {
        if (!empty($this->$key)) {
          $keys[$key] = $this->$key;
        }
      }
      if (!count($keys)) {
        return TRUE;
      }
    }
    // If keys is not an array, try to load by the primary key.  If there
    // are multiple PK fields, or none, something has gone wrong.
    elseif (!is_array($keys)) {
      $keyCount = count($this->_tbl_keys);
      if ($keyCount) {
        if ($keyCount > 1) {
          throw new InvalidArgumentException('Table has multiple primary keys specified, only one primary key value provided.');
        }
        $keys = [$this->getKeyName() => $keys];
      }
      else {
        throw new RuntimeException('No table keys defined.');
      }
    }

    return $keys;
  }
}
