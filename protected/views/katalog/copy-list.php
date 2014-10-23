<!DOCTYPE html>
<html>
<head>
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<?php 	foreach(Yii::app()->user->getFlashes() as $key => $message) {
			if($key == 'success'){
			echo '<div class="alert alert-success" role="alert' . $key . '"> 
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message ."</div>\n";
			}
			elseif($key == 'error'){
			echo '<div class="alert alert-danger" role="alert' . $key . '"> 
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message . "\n".
				$form->errorSummary($data)."</div>\n";
			}
		}
?>
<div class="box box-primary" style="padding:10px 10px 10px 20px;">
	<div class="box-header">
		<h3 class="box-title">ADD COPY</h3>
	</div>
	<div class="box-body">
		
		<?php foreach($data as $dt); ?>
		<form class="form-horizontal" role="form">
		  <div class="form-group">
			<label class="col-sm-2 control-label">GROUP_NO</label>
			<div class="col-sm-10">
			  <p class="form-control-static"><?php echo $dt['GROUP_NO']; ?></p>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword" class="col-sm-2 control-label">REGISTER</label>
			<div class="col-sm-10">
			  <p class="form-control-static"><?php echo $register; ?></p>
			</div>
		  </div>
		</form>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'copy-list-form',
				'enableAjaxValidation'=>false,
				'action'=>Yii::app()->createUrl('Katalog/Add_copy'),
			)); ?>
		
		<h4>List Item</h4>
		<p>
        <input type="hidden" name="groupno" value="<?php echo $dt['GROUP_NO']; ?>">
		 <button type="submit" class="btn btn-success" name="addcopy" id="addcopy">
              <span class="glyphicon glyphicon-plus"></span> Add Copy
         </button></p>
		<?php $this->endWidget(); ?>
		<table id="list" class="table table-bordered table-striped">
			<thead>
				<tr class="heading">
					<th>NO</th>
					<th>REGISTER</th>
					<th>YEAR_PUB</th>
					<th>COPY_NO</th>
					<th>STATUS</th>
					<th>LOKASI</th>
					<th>SPEC LOKASI</th>
					<th>TANGGAL MASUK</th>
					<th>HARGA</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$i=1;
					foreach ($data as $model):
				?>
					<td><?php echo $i;?></td>
					<td><?php echo $model['REGISTER']; ?></td>
					<td><?php echo $model['YEAR_PUB']; ?></td>
					<td><?php echo $model['COPY_NO']; ?></td>
					<td><?php echo $model['STATUS']; ?></td>
					<td><?php echo $model['LOCATION_CODE']; ?></td>
					<td><?php echo $model['SPEC_LOCATION']; ?></td>
					<td><?php echo $model['DATA_ENTRY']; ?></td>
					<td><?php echo $model['PRICE']; ?></td>
					<td>
								<a href class="glyphicon glyphicon-list-alt" id="<?php echo $model['REGISTER'] ?>" name="detailbuku"></a>
								&nbsp;&nbsp;&nbsp;
								<a href class="glyphicon glyphicon-pencil" id="<?php echo $model['REGISTER'] ?>" name="editbuku"></a>
							</td>
					</tr>
			<?php $i++; endforeach; ?>
			</tbody>
		</table>
		
		<p></p>
		<p>
		<button onclick="goBack()" type="submit" class="btn btn-danger" name="addcopy" id="addcopy">
              <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Kembali
		</button>
		</p>
	</div>
</div>