<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
class RquoteModelRquote extends JModelItem
{
  protected $item;
  public function getItem() 
  {
    if (!isset($this->item)) {
      $id = JRequest::getInt('id');
      // Get a TableObject instance
      $table = $this->getTable('Rquote', 'RquoteTable');
      // Load the rquote
      $table->load($id);
      // Assign the data
      $this->item['id'] = $table->id;
       $this->item['daily_number'] = $table->daily_number;
      $this->item['quote'] = $table->quote;
      $this->item['author'] = $table->author;
      $this->item['catid'] = $table->catid;
      $this->item['notes'] = $table->notes;
      $this->item['published'] = $table->published;
      $this->item['params'] = $table->params;
      $this->item['user_id'] = $table->user_id;
      $this->item['createdate'] = $table->createdate;
    }
    return $this->item;
  }
}
?>
