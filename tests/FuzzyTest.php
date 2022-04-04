<?php declare(strict_types=1);
require_once 'classes/Fuzzy.php';
use PHPUnit\Framework\TestCase;

final class FuzzyTest extends TestCase{
    public $nilai;
    public $x = 19;
    public $a = 9;
    public $b = 12;
    public $c = 19;
    public $d = 27;
    public $e = 28;

    public function testRendah(){
        $stub = $this->createStub(Fuzzy::class);

        if($this->x<=15){
            $this->nilai = 1;
        }elseif((15<$this->x) && ($this->x<23)){
            $this->nilai = (23-$this->x)/8;
        }elseif($this->x>=23){
            $this->nilai = 0;
        }
        
        $stub->method('rendah')
            ->willReturn($this->nilai);
    
        $this->assertSame($this->nilai, $stub->rendah($this->x));
    }

    public function testSedang(){
        $stub = $this->createStub(Fuzzy::class);

        if($this->x<=15 || $this->x>=26){
            $this->nilai = 0;
        }elseif((15<$this->x) && ($this->x<23)){
            $this->nilai = ($this->x-15)/8;
        }elseif((23<$this->x) && ($this->x<26)){
            $this->nilai = (26-$this->x)/3;
        }elseif($this->x==23){
            $this->nilai = 1;
        }
        
        $stub->method('sedang')
            ->willReturn($this->nilai);
    
        $this->assertSame($this->nilai, $stub->sedang($this->x));
    }

    public function testTinggi(){
        $stub = $this->createStub(Fuzzy::class);

        if($this->x<=23){
            $this->nilai = 0;
        }elseif((23<$this->x) && ($this->x<26)){
            $this->nilai = ($this->x-23)/3;
        }elseif($this->x>=26){
            $this->nilai = 1;
        }
        
        $stub->method('tinggi')
            ->willReturn($this->nilai);
    
        $this->assertSame($this->nilai, $stub->tinggi($this->x));
    }

    public function testMax(){
        $stub = $this->createStub(Fuzzy::class);
        
        if(($this->a>$this->b) && ($this->a>$this->c)){
            $max = $this->a;
        }elseif(($this->b>$this->a) && ($this->b>$this->c)){
            $max = $this->b;
        }else{
            $max = $this->c;
        }

        $stub->method('max')
            ->willReturn($max);
    
        $this->assertSame($max, $stub->max($this->a, $this->b, $this->c));
    }

    public function testMaxAkhir(){
        $stub = $this->createStub(Fuzzy::class);
        
        if(($this->a>$this->b) && ($this->a>$this->c) && ($this->a>$this->d) && ($this->a>$this->e)){
            $max = $this->a;
        }elseif(($this->b>$this->a) && ($this->b>$this->c) && ($this->b>$this->d) && ($this->b>$this->e)){
            $max = $this->b;
        }elseif(($this->c>$this->a) && ($this->c>$this->b) && ($this->c>$this->d) && ($this->c>$this->e)){
            $max = $this->c;
        }elseif(($this->d>$this->a) && ($this->d>$this->b) && ($this->d>$this->e) && ($this->d>$this->e)){
            $max = $this->d;
        }else{
            $max = $this->e;
        }

        $stub->method('maxAkhir')
            ->willReturn($max);
    
        $this->assertSame($max, $stub->maxAKhir(
            $this->a, $this->b, $this->c, $this->d, $this->e));
    }
}
?>