<?php
defined('_JEXEC') or die;
?>

<?php if (!empty( $this->sidebar)) : ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
<?php else : ?>
	<div id="j-main-container">
<?php endif;?>
		<div class="clearfix"> </div>
		
		<div class="rquote_element">

			<?php foreach ($this->items as $i => $item) : ?>
				<div class="myRquote">
					<div class="rquote_quote">
						<?php echo $item->quote; ?>
					</div>

					
					<div class="rquote_author">
						<strong><?php echo $item->author; ?></strong>
					</div>
					<div class="rquote_element">
						
					</div>
					
					<hr>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</form>