	<?php 
	$tanggal=date("Ymd");
	header("Content-type: application/ms-excel");
	
	//jika buku
	if($status == 'bd1' || $status == 'sd1'){
		if($status=='bd1'){
			header("Content-Disposition: attachment; filename=Rekap Permintaan Buku ".$tanggal.".xls");
			$judul = "Daftar Permintaan Buku\n";
		}
		else{
			header("Content-Disposition: attachment; filename=Rekap Permintaan Buku Sudah Dibeli ".$tanggal.".xls");
			$judul = "Daftar Permintaan Buku Sudah Dibeli\n";
		}
		
		$header="ID Anggota \t Judul \t Jenis \t Pengarang \t Penerbit \t Tahun Terbit \t Bahasa \t ISBN \t Status \t Prioritas  \n";
		echo $judul;
		echo $header;
		foreach ($data as $model): 
		$content= 	$model['ID_ANGGOTA'] ."\t". 
					$model['JUDUL'] ."\t". 
					$model['JENIS'] ."\t". 
					$model['PENGARANG'] ."\t". 
					$model['PENERBIT'] ."\t". 
					$model['TAHUN_TERBIT'] ."\t". 
					$model['BAHASA'] ."\t". 
					$model['ISBN'] ."\t".
					$model['STATUS'] ."\t".
					$model['PRIORITAS'] ."\n";
		echo $content;
		endforeach;
	}
	
	//jika jurnal
	else if($status == 'bd2' || $status == 'sd2'){
		if($status=='bd2'){
			header("Content-Disposition: attachment; filename=Rekap Permintaan Jurnal ".$tanggal.".xls");
			$judul = "Daftar Permintaan Jurnal\n";
		}
		else{
			header("Content-Disposition: attachment; filename=Rekap Permintaan Jural Sudah Dibeli ".$tanggal.".xls");
			$judul = "Daftar Permintaan Jurnal Sudah Dibeli\n";
		}
		
		$header="ID Anggota \t Nama Peminta \t Judul \t Pengarang \t Jenis \t Bahasa \t Harga \t Link Website \t Status \t Prioritas \n";
		echo $judul;
		echo $header;
		foreach ($data as $model): 
		$content= 	$model['ID_ANGGOTA'] ."\t". 
					$model['NAMA_PEMINTA'] ."\t". 
					$model['JUDUL'] ."\t". 
					$model['PENGARANG'] ."\t". 
					$model['JENIS'] ."\t".  
					$model['BAHASA'] ."\t".
					$model['HARGA'] ."\t".					
					$model['LINK_WEBSITE'] ."\t".
					$model['STATUS'] ."\t".
					$model['PRIORITAS'] ."\n";
		echo $content;
		endforeach;
	}
	
	//jika serial 
	else if($status == 'bd3' || $status == 'sd3'){
	}