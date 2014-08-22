 <section class="content">

				<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Daftar Anggota</h3>                                    
                                </div><!-- /.box-header -->	
    <h2>Daftar Permintaan Buku</h2>
<?php    
	
	echo CHtml::link('Cetak dokumen',array('cetak/cetak'));
?>
	<table id="example2" class="table table-bordered table-striped">
    <thead>
                                            <tr>
                                                <th>ID Anggota</th>
    <th>Judul</th>
    <th>Jenis</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Tahun Terbit</th>
    <th>Kota</th>
    <th>Edisi</th>
    <th>ISBN</th>
    <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                         <tbody>
    <?php foreach ($data as $model): ?>
    <tr>
    <td><?php echo $model->id_anggota; ?></td>
    <td><?php echo $model->judul; ?></td>
    <td><?php echo $model->jenis; ?></td>
    <td><?php echo $model->pengarang; ?></td>
    <td><?php echo $model->penerbit; ?></td>
    <td><?php echo $model->tahun_terbit; ?></td>
    <td><?php echo $model->kota; ?></td>
    <td><?php echo $model->edisi; ?></td>
    <td><?php echo $model->isbn; ?></td>
    <td><?php echo $model->keterangan; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
             
         <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>