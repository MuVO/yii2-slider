<?php namespace muvo\yii\slider;

use yii\bootstrap\Html;

class Widget extends \yii\bootstrap\Widget
{
    public $type = 'text';
    public $name;
    public $value;
    public $sliderOptions = [];

    public function init(){
        $this->view->registerAssetBundle(SliderAsset::className());
    }

    public function run(){
        $data = [ 'provide' => 'slider' ];
        foreach($this->sliderOptions as $k=>$v)
            $data[sprintf('slider-%s',$k)] = $v;

        return Html::input($this->type,$this->name,$this->value,[
            'data' => $data,
        ]);
    }
}
