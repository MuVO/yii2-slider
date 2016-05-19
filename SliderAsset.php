<?php namespace muvo\yii\slider;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;

class SliderAsset extends AssetBundle
{
    public $sourcePath = '@bower/seiyria-bootstrap-slider/dist';
    public $css = [
        'css/bootstrap-slider.min.css',
    ];
    public $js = [
        'bootstrap-slider.min.js',
    ];

    public function init(){
        parent::init();
        $this->depends[] = BootstrapAsset::className();
    }
}
