[+] untuk kirim data --------------------------

$data = array(
    "nama"          => "Mu'alif lihawa",
    "jenis_kelamin" => "Laki - Laki"
);

$app->insert("namaTable",$data);


[+] untuk baca data --------------------------

$result=$app->get("namaTable");
var_dump($result->fetch_array());

[+] untuk update data --------------------------

$data = array(
    "nama" => "Mu'alif"
);

$id=array(
    "id" => 01
);

$app->update("namaTable",$data,$id);

[+] untuk delete data --------------------------

$id=array(
    "id" => 01
);

$app->delete("namaTable",$id);

[+] untuk method lain --------------------------

$data=$app->select()->from()->where()->orderby()->limit()->execute();
$data->fetch_array();