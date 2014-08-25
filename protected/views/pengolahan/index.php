<?php
/* @var $this PengolahanController */

$this->breadcrumbs=array(
	'Pengolahan',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	    <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
        'name'=>'publishDate',
        // additional javascript options for the date picker plugin
        'options'=>array(
            'showAnim'=>'fold',
        ),
        'htmlOptions'=>array(
            'style'=>'height:20px;'
        ),
    ));
    ?>
</p>
