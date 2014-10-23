<!DOCTYPE html>
<html>
<head>
<style type="text/css">
@media print {
    div #header{
        background-color:#000; 
		color:#FFF;
    }
	button,p { display:none; }
	
}
@media screen {
    div #header{
        background-color:#000; 
		color:#FFF;
    }
} 
</style>
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<button onclick="goBack()">Kembali</button>
<p>Tekan Ctrl+P pada keyboard untuk mencetak halaman ini. </p>
<?php
//ref: http://www.yiiframework.com/extension/yii-barcode-generator-8-types/#hh2
	$i=0;
	foreach($register as $reg):
		$command = Yii::app()->db->createCommand("[lentera].[dbo].[sp_get_specloc] @register = '$reg'");
		$specloc=$command->queryRow();
		
		$query = Yii::app()->db->createCommand("[lentera].[dbo].[sp_get_label] @register = '$reg'");
		$label=$query->queryRow();
		
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
		   'barWidth' => 1,
		   'barHeight' => 50,   
		   /*-----------below settings only for datamatrix--------------------*/
		   //7120N38-3
		   'moduleSize' => 5,
		   //'addQuietZone' => 0, /*Quiet Zone Modules */
		 ),
		//'rectangular'=> true /* true or false*/
		 /* */
		);
	$this->widget('ext.Yii-Barcode-Generator.Barcode', $optionsArray);
?>	
	<table>
    <tr>
    <td>
    <?php echo "<div style=\"width:180px; text-align:center; font-size:8px; margin:15px; border:double; padding:10px;\" >
				".strtoupper($specloc['NAME'])."
				<div id=\"showBarcode".$i."\" ></div>
				UNIVERSITAS BRAWIJAYA MALANG
				</div>";
		echo "</td><td>";		
		echo "<div style=\"width:210px; margin:15px; border:double; padding:2px;\" >
				<div id=\"header\" style=\"text-align:center; font-size:8px; padding:4px;\" >
				".strtoupper($specloc['NAME'])."<br />
				UNIVERSITAS BRAWIJAYA MALANG<br />
				</div>
				<div style=\"width:160px; text-align:left; font-size:15px; padding-left:15px; padding-bottom: 7px;\">
				<b>".$label['TYPE_CODE']."</b><br />
				<b>".$label['DEWEY_NO']."</b><br />
				<div style=\"font-size:10px;\"><b>".$label['AUTHOR_CODE']."</b><br />
				<b>".$label['TITLE_CODE']."</b><br />
				<b>k".$label['COPIES']."</b></div>
			  	</div>
			 </div>";
	?>
    </td>
    </tr>
    </table>
    <?php $i=$i+1; endforeach; ?>
 </body>
 </html>