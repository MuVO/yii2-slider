<?php namespace muvo\yii\slider;

class AssetBundle extends \yii\web\AssetBundle
{
    public $useNativeBootstrap = true;
    public $sourcePath = '@bower/seiyria-bootstrap-slider/dist';
    public $css = [
        'css/bootstrap-slider.min.css',
    ];
    public $js = [
        'bootstrap-slider.min.js',
    ];
}
