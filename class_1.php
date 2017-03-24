<?php

include 'config.php';

// $obj = new owHeros('=.=');
// $obj->atk();

/**
* 接口
*/
interface heros_interface 
{
    public function atk_i($value='');    
    public function run_i($value='');
}

/**
* 抽象方法
*/
abstract class heros_abstract
{
    //子类必须实现此方法
    abstract function heros_a();

    //普通方法
    public function atk_a($value='') {
        echo "atk a " . $value .  PHP_EOL;
    }
    
    public function run_a($value='') {
        echo "run a " . $value . PHP_EOL;
    }
}

//设置命名空间
// use model\heros;
// use model\heros as heros;

/**
 * 测试继承
 */
class dachui extends model\heros implements heros_interface
{
    function __construct($argument = '')
    {
        parent::__construct($argument);
    }

    public function atk_i($value='')
    {
        $this->atk();
    }

    public function run_i($value='')
    {
        $this->atk();
    }

    public function heros_a() {

    }
}


class dva extends heros
{
    function __construct($argument = '')
    {
        parent::__construct($argument);
    }
}

class banzang 
{
    public static $hero_name = 'qqqqq';

    public function __construct($value='')
    {
        echo '__construct -> ' . $value . PHP_EOL;
    }

    public static function run($value='')
    {
        echo 'run -> ' . $value . PHP_EOL;
    }
    
    public function readName($value='')
    {
        return self::$hero_name;
    }
}

$obj = new dachui('dachui');
// echo $obj->getName();
// foreach($obj as $key => $value) {
//     print "$key => $value\n";
// }

// $obj->setName('dachui');

// $obj->atk_interface();
// echo dachui::atk_interface();
// $obj->run_a('asdasdasd');


// $obj = new dva('AAAAA');
// $obj->setName('dva');
// $obj->atk();

// $obj = new banzang('banzang');
// $obj->run('bangzang run');
// var_dump(banzang::readName());
// var_dump(banzang::$hero_name);



class A {
    public $foo = 1;
}  

$a = new A;
$b = $a;     // $a ,$b都是同一个标识符的拷贝
             // ($a) = ($b) = <id>
$b->foo = 200;
echo $a->foo."\n";

$c = new A;
function test($c)
{
    $c->foo = 100;
}

test($c);
echo $c->foo;