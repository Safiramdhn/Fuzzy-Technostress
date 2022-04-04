<?php
class Fuzzy{
    public $rendah;
    private $sedang;
    private $tinggi;
    private $overload;
    private $invasion;
    private $complexity;
    private $uncertainty;
    private $insecurity;
    private $overRendah;
    private $overSedang;
    private $overTinggi;
    private $invaRendah;
    private $invaSedang;
    private $invaTinggi;
    private $comRendah;
    private $comSedang;
    private $comTinggi;
    private $unRendah;
    private $unSedang;
    private $unTinggi;
    private $inRendah;
    private $inSedang;
    private $inTinggi;
    public $maxOverload;
    public $maxInvasion;
    public $maxComplexity;
    public $maxUncertainty;
    public $maxInsecurity;
    public $maxAkhir;
    public $kriteria;
    public $tingkat;

    // Rumus pembentukan anggota himpunan rendah
    function rendah($r){
        if($r<=15){
            $this->rendah = 1;
        }elseif((15<$r) && ($r<23)){
            $this->rendah = (23-$r)/8;
        }elseif($r>=23){
            $this->rendah = 0;
        }
        return $this->rendah;
    }

    // Rumus pembentukan anggota himpunan sedang
    function sedang($s){
        if($s<=15 || $s>=26){
            $this->sedang = 0;
        }elseif((15<$s) && ($s<23)){
            $this->sedang = ($s-15)/8;
        }elseif((23<$s) && ($s<26)){
            $this->sedang = (26-$s)/3;
        }elseif($s==23){
            $this->sedang = 1;
        }
        return $this->sedang;
    }

    // Rumus pembentukan anggota himpunan tinggi
    function tinggi($t){
        if($t<=23){
            $this->tinggi = 0;
        }elseif((23<$t) && ($t<26)){
            $this->tinggi = ($t-23)/3;
        }elseif($t>=26){
            $this->tinggi = 1;
        }
        return $this->tinggi;
    }

    // menentukan nilai overload berdasarkan rumus himpunan
    function overload($x){
        $this->overload = $x[0]+$x[3]+$x[8]+$x[15]+$x[19]+$x[31]+$x[33];
        $this->overRendah = $this->rendah($this->overload);
        $this->overSedang = $this->sedang($this->overload);
        $this->overTinggi = $this->tinggi($this->overload);
    }

    public function invasion($x){
        $this->invasion = $x[1]+$x[2]+$x[11]+$x[12]+$x[13]+$x[22];
        $this->invaRendah = $this->rendah($this->invasion);
        $this->invaSedang = $this->sedang($this->invasion);
        $this->invaTinggi = $this->tinggi($this->invasion);
    }

    public function complexity($x){
        $this->complexity = $x[4]+$x[6]+$x[18]+$x[21]+$x[24]+$x[28]+$x[29];
        $this->comRendah = $this->rendah($this->complexity);
        $this->comSedang = $this->sedang($this->complexity);
        $this->comTinggi = $this->tinggi($this->complexity);
    }

    public function uncertainty($x){
        $this->uncertainty = $x[7]+$x[9]+$x[14]+$x[16]+$x[20]+$x[27]+$x[32];
        $this->unRendah = $this->rendah($this->uncertainty);
        $this->unSedang = $this->sedang($this->uncertainty);
        $this->unTinggi = $this->tinggi($this->uncertainty);
    }

    public function insecurity($x){
        $this->insecurity = $x[5]+$x[10]+$x[17]+$x[24]+$x[25]+$x[26]+$x[30];
        $this->inRendah = $this->rendah($this->insecurity);
        $this->inSedang = $this->sedang($this->insecurity);
        $this->inTinggi = $this->tinggi($this->insecurity);
    }

    // menentukan nilai terbesar 3 himpunan
    function max($a, $b, $c){
        if(($a>$b) && ($a>$c)){
            return $a;
        }elseif(($b>$a) && ($b>$c)){
            return $b;
        }else{
            return $c;
        }
    }

    // menentukan nilai terbesar dari 5 kriteria
    function maxAkhir($a,$b,$c,$d,$e){
        if(($a>$b) && ($a>$c) && ($a>$d) && ($a>$e)){
            return $a;
        }elseif(($b>$a) && ($b>$c) && ($b>$d) && ($b>$e)){
            return $b;
        }elseif(($c>$a) && ($c>$b) && ($c>$d) && ($c>$e)){
            return $c;
        }elseif(($d>$a) && ($d>$b) && ($d>$e) && ($d>$e)){
            return $d;
        }else{
            return $e;
        }
    }

    public function inferensi(){
        $this->maxOverload = $this->max($this->overRendah, $this->overSedang, $this->overTinggi);
        $this->maxInvasion = $this->max($this->invaRendah, $this->invaSedang, $this->invaTinggi);
        $this->maxComplexity = $this->max($this->comRendah, $this->comSedang, $this->comTinggi);
        $this->maxUncertainty = $this->max($this->unRendah, $this->unSedang, $this->unTinggi);
        $this->maxInsecurity = $this->max($this->inRendah, $this->inSedang, $this->inTinggi);

        $this->maxAkhir = $this->maxAkhir($this->maxOverload, $this->maxInvasion, 
                        $this->maxComplexity, $this->maxUncertainty, $this->maxInsecurity);

        if($this->maxOverload == $this->overRendah){
            $this->tingkat = "Rendah";
        }elseif($this->maxOverload == $this->overSedang){
            $this->tingkat = "Sedang";
        }else{
            $this->tingkat = "Tinggi";
        }
                
        if($this->maxInvasion == $this->invaRendah){
            $this->tingkat = "Rendah";
        }elseif($this->maxInvasion == $this->invaSedang){
            $this->tingkat = "Sedang";
        }else{
            $this->tingkat = "Tinggi";
        }

        if($this->maxComplexity == $this->comRendah){
            $this->tingkat = "Rendah";
        }elseif($this->maxComplexity == $this->comSedang){
            $this->tingkat = "Sedang";
        }else{
            $this->tingkat = "Tinggi";
        }

        if($this->maxUncertainty == $this->unRendah){
            $this->tingkat = "Rendah";
        }elseif($this->maxUncertainty == $this->unSedang){
            $this->tingkat = "Sedang";
        }else{
            $this->tingkat = "Tinggi";
        }

        if($this->maxInsecurity == $this->inRendah){
            $this->tingkat = "Rendah";
        }elseif($this->maxInsecurity == $this->inSedang){
            $this->tingkat = "Sedang";
        }else{
            $this->tingkat = "Tinggi";
        }
    }
}
?>