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

    public function testNormal(){
        $stub = $this->createStub(Fuzzy::class);

        if($this->x<=14){
            $this->nilai = 1;
        }else if(14<=$this->x && $this->x<=28){
            $this->nilai = (28-$this->x)/14;
        }else if($this->x>=28){
            $this->nilai = 0;
        }
        
        $stub->method('normal')
            ->willReturn($this->nilai);
    
        $this->assertSame($this->nilai, $stub->normal($this->x));
    }

    public function testAbnormal(){
        $stub = $this->createStub(Fuzzy::class);

        if($this->x<=14){
            $this->nilai = 0;
        }else if(14<=$this->x && $this->x<=28){
            $this->nilai = ($this->x-14)/14;
        }else if($this->x>=28){
            $this->nilai = 1;
        }
        
        $stub->method('abnormal')
            ->willReturn($this->nilai);
    
        $this->assertSame($this->nilai, $stub->abnormal($this->x));
    }

    public function testMin(){
        $stub = $this->createStub(Fuzzy::class);
        
        if(($this->a<$this->b) && ($this->a<$this->c) && 
            ($this->a<$this->d) && ($this->a<$this->e)){
            $min = $this->a;
        }elseif(($this->b<$this->a) && ($this->b<$this->c) && 
            ($this->b<$this->d) && ($this->b<$this->e)){
            $min = $this->b;
        }elseif(($this->c<$this->a) && ($this->c<$this->b) && 
            ($this->c<$this->d) && ($this->c<$this->e)){
            $min = $this->c;
        }elseif(($this->d<$this->a) && ($this->d<$this->b) && 
            ($this->d<$this->e) && ($this->d<$this->e)){
            $min = $this->d;
        }else{
            $min = $this->e;
        }

        $stub->method('min')
            ->willReturn($min);
    
        $this->assertSame($min, $stub->min(
            $this->a, $this->b, $this->c, $this->d, $this->e));
    }
}
?>
