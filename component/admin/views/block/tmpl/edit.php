<?php
/**
 * Rotator component by Steve Binkowski.
 * Edit Template for a single Block.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// Set some form behavior.
\Joomla\CMS\HTML\HTMLHelper::_('behavior.tooltip');
\Joomla\CMS\HTML\HTMLHelper::_('behavior.formvalidation');

// Set the save route.
$this_id    = (int) (empty($this->item->id) ? 0 : $this->item->id);
$com_name   = \Joomla\CMS\Factory::getApplication()->input->get('option');
$save_route = JRoute::_('index.php?option=' . $com_name . '&id=' . $this_id);
?>
<form method="post" name="adminForm" id="adminForm"
      action="<?php echo $save_route; ?>">
    <div class="form-horizontal">
      <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', ['active' => 'general']); ?>
      <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_ROTATOR_GENERAL_TAB_LABEL')); ?>
        <div class="row-fluid">
            <div class="span9">
              <?php echo $this->form->renderFieldset('general'); ?>
            </div>
            <input type="hidden" name="task" value="block.edit"/>
          <?php echo JHtml::_('form.token'); ?>
        </div>
      <?php echo JHtml::_('bootstrap.endTab'); ?>
</form>
