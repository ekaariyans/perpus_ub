<?php
//ref: http://www.yiiframework.com/extension/yii-barcode-generator-8-types/#hh2
	$optionsArray = array(
		'elementId'=> 'showBarcode', /* div or canvas id*/
		'value'=> '977687585', /* value for EAN 13 be careful to set right values for each barcode type */
		'type'=>'ean13',/*supported types  ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix*/
	);
	$this->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
?>
	<div id="showBarcode" >fdfdsfsf</div>