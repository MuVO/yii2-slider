<?php namespace muvo\yii\slider;

use yii\bootstrap\Html;
use yii\web\View;

class Widget extends \yii\bootstrap\Widget
{
    public $type = 'text';
    public $name;
    public $value;
    public $sliderOptions = [];
    public $options = [
        'class' => 'form-control',
    ];

    public function init(){
        $this->view->registerAssetBundle(SliderAsset::className(),View::POS_BEGIN);
        $this->options['id'] = $this->id;
    }

    public function run(){
        $data = [ 'provide' => 'slider' ];
        foreach($this->sliderOptions as $k=>$v)
            $data[sprintf('slider-%s',$k)] = $v;

        $this->options['data'] = $data;

        return Html::input($this->type,$this->name,$this->value,$this->options);
    }
}
