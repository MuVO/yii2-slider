Bootstrap Slider
================

## An extension for Yii2

# Installing

```
~$ composer require muvo/yii2-slider "*"
```
or add following string in your `composer.json` into `require` section:
```
	"muvo/yii2-slider": "*"
```

### then do
```
~$ composer update
```

# Usage
After successful install you can use a slider as general widget in your view-files, for example:
```
    <div>
        <?=\muvo\yii\slider\Widget::widget([
            'name' => 'call_intensity',
            'value' => $predefined_value,
            'sliderOptions' => [
                'min' => 0.5,
                'max' => 8,
                'step' => 0.5,
            ],
        ])?>
    </div>
```

If you don't want to use a native boottrap assets (for example, you theme/layout already has pre-defined bootstrap), you can add  `useNativeBootstrap` option to your widget:
```
<div class="col-sm-8">
    <?=\muvo\yii\slider\Widget::widget([
        'useNativeBootstrap' => false,
            'name' => 'call_intensity',
            'value' => $predefined_value,
        …
    ])?>
</div>
```

# Options for widget
Available options, to be passed for config widget:
 * `id` ID for widget, will be passed to HTML-tag of widget
 * `name` HTML «name» attribute for HTML-input tag
 * `value` Predefined value for HTML-input
 * `sliderOptions` Array with config options, supported by [slider-bootstrap](https://github.com/seiyria/bootstrap-slider#options)

# Credits
Vladislav Muschinskikh <i@unixoid.su> © 2016
