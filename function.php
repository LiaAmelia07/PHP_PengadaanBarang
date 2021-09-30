<?php
session_start();
//membuat koneksi ke database
$conn=mysqli_connect("localhost","root","","pengadaan_barang");

//Untuk menambah barang
if(isset($_POST['tambahkan'])){
    $namabarang = $_POST['namabarang'];
    $stock = $_POST['stock'];
    $ket = $_POST['ket'];

    $tambah= mysqli_query($conn,"insert into barang(namabarang,stock,keterangan) values('$namabarang','$stock','$ket')");

}
//Menambah Suplier
if(isset($_POST['tambahsup'])){
    $namasup = $_POST['namasup'];
    $no = $_POST['no'];
    $alamat = $_POST['alamat'];

    $masuk= mysqli_query($conn,"insert into supplier(namasup,telepon,alamat) values('$namasup','$no','$alamat')");

}


//Menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barang = $_POST['barang'];
    $sup = $_POST['sup'];
    $stock = $_POST['stock'];
    $keterangan = $_POST['keterangan'];

    $cekbarangsekarang= mysqli_query($conn, "select * from barang where idbarang='$barang'");
    $cekbarang = mysqli_query($conn, "select * from supplier where idsup='$sup'");
    $ambildata = mysqli_fetch_array($cekbarangsekarang);
    $stocksekarang = $ambildata['stock'];
    $tambahkanbarang = $stocksekarang + $stock;
    $addmasuk= mysqli_query($conn,"insert into barangmasuk(idbarang,idsup,stockmasuk,keterangan) values('$barang','$sup','$stock','$keterangan')");
    $updatebarangmasuk= mysqli_query($conn,"update barang set barang='$tambahkanbarang' where idbarang='$barang'");

}

//Menambah barang keluar
if(isset($_POST['barangkeluar'])){
    $barang = $_POST['barang'];
    $penerima = $_POST['penerima'];
    $stockkeluar = $_POST['stockkeluar'];
    $namabarang = $_POST['namabarang'];

    $cekbarangsekarang= mysqli_query($conn, "select * from barang where idbarang='$barang'");
    $ambildata = mysqli_fetch_array($cekbarangsekarang);
    $stocksekarang = $ambildata['stock'];
    $tambahkanbarang = $stocksekarang - $stockkeluar;
    $addkeluar= mysqli_query($conn,"insert into barangkeluar(idbarang,stockkeluar,namabarang,penerima) values('$barang','$stockkeluar','$namabarang','$penerima')");
    $updatebarangkeluar= mysqli_query($conn,"update barang set barang='$tambahkanbarang' where idbarang='$barang'");

}

//edit barang
if(isset($_POST['updatebarang'])){
    $idb= $_POST['idb'];
    $namabarang= $_POST['namabarang'];
    $stock= $_POST['stock'];
    $ket = $_POST['ket'];
    
    $update= mysqli_query($conn,"update barang set namabarang='$namabarang',stock='$stock',keterangan='$ket' where idbarang='$idb'");
    if($update){
        header("location:index.php");
    }else{
        echo 'Gagal';
        header("location:index.php");
    }
}

//hapus barang
if(isset($_POST['hapusbarang'])){
    $idb =$_POST['idb'];

    $hapus=mysqli_query($conn,"delete from barang where idbarang='$idb'");
    if($hapus){
        header("location:index.php");
    }else{
        echo 'Gagal';
        header("location:index.php");
    }

}

//update info barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb= $_POST['idb'];
    $stock= $_POST['stock'];
    $ket = $_POST['ket'];
    
    $update= mysqli_query($conn,"update barangmasuk set stock='$stock',keterangan='$ket' where idbarang='$idb'");
    if($update){
        header("location:barangmasuk.php");
    }else{
        echo 'Gagal';
        header("location:barangmasuk.php");
    }
}

//hapus barang Masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb =$_POST['idb'];

    $hapus=mysqli_query($conn,"delete from barangmasuk where idbarang='$idb'");
    if($hapus){
        header("location:barangmasuk.php");
    }else{
        echo 'Gagal';
        header("location:barangmasuk.php");
    }

}

//update info barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb= $_POST['idb'];
    $namabarang= $_POST['namabarang'];
    $stockkeluar= $_POST['stockkeluar'];
    $penerima = $_POST['penerima'];
    
    $update= mysqli_query($conn,"update barangkeluar set namabarang='$namabarang',stockkeluar='$stockkeluar',penerima='$penerima' where idbarang='$idb'");
    if($update){
        header("location:barangkeluar.php");
    }else{
        echo 'Gagal';
        header("location:barangkeluar.php");
    }
}

//hapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb =$_POST['idb'];

    $hapus=mysqli_query($conn,"delete from barangkeluar where idbarang='$idb'");
    if($hapus){
        header("location:barangkeluar.php");
    }else{
        echo 'Gagal';
        header("location:barangkeluar.php");
    }

}

//update info Supplier
if(isset($_POST['updatesupplier'])){
    $idsup= $_POST['idsup'];
    $namasup= $_POST['namasup'];
    $telepon= $_POST['telepon'];
    $alamat = $_POST['alamat'];
    
    $update= mysqli_query($conn,"update supplier set namasup='$namasup',telepon='$telepon',alamat='$alamat' where idsup='$idsup'");
    if($update){
        header("location:supplier.php");
    }else{
        echo 'Gagal';
        header("location:supplier.php");
    }
}

//hapus barang keluar
if(isset($_POST['hapussupplier'])){
    $idsup =$_POST['idsup'];

    $hapus=mysqli_query($conn,"delete from supplier where idsup='$idsup'");
    if($hapus){
        header("location:supplier.php");
    }else{
        echo 'Gagal';
        header("location:supplier.php");
    }

}



?>