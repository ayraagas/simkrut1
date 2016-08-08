<?php 
//==================================================
//--- query mengambil nilai data-data kriteria 
$sql="SELECT id,nama,bobot 
      FROM kriteria 
      ORDER BY id";
$result=$db->query($sql);
//--- inisialisasi array kriteria 'C'
$C=array();
//--- inisialisasi array weight/bobot 'W'
$W=array();
//--- inisialisasi jumlah kriteria 'n'
$n=0; 
while($criteria=$result->fetch_assoc()){
  $W[$id]=$criteria['bobot'];
  $C[]=$criteria;
  ++$n;
}
$result->free();
//==================================================
//--- query mengambil nilai data-data hasil evaluasi 
$sql="SELECT id_alternatif,id_kriteria,nilai 
      FROM nilai_kriteria
      ORDER BY id_alternatif,id_kriteria";
$result=$db->query($sql);
//--- inisialisasi array X
$X=array();
$alternative='';
//--- inisialisasi jumlah alternative 'm'
$m=0;
while($row=$result->fetch_assoc()){
  if($row['id_alternatif']!=$alternative){
    $X[$row['id_alternatif']]=array();
    $alternative=$row['id_alternatif'];
    ++$m;
  }
  $X[$row['id_alternatif']][$row['id_kriteria']]=$row['nilai'];
}
$result->free();

//--- menghitung total jumlah bobot
$sigma_w=array_sum($W);
//--- membagi masing-masing bobot dengan total jumlah bobot
foreach($W as $j=>$w){
  $W[$j]=$w/$sigma_w;
}

//--- inisialisasi array 'S'
$S=array();
//--- menghitung nilai preferensi S untuk tiap-tiap alternatif
foreach($X as $i=>$x){
  //--- inisialisasi nilai S untuk alternatif ke-i
  $S[$i]=1;
  //--- lakukan iterasi untuk tiap-tiap data hasil evaluasi X
  foreach($x as $j=>$value){
    //--- kalikan dengan pangkat negatif dari nilai untuk kriteria ke j
    //--- jika merupakan kriteria biaya/cost
    if($criterias[$j]['attribute']=='cost')
      $S[$i]*=pow($value,-$W[$j]);
    //--- kalikan dengan pangkat positif dari nilai untuk kriteria ke j
    //--- jika merupakan kriteria keuntungan/benefit
    else  
      $S[$i]*=pow($value,$W[$j]);
  }

  //--- inisialisasi vektor V
$V=array();
//--- menghitung total jumlah nilai preferensi S
$sigma_s=array_sum($S);
//--- membagi masing-masing bobot dengan total jumlah nilai preferensi S
foreach($S as $j=>$s){
  $V[$j]=$s/$sigma_s;
}
}




?>