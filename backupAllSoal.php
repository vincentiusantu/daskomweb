<?php
$servername = "localhost";
$username = "root";
$password = "D3vk0mtelu!";
$dbname = "daskomdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
for ($modul_id=1; $modul_id <25; $modul_id++)
{
    $sql = "SELECT moduls.judul,moduls.id FROM moduls WHERE moduls.id = ".$modul_id;
    $result = $conn->query($sql)->fetch_assoc()['judul'];
    echo "\n".$result."\n--------------------------\n";
    
 //for ($dbsoal=1; $dbsoal<7; $dbsoal++){ 
    echo "\n FITB \n";
    $sql = "SELECT soal__fitbs.soal,soal__fitbs.id FROM soal__fitbs WHERE soal__fitbs.modul_id = ".$modul_id;
    if ($hasil = $mysqli->query($sql))
    {
        while ($row = $hasil->fetch_assoc())
        {
            $soal=$row['soal'];
            echo $soal."\n";
        }
        $hasil->free();
    }
    echo "\njurnal\n";
    $sql = "SELECT soal__jurnals.soal,soal__jurnals.id FROM soal__jurnals WHERE soal__jurnals.modul_id = ".$modul_id;
	if ($hasil = $mysqli->query($sql))
    {
        while ($row = $hasil->fetch_assoc())
        {
            $soal=$row['soal'];
            echo $soal."\n";
        }
        $hasil->free();
    }
    echo "\n Mandiri \n";
    $sql = "SELECT soal__mandiris.soal,soal__mandiris.id FROM soal__mandiris WHERE soal__mandiris.modul_id = ".$modul_id;
    if ($hasil = $mysqli->query($sql))
    {
        while ($row = $hasil->fetch_assoc())
        {
            $soal=$row['soal'];
            echo $soal."\n";
        }
        $hasil->free();
    }
    echo "\n Test awal: \n";
    $sql = "SELECT soal__tas.pertanyaan, soal__tas.jawaban_benar,soal__tas.id FROM soal__tas WHERE soal__tas.modul_id = ".$modul_id;
    if ($hasil = $mysqli->query($sql))
    {
        while ($row = $hasil->fetch_assoc())
        {
            $soal=$row['pertanyaan'];
            $jawaban=$row['jawaban_benar'];
            echo "Pertanyaan: ".$soal."\n Jawaban Benar: ".$jawaban;
        }
        $hasil->free();
    }	

	
	/*if ($result->num_rows > 0) {
		$rating = 0;
		$nama;
	    while($row = $result->fetch_assoc()) {
	        $nama = $row["nama"];
	        $rating += $row["rating_asisten"];
	    }
	    $rating /= $result->num_rows;
            echo "(".$asisten_id.") ".$nama." = ".$rating."\n";
	    if($bestRating < $rating){
		$bestRating = $rating;
	    	$bestAsisten = $nama." ".$rating;
	    }
	}*/
}
//}

//echo "\nBest Asisten = ".$bestAsisten;

$conn->close();
?> 