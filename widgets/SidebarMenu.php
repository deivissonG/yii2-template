<?php
namespace app\widgets;

use kartik\icons\Icon;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SidebarMenu extends Widget
{
    public $links = [];

    public $headerOptions = [
        'class' => 'sidebar-header p-2 bg-gradient text-white d-flex align-items-center shadow-sm'
    ];

    public $containerOptions = [
        'class' => 'sidebar-body mt-4'
    ];

    public $itemContainerClass = 'submenu d-flex flex-row p-2 px-3 my-1 mx-auto justify-content-between align-items-center text-dark text-decoration-none';

    public $arrowIcon = 'chevron-down';

    public $iconFramework = Icon::FAS;

    public $iconClasses = [
        'fa-fw',
        'me-3',
        'ms-1'
    ];

    public function init()
    {
        parent::init();

        if (is_array($this->iconClasses)) {
            $this->iconClasses = implode(' ', $this->iconClasses);
        }
    }

    public function run()
    {
        echo Html::beginTag('div', $this->containerOptions);
        foreach ($this->links as $label => $config) {
            if ($this->isGroup($config)) {
                echo Html::tag('p', $label, ['class' => 'mb-0 m-3 fw-bold text-uppercase text-muted']);
                foreach ($config as $row) {
                    $this->renderItem($row);
                }
                echo Html::tag('p', '', ['class' => 'm-4']);
            } else {
                $this->renderItem($config);
            }
        }

        echo Html::endTag('div');
    }

    private function renderItem($config = []) {
        $items = ArrayHelper::getValue($config, 'items', []);
        $label = ArrayHelper::getValue($config, 'label', '');
        $id = strtolower(preg_replace('/\W+/', '', $label)) . '-submenu';
        $linkOptions = [
            'href' => ArrayHelper::getValue($config, 'url', '#'),
            'class' => $this->itemContainerClass,
        ];
        if (!empty($items)) {
            $linkOptions = array_merge($linkOptions, [
                'data-bs-toggle' => 'collapse',
                'aria-expanded' => 'false',
                'href' => '#' . $id,
                'aria-controls' => $id
            ]);
        }

        echo Html::beginTag('a', $linkOptions);
        echo Html::beginTag('div', ['class' => 'd-flex flex-row align-items-center']);
        if (!empty($icon = ArrayHelper::getValue($config, 'icon', ''))) {
            if ($icon === strip_tags($icon)) {
                echo Icon::show($icon, ['class' => $this->iconClasses], $this->iconFramework);
            } else {
                echo $icon;
            }
        }
        echo Html::tag('p', $label, ['class' => 'mb-0']);
        echo Html::endTag('div');
        if(!empty($items)) {
            echo Icon::show($this->arrowIcon, ['class' => 'mx-2']);
            echo Html::endTag('a');

            echo Html::beginTag('div', ['class' => 'collapse ps-4', 'id' => $id]);
            foreach ($items as $item) {
                $label = ArrayHelper::getValue($item, 'label', '');
                $url = ArrayHelper::getValue($item, 'url', '');
                echo Html::a($label, $url, ['class' => 'd-flex flex-row flex-nowrap py-2 ps-4 text-dark opacity-75 text-decoration-none']);
            }
            echo Html::endTag('div');

        } else {
            echo Html::endTag('a');
        }
    }

    private function isGroup($item){
        return empty(ArrayHelper::getValue($item, 'label')) && !empty(ArrayHelper::getValue($item, '0.label'));
    }

}