<?php namespace muvo\yii\slider;

use yii\bootstrap\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
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
        /*
        $data = [ 'provide' => 'slider' ];

        if(!empty($this->value))
            $data['slider-value'] = $this->value;

        foreach($this->sliderOptions as $k=>$v)
            $data[sprintf('slider-%s',$k)] = $v;

        $this->options['data'] = $data;
        */

        $this->view->registerJs(sprintf('<!-- var slider%1$s = window.%1$s = new Slider(\'%2$s\',%3$s) -->',
            Inflector::id2camel($this->id),
            $this->id,
            Json::encode($data)),View::POS_END);

        return Html::input($this->type,$this->name,$this->value,$this->options);
    }
}
