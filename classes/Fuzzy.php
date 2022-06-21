<?php
class Fuzzy{
    public $over;
    public $inva;
    public $com;
    public $un;
    public $in;
    public $nOver;
    public $nInva;
    public $nCom;
    public $nUn;
    public $nIn;
    public $aOver;
    public $aInva;
    public $aCom;
    public $aUn;
    public $aIn;
    public $predikat = array();
    public $hasil;
    public $tingkat;

    // himpunan normal
    public function normal($x){
        if($x<=14){
            $normal = 1.0;
        }else if(14<=$x && $x<=28){
            $normal = (28-$x)/14;
        }else if($x>=28){
            $normal = 0;
        }
        return $normal;
    }

    // himpunan abnormal
    public function abnormal($x){
        if($x<=14){
            $abnormal = 0;
        }else if(14<=$x && $x<=28){
            $abnormal = ($x-14)/14;
        }else if($x>=28){
            $abnormal = 1.0;
        }
        return $abnormal;
    }

    public function fuzzifikasi($x){
        $this->over = $x[0]+$x[3]+$x[8]+$x[15]+$x[19]+$x[31]+$x[33];
        $this->nOver = $this->normal($this->over);
        $this->aOver = $this->abnormal($this->over);

        $this->inva = $x[1]+$x[2]+$x[11]+$x[12]+$x[13]+$x[22];
        $this->nInva = $this->normal($this->inva);
        $this->aInva = $this->abnormal($this->inva);
        
        $this->com = $x[4]+$x[6]+$x[18]+$x[21]+$x[23]+$x[28]+$x[29];
        $this->nCom = $this->normal($this->com);
        $this->aCom = $this->abnormal($this->com);

        $this->un = $x[7]+$x[9]+$x[14]+$x[16]+$x[20]+$x[27]+$x[32];
        $this->nUn = $this->normal($this->un);
        $this->aUn = $this->abnormal($this->un);

        $this->in = $x[5]+$x[10]+$x[17]+$x[24]+$x[25]+$x[26]+$x[30];
        $this->nIn = $this->normal($this->in);
        $this->aIn = $this->abnormal($this->in);
    }

    public function min($a,$b,$c,$d,$e){
        if($a<$b && $a<$c && $a<$d && $a<$e){
            return $a;
        }else if($b<$a && $b<$c && $b<$d && $b<$e){
            return $b;
        }else if($c<$a && $c<$b && $c<$d && $c<$e){
            return $c;
        }else if($d<$a && $d<$b && $d<$c && $d<$e){
            return $d;
        }else{
            return $e;
        }
    }

    // himpunan rendah
    public function rendah($a){
        if($a>0 && $a<1){
            $z = -$a*5+13;
        }else if($a == 0){
            $z = 13;
        }else if($a == 1){
            $z = 8;
        }
        return $z;
    }

    // himpunan sedang 
    public function sedang($a){
        if($a == 1){
            $z = 13;
        }else if($a == 0){
            if(7<=$i && $i<=11){
                $z = 8;
            }else{
                $z = 18;
            }
        }else if(0<=$a && $a<=0.25){
            $z = $a*5+8;
        }else if(0.25<=$a && $a<=1){
            $z = -$a*5+18;
        }
        return $z;
    }

    // himpunan tinggi
    public function tinggi($a){
        if($a==0){
            $z = 13;
        }else if($a==1){
            $z = 18;
        }else if($a>0 && $a<1){
            $z = $a*5+13;
        }
        return $z;
    }

    public function inferensi(){
        $i = 0;

        // 1
        if($this->nOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->nCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->rendah($this->predikat[$i]);
            $i++;
        }

        // 2
        if($this->aOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->nInva, $this->nCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->rendah($this->predikat[$i]);
            $i++;
        }

        // 3
        if($this->nOver != 0 && $this->aInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->aInva, $this->nCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->rendah($this->predikat[$i]);
            $i++;
        }

        // 4
        if($this->nOver != 0 && $this->nInva !=0 && $this->aCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->aCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->rendah($this->predikat[$i]);
            $i++;
        }

        //5 
        if($this->nOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->aUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->nCom, $this->aUn, $this->nIn);
            $this->z[$i] = $this->rendah($this->predikat[$i]);
            $i++;
        }

        // 6
        if($this->nOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->nCom, $this->nUn, $this->aIn);
            $this->z[$i] = $this->rendah($this->predikat[$i]);
            $i++;
        }

        // 7
        if($this->aOver != 0 && $this->aInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->nCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 8
        if($this->nOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->aInva, $this->aCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 9
        if($this->nOver != 0 && $this->nInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->aCom, $this->aUn, $this->nIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 10
        if($this->nOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->nCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 11
        if($this->aOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->nInva, $this->nCom, $this->nUn, $this->aIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 12
        if($this->aOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->nUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->aCom, $this->nUn, $this->nIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 13
        if($this->nOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->aInva, $this->aCom, $this->aUn, $this->nIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 14
        if($this->nOver != 0 && $this->nInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->nInva, $this->aCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 15
        if($this->aOver != 0 && $this->nInva !=0 && $this->nCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->nInva, $this->nCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 16
        if($this->aOver != 0 && $this->aInva !=0 && $this->nCom !=0 && $this->nUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->nCom, $this->nUn, $this->aIn);
            $this->z[$i] = $this->sedang($this->predikat[$i]);
            $i++;
        }

        // 17
        if($this->aOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->nIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->aCom, $this->aUn, $this->nIn);
            $this->z[$i] = $this->tinggi($this->predikat[$i]);
            $i++;
        }

        // 18
        if($this->nOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->nOver, $this->aInva, $this->aCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->tinggi($this->predikat[$i]);
            $i++;
        }

        // 19
        if($this->aOver != 0 && $this->nInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->nInva, $this->aCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->tinggi($this->predikat[$i]);
            $i++;
        }

        // 20
        if($this->aOver != 0 && $this->aInva !=0 && $this->nCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->nCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->tinggi($this->predikat[$i]);
            $i++;
        }

        // 21
        if($this->aOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->nUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->aCom, $this->nUn, $this->aIn);
            $this->z[$i] = $this->tinggi($this->predikat[$i]);
            $i++;
        }

        // 22
        if($this->aOver != 0 && $this->aInva !=0 && $this->aCom !=0 && $this->aUn !=0 && $this->aIn !=0){
            $this->predikat[$i] = $this->min($this->aOver, $this->aInva, $this->aCom, $this->aUn, $this->aIn);
            $this->z[$i] = $this->tinggi($this->predikat[$i]);
            $i++;
        }
    }
    
    function defuzzifikasi(){
        $x=0;   
        $y=0;   
            
        $min = count($this->predikat);
        for($i=0; $i<$min; $i++){
            $x = $x+$this->predikat[$i];
            $y = $y+($this->z[$i]*$this->predikat[$i]);
        }
        
        $this->hasil = $y/$x;
        if($this->hasil<13){
            $this->tingkat = "Rendah";
        }else if($this->hasil>13){
            $this->tingkat = "Tinggi";
        }else if($this->hasil==13){
            $this->tingkat = "Sedang";
        }
    }
}
?>
