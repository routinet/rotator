<?php
/**
 * @version    $Id: rquote.php  2/5/2011 
 * @package    Joomla16.rquote
 * @subpackage Components
 * @copyright  Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @author     Kevin Burke
 * @link    http://www.mytidbits.us
 * @license    License GNU General Public License version 2 or later
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');


$listOrder  = $this->escape($this->state->get('list.ordering'));
$listDirn   = $this->escape($this->state->get('list.direction'));

?>

<form action="<?php echo JRoute::_('index.php?option=com_rquote&view=rquotes'); ?>" method="post" name="adminForm" id="adminForm">
<?php if (!empty( $this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
<?php echo $this->sidebar; ?>
</div>

   <div id="j-main-container" class="span10">
<?php else : ?>
   <div id="j-main-container">
<?php endif;?>

<div id="filter-bar" class="btn-toolbar">    
      
   
<div class="filter-search btn-group pull-left">
            <label for="filter_search" class="element-invisible"><?php echo JText::_('COM_RQUOTE_SEARCH_IN_TITLE');?></label>
            <input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('COM_RQUOTE_SEARCH_IN_TITLE'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('COM_RQUOTE_SEARCH_IN_TITLE'); ?>" />
         </div>
         <div class="btn-group pull-left">
            <button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
            <button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
         </div>
         <div class="btn-group pull-right hidden-phone">
            <label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
            
         
</div>
   </div>   
<!--  </fieldset> -->
   <div class="clr"> </div>
   

   
   <table class="table table-striped" id="rquoteList">
      <thead>
         <tr>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_ID', 'id', $listDirn, $listOrder); ?>
            </th>

            <th width="1%">
               <input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
            </th>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_DAILY_NUMBER', 'daily_number', $listDirn, $listOrder); ?>
            </th>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_QUOTE', 'quote', $listDirn, $listOrder); ?>
            </th>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_AUTHOR', 'author', $listDirn, $listOrder); ?>
            </th>
            
            <th width="5%">
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_CATEGORY', 'catid', $listDirn, $listOrder); ?>
            </th>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_NOTES', 'notes', $listDirn, $listOrder); ?>
            </th>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_CREATEDATE', 'createdate', $listDirn, $listOrder); ?>
            </th>

            <th>
               <?php echo JHtml::_('grid.sort', 'COM_RQUOTE_RQUOTE_HEADING_USERNAME', 'user_id', $listDirn, $listOrder); ?>
            </th>

            <th width="5%">
               <?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'published', $listDirn, $listOrder); ?>
            </th>
            
            
         </tr>
      </thead>
      <tfoot>
         <tr>
            <td colspan="10">
               <?php echo $this->pagination->getListFooter(); ?>
            </td>
         </tr>
      </tfoot>
      <tbody>
<?php foreach ($this->items as $i => $item) :
?>
         <tr class="row<?php echo $i % 2; ?>">

            <td class="center">
               <?php echo (int) $item->id; ?>
            </td>

            <td class="center">
               <?php echo JHtml::_('grid.id', $i, $item->id); ?>
            </td>

            <td>
               <a href="<?php echo JRoute::_('index.php?option=com_rquote&task=rquote.edit&id='.(int) $item->id);
                  ?>"><?php echo $this->escape($item->daily_number); ?></a>
            </td>
            
            <td>
               
               <?php $item->quote = strip_tags($item->quote);?>
               <a href="<?php echo JRoute::_('index.php?option=com_rquote&task=rquote.edit&id='.(int) $item->id);
                  ?>"><?php 
                  echo substr($this->escape($item->quote),0,250) ;
                  
               ?></a>
            </td>

            <td>
               <?php $item->author = trim($item->author,'<p></p>');?>
               <a href="<?php echo JRoute::_('index.php?option=com_rquote&task=rquote.edit&id='.(int) $item->id);
                  ?>"><?php echo $this->escape($item->author); ?></a>
            </td>

            <td class="center">
               <a href="<?php echo JRoute::_('index.php?option=com_rquote&task=rquote.edit&id='.(int) $item->id);
                  ?>"><?php echo $this->escape($item->category_title); ?></a>
            </td>

            <td>
               <a href="<?php echo JRoute::_('index.php?option=com_rquote&task=rquote.edit&id='.(int) $item->id);
                  ?>"><?php echo $this->escape($item->notes); ?></a>
            </td>

            <td>
               <?php echo $item->createdate; ?>
            </td>

            <td>
               <?php echo $item->user_title; ?>
            </td>

            <td class="center">
               <?php echo JHtml::_('jgrid.published', $item->published, $i, 'rquotes.');?>
            </td>
            
         </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <div>
      <input type="hidden" name="task" value="" />
      <input type="hidden" name="boxchecked" value="0" />
      <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
      <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
      <?php echo JHtml::_('form.token'); ?>
   </div>
</form>
