<?php
/**
 * @package     Bink Rotator
 * @subpackage  mod_rotator
 *
 * @copyright   Copyright (C) 2017 Steve Binkowski.  All Rights Reserved.
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="<?php echo implode(' ', $container_classes); ?>">
<?php foreach ($items as $block) { ?>
<div class="rotator-block">
  <?php if ($params->get('content_first', 1)) { ?>
    <div class="rotator-content"><?php echo $block->content; ?></div>
  <?php } ?>
  <?php if ($params->get('show_title', 0)) { ?>
  <div class="rotator-title"><?php echo $block->title; ?></div>
  <?php } ?>
  <?php if (!$params->get('content_first', 1)) { ?>
    <div class="rotator-content"><?php echo $block->content; ?></div>
  <?php } ?>
  <?php if ($params->get('show_desc', 0)) { ?>
  <div class="rotator-description"><?php echo $block->description; ?></div>
  <?php } ?>
</div>
<?php } ?>
</div>
