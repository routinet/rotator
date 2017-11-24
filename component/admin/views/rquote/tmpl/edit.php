<?php
/**
 * @version		$Id: rquote.php  2/5/2011 
 * @package		Joomla16.rquote
 * @subpackage	Components
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author		Kevin Burke
 * @link		http://www.mytidbits.us
 * @license		License GNU General Public License version 2 or later
 */
// No direct access
defined('_JEXEC') or die('Restricted access');
//JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
//$params = $this->form->getFieldsets('params');
?>

<form action=  "<?php //echo JRoute::_('index.php?option=com_rquote&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">

		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', empty($this->item->id) ? JText::_			('COM_NEW_RQUOTE', true) : JText::sprintf('COM_EDIT_RQUOTE', $this->item->id, true)); ?>
		
			

	

	
	<div class="span8 ">
	
			<?php echo $this->form->getLabel('quote'); ?>
			<?php echo $this->form->getInput('quote'); ?>
			
			
	</div>
 <div class="span1"> </div>
	<div class="span3 ">
	
	<?php echo $this->form->getLabel('author'); ?>
			 	<?php echo $this->form->getInput('author'); ?>
		
			<?php echo $this->form->getLabel('daily_number'); ?>
				<?php echo $this->form->getInput('daily_number'); ?>

				<?php echo $this->form->getLabel('catid'); ?>
				<?php echo $this->form->getInput('catid'); ?>

				<?php echo $this->form->getLabel('published'); ?>
				<?php echo $this->form->getInput('published'); ?>
				
				<?php echo $this->form->getLabel('createdate'); ?>
				<?php echo $this->form->getInput('createdate'); ?>

				<?php echo $this->form->getLabel('user_id'); ?>
				<?php echo $this->form->getInput('user_id'); ?>

				
			 	
			 	<?php echo $this->form->getLabel('notes'); ?>
				<?php echo $this->form->getInput('notes'); ?>
	</div>	
	
		<input type="hidden" name="task" value="rquote.edit" />
		<?php echo JHtml::_('form.token'); ?>
	
</form>

