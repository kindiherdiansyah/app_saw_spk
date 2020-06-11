<?php 
include '../inc/config.php';
#set data id dan data tabel
// aksi hapus data
if ($_GET['aksi']==='hapus') {
	// hapus data tarif
	$table = $_GET['data'];
	$id = $_GET['id'];
	if ($_GET['data']==='tbl_tarif') {
		
		$query = "DELETE FROM $table WHERE id=$id";
		$result = mysqli_query($konek, $query);
		if ($result) {
			echo "<script>
									alert('Data Tarif berhasil dihapus');
									document.location='tarif.php';
								</script>";
		}
		// hapus data himpunan
	}elseif ($_GET['data']==='tbl_himpunan') {
		$query = "DELETE FROM $table WHERE id=$id";
		$result = mysqli_query($konek, $query);
		if ($result) {
			echo "<script>
									alert('Data Himpunan berhasil dihapus');
									document.location='himpunan.php';
								</script>";
		}
	}elseif ($_GET['data']==='tbl_klasifikasi') {
		$query = "DELETE FROM $table WHERE id=$id";
		$result = mysqli_query($konek, $query);
		if ($result) {
			echo "<script>
									alert('Data Klasifikasi berhasil dihapus');
									document.location='klasifikasi.php';
								</script>";
		}
	}
	// aksi tambah data
}elseif ($_GET['aksi']==='tambah') {
	if ($_GET['data']==='tarif') {
		$idP 		= $_POST['id_tarif'];
		$tarif 	=  $_POST['tarif'];
		// $jk 			= $_POST['jk'];
		// $agama	= $_POST['agama'];
		// $alamat	= $_POST['alamat'];
		// $email	= $_POST['email'];
		// $no_telp	= $_POST['no_telp'];
		// $status_kawin = $_POST['status_kawin'];
		// $pendidikan_terakhir	= $_POST['pendidikan_terakhir'];

		$sql = "INSERT INTO tbl_tarif (id_tarif, tarif)
		VALUES ('$idP', '$tarif')";

		if ($konek->query($sql) === TRUE) {
		    echo "<script>window.alert('Data kriteria berhasil ditambah');
		         window.location=(href='tarif.php')</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $konek->error;
		}

	}elseif ($_GET['data']==='himpunan') {
		$id_kriteria = $_POST['id_kriteria'];
		$namahimpunan = $_POST['namahimpunan'];
		$nilai = $_POST['nilai'];
		$keterangan = $_POST['keterangan'];

		$sql = "INSERT INTO tbl_himpunan (id_kriteria, namahimpunan, nilai, keterangan)
		VALUES ('$id_kriteria', '$namahimpunan', '$nilai', '$keterangan')";
		# jika insert data berhasil maka akan mengembalikan halaman ke himpunan data
		if ($konek->query($sql) === TRUE) {
		    echo "<script>window.alert('Data Himpunan berhasil ditambah');
		         window.location=(href='himpunan.php')</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $konek->error;
		}
	}elseif ($_GET['data']==='klasifikasi') {
		$queryK = "SELECT * FROM tbl_kriteria";
  $resultK = mysqli_query($konek,$queryK);
  $idP = $_POST['id_tarif'];

  $sql = "INSERT INTO tbl_klasifikasi (id_tarif, c1, c2, c3, c4)
		VALUES ('$idP' ";
	  while ($dataK = mysqli_fetch_array($resultK)) {
	  	$sql .=	",".$_POST["nama_kriteria$dataK[id]"];
	  }
		$sql .= ")";
		# jika insert data berhasil maka akan mengembalikan halaman ke himpunan data
		if ($konek->query($sql) === TRUE) {
		    echo "<script>window.alert('Data Klasifikasi berhasil ditambah');
		         window.location=(href='klasifikasi.php')</script>";
		} else {
		    echo "Error: " . $sql . "<br>" . $konek->error;
		}
		echo $sql;
	}
	// aksi update data
}elseif ($_GET['aksi']==='update') {
	// jika value data adalah tarif maka lakukan proses update data tarif
	if ($_GET['data']==='tarif') {
		$id = $_GET['id'];
		$tarif = $_POST['tarif'];
		// $jk = $_POST['jk'];
		// $agama = $_POST['agama'];
		// $status_kawin = $_POST['status_kawin'];
		// $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
		// $email = $_POST['email'];
		// $alamat = $_POST['alamat'];
		// $no_telp = $_POST['no_telp'];
		$query = "UPDATE tbl_tarif SET tarif='$tarif' WHERE id='$id'";
		$result = mysqli_query($konek, $query);
   if ($result) {
     echo "<script>window.alert('Data Tarif berhasil diubah');
           window.location=(href='tarif_edit.php?id=$id')</script>";
   }else{
     echo "Error updating record: " . mysqli_error($konek);
   }

	}elseif ($_GET['data']==='himpunan') {
		$id_kriteria = $_POST['id_kriteria'];
		$namahimpunan = $_POST['namahimpunan'];
		$nilai = $_POST['nilai'];
		$keterangan = $_POST['keterangan'];
		$id = $_POST['id'];

		$query = "UPDATE tbl_himpunan SET id_kriteria='$id_kriteria', namahimpunan='$namahimpunan', nilai='$nilai', keterangan='$keterangan' WHERE id='$id'";
		$result = mysqli_query($konek, $query);
   if ($result) {
     echo "<script>window.alert('Data Himpunan berhasil diubah');
           window.location=(href='himpunan_edit.php?id=$id')</script>";
   }else{
     echo "Error updating record: " . mysqli_error($konek);
   }

	}elseif ($_GET['data']==='klasifikasi') {
		$id_tarif = $_POST['id_tarif'];
		$c1 = $_POST['c1'];
		$c2 = $_POST['c2'];
		$c3 = $_POST['c3'];
		$c4 = $_POST['c4'];
		$id = $_POST['id'];

		$query = "UPDATE tbl_klasifikasi SET id_tarif='$id_tarif', c1='$c1', c2='$c2', c3='$c3', c4='$c4' WHERE id='$id'";
		$result = mysqli_query($konek, $query);
   if ($result) {
     echo "<script>window.alert('Data Klasifikasi berhasil diubah');
           window.location=(href='klasifikasi_edit.php?id=$id')</script>";
   }else{
     echo "Error updating record: " . mysqli_error($konek);
   }

	}
}

$konek->close();
?>
