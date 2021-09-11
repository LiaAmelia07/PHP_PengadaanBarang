<?php
$perusahaan = [
    'nama' => 'Lia Amelia',
    'Umur' => '18 Tahun',
    'Alamat' => 'Jln. Sukamenak',
    'Hobbi' => [
        'Membaca',
        'Menulis',
    ],
    'Sosial Media' => [
        'Facebook' => 'parah Pake U',
        'Instagram' => 'Itsmeliaam_',
    ]
];

echo"<pre>";
print_r($perusahaan) ;

echo"</br>";
echo"Program Menampilkan Array Multidimensi </br>";
echo $perusahaan['Hobbi'][1],"</br>";
echo $perusahaan['Sosial Media']['Facebook'];

?>