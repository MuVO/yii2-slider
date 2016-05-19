<?php namespace muvo\yii\slider;

use yii\base\InvalidParamException;
use yii\bootstrap\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\View;

class Widget extends \yii\bootstrap\Widget
{
    public $type = 'text';
    public $mode = 'js';
    public $name;
    public $value;
    public $sliderOptions = [];
    public $options = [
        'class' => 'form-control',
    ];

    public function init(){
        $this->view->registerAssetBundle(SliderAsset::className(),View::POS_BEGIN);
        $this->options['id'] = $this->id;

        if(strtolower($this->mode)==='js'){
            $this->view->registerJs(sprintf('var slider%1$s = window.slider%1$s = new Slider(\'#%2$s\',%3$s);',
                Inflector::id2camel($this->id),
                $this->id,
                Json::encode($this->sliderOptions)),View::POS_END);
        }elseif(strtolower($this->mode)==='data'){
            $data = [ 'provide' => 'slider' ];

            if(!empty($this->value))
                $data['slider-value'] = $this->value;

            foreach($this->sliderOptions as $k=>$v)
                $data[sprintf('slider-%s',$k)] = $v;

            $this->options['data'] = $data;
        }else throw new InvalidParamException('A \'mode\' must be set to \'data\' or \'js\'!');
    }

    public function run(){
        return Html::input($this->type,$this->name,$this->value,$this->options);
    }
}
