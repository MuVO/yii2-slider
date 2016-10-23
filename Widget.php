<?php namespace muvo\yii\slider;

use yii\base\InvalidParamException;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\bootstrap\Html;
use yii\helpers\Inflector;
use yii\helpers\Json;
use yii\web\View;

class Widget extends \yii\bootstrap\Widget
{
    public $useNativeBootstrap = true;
    public $type = 'text';
    public $mode = 'js';
    public $name;
    public $value;
    public $sliderOptions = [];
    public $options = [
        'class' => 'form-control',
    ];

    public function init(){
        if($this->useNativeBootstrap==true){
            \Yii::info('Registering a bootstrap assets',__METHOD__);
            $this->view->registerAssetBundle(BootstrapAsset::className(),View::POS_HEAD);
            $this->view->registerAssetBundle(BootstrapPluginAsset::className(),View::POS_HEAD);
        }
        $this->view->registerAssetBundle(AssetBundle::className(),View::POS_BEGIN);
        $this->options['id'] = $this->id;

        if(!empty($this->value)&&!isset($this->sliderOptions['value']))
            $this->sliderOptions['value'] = $this->value;

        if(strtolower($this->mode)==='js'){
            $this->view->registerJs(sprintf('var slider%1$s = window.slider%1$s = new Slider(\'#%2$s\',%3$s);',
                Inflector::id2camel($this->id),
                $this->id,
                Json::encode($this->sliderOptions)),View::POS_END);
        }elseif(strtolower($this->mode)==='data'){
            $data = [ 'provide' => 'slider' ];

            foreach($this->sliderOptions as $k=>$v)
                $data[sprintf('slider-%s',$k)] = $v;

            $this->options['data'] = $data;
        }else throw new InvalidParamException('A \'mode\' must be set to \'data\' or \'js\'!');
    }

    public function run(){
        return Html::input($this->type,$this->name,$this->value,$this->options);
    }
}
