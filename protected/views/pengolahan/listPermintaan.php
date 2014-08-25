	<h2>Daftar Permintaan Buku</h2>
<?php    echo CHtml::link('Form Permintaan',array('pengolahan/formPermintaan')); ?>
	<table class="table table-striped">
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
	</table>
