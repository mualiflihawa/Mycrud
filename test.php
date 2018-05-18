<?php 


class app{

    public $proses;

    public function __construct(){
        $this->proses = NULL;
    }

    public function tahap1(){
        $this->proses .= "tahap 1 ";
        return $this;
    }

    public function tahap2(){
        $this->proses .= "tahap 2 ";
        return $this;
    }
    public function tahap3(){
        $this->proses .= "tahap 3 ";
        return $this;
    }
    public function jalan(){
        return $this->proses;
    }

}

$app = new app();


echo $app->tahap1()
         ->tahap2()
         ->tahap3()
         ->jalan();


?>