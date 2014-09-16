	<?php $tanggal=date("Ymd");
	header("Content-type: application/ms-excel");
	header("Content-Disposition: attachment; filename=Rekap".$tanggal.".xls");
   	$judul="Daftar Permintaan Buku\n";
	echo $judul;
    $header="ID Anggota \t Judul \t Jenis \t Pengarang \t Penerbit \t Tahun Terbit \t Bahasa \t ISBN \n";
	echo $header;
	//print_r($data);
	foreach ($data as $model): 
    $content= $model['ID_ANGGOTA'] ."\t". $model['JUDUL'] ."\t". $model['JENIS'] ."\t". $model['PENGARANG'] ."\t". $model['PENERBIT'] ."\t". $model['TAHUN_TERBIT'] ."\t". $model['BAHASA'] ."\t". $model['ISBN'] ."\n";
		//echo $model['ID_ANGGOTA'];
	echo $content;
	endforeach;