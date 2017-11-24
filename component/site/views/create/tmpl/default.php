<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

//echo $this->user_id;

if(!$this->user_id)
	{
		JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));
	}

?>

<form method="POST" action="<?php echo RQuoteHelper::getAddPostLink(); ?>"
    id="com_rquote_create_form">
 
   
 

<h1><?php echo JText::_('COM_RQUOTE_ADD'); ?></h1>
  <fieldset>
    <legend><?php //echo JText::_('COM_RQUOTE_QUOTE'); ?></legend>
      <?php echo JHTML::_( 'form.token' ); ?>
       
      
      
      
     
      <input type="hidden" name="task" value="<?php echo $this->task; ?>" />
      <input type="hidden" name="Itemid" value="<?php echo JRequest::getInt('Itemid'); ?>" />
      <input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />
      <input type="hidden" name="published" value="<?php echo JRequest::getInt('published'); ?>" />
      <label class="com_rquote_create_input_label">
      <?php echo JText::_('COM_RQUOTE_QUOTE'); ?>

 			<textarea class="text_area" cols="40" rows="4"  name="quote" id="quote"> <?php echo $this->quote; ?></textarea>	
      </label>
      
      <label class="com_rquote_create_input_label">
        <span><?php echo JText::_('COM_RQUOTE_AUTHOR'); ?></span>
        
          <textarea class="text_area" cols="40" rows="2"  name="author" id="quote"> <?php echo $this->author; ?></textarea>	
      </label>
      <input type="submit" name="save" value="Add" />
  </fieldset>
</form>
<?php
