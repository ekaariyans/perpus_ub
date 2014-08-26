	<?php $tanggal=date("Ymd");
	header("Content-type: application/ms-excel");
	header("Content-Disposition: attachment; filename=Rekap".$tanggal.".xls");
   	$judul="Daftar Permintaan Buku\n";
	echo $judul;
    $header="ID Anggota \t Judul \t Jenis \t Pengarang \t Penerbit \t Tahun Terbit \t Kota \t Edisi \t ISBN \t Keterangan \n";
	echo $header;
	foreach ($data as $model): 
    $content= $model->id_anggota ."\t". $model->judul ."\t". $model->jenis ."\t". $model->pengarang ."\t". $model->penerbit ."\t". $model->tahun_terbit ."\t". $model->kota ."\t". $model->edisi ."\t". $model->isbn ."\t". $model->keterangan ."\n";
	echo $content;
	endforeach;