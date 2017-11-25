<?php
/**
 * @package     Bink Rotator
 * @subpackage  com_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// no direct access
defined('_JEXEC') or die;

\Joomla\CMS\HTML\HTMLHelper::_('behavior.tooltip');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));

?>
    <h2><?php echo ucfirst($this->getName()); ?></h2>
    <form action="index.php?option=com_rotator&view=blocks" method="post"
          id="adminForm" name="adminForm">
        <div id="j-sidebar-container" class="span2">
          <?php echo $this->sidebar; ?>
        </div>
        <div id="j-main-container" class="span10">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="1%">##</th>
                    <th width="2%"><?php echo JHtml::_('grid.checkall'); ?></th>
                    <th width="5%">Published</th>
                    <th width="10%">Category</th>
                    <th width="15%">Title</th>
                    <th width="40%">Description</th>
                    <th width="10%">Created</th>
                    <th width="1%">ID</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td colspan="7">
                      <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($this->items as $i => $row) { ?>
                    <tr>
                        <td>
                          <?php echo $this->pagination->getRowOffset($i); ?>
                        </td>
                        <td>
                          <?php echo JHtml::_('grid.id', $i, $row->id); ?>
                        </td>
                        <td align="center">
                          <?php echo JHtml::_('jgrid.published', $row->published, $i, 'blocks.', TRUE, 'cb'); ?>
                        </td>
                        <td>
                          <?php
                          $link = JRoute::_('index.php?option=com_categories&extension=com_rotator&task=category.edit&id=' . $row->catid);
                          //echo "<a href=\"{$link}\" title=\"Edit Category\">{$row->cat_name}</a>";
                          echo $row->cat_name;
                          ?>
                        </td>
                        <td>
                          <?php
                          $link = JRoute::_('index.php?option=com_rotator&task=block.edit&id=' . $row->id);
                          echo "<a href=\"{$link}\" title=\"Edit\">{$row->title}</a>";
                          ?>
                        </td>
                        <td><?php echo $row->description; ?></td>
                        <td align="center"><?php echo $row->created; ?>
                        </td>
                        <td><?php echo $row->id; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="boxchecked" value="0"/>
      <?php echo JHtml::_('form.token'); ?>
    </form>
