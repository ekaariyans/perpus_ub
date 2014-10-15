<?php
//ref: http://www.yiiframework.com/extension/yii-barcode-generator-8-types/#hh2
	$i=0;
	foreach($register as $reg):
	$optionsArray = array(
		'elementId'=>'showBarcode'.$i,
		'value'=>$reg,
		'type' => 'code39',
		//ean8, ean13, upc, std25, int25, code11, code39, code93, code128, codabar, msi, datamatrix
		'settings'=>array(
		   'output'=>'css' /*css, bmp, canvas note- bmp and canvas incompatible wtih IE*/,
		   /*if the output setting canvas*/
		   'posX' => 100,
		   'posY' => 100,
		   /* */
		   //'bgColor'=>'#00FF00', /*background color*/
		   //'color' => '#000000', /*"1" Bars color*/
		   'barWidth' => 2,
		   'barHeight' => 50,   
		   /*-----------below settings only for datamatrix--------------------*/
		   //'moduleSize' => 5,
		   //'addQuietZone' => 0, /*Quiet Zone Modules */
		 ),
		//'rectangular'=> true /* true or false*/
		 /* */
		);
	$this->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
?>
    <?php echo "<div style=\"width:23%; text-align:center; font-size:9px; margin:15px;\" >
				UPT. PERPUSTAKAAN PUSAT
				<div id=\"showBarcode".$i."\" ></div>
				UNIVERSITAS BRAWIJAYA MALANG
				<br />
				</div>" ?>
    <?php $i=$i+1; endforeach; ?>