<?php
namespace app\components;

use yii\base\Component;

class Service extends Component
{
    public $var = 'undefined';
    
    public function run() {
        return $this->var;
    }
    
}

