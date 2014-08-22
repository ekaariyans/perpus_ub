<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main2'); ?>
<div class="span-19">
	
<section class="content">

   <?php echo $content; ?>                 
</section><!-- /.content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>