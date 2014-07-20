<?php

namespace yii\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

class SimpleMenu extends Widget{

    /**
     * @var items array
     */
    public $item;
    public $activeClass = "current";
    public $route;
    public $linkTemplate = "<li class='{active}'><a class = '{class}' href='{url}'>{name}</a></li>";
    protected $items = [];
    protected $filters = ['{class}','{name}','{url}','{active}'];


    public function run(){
      $this->route = Yii::$app->controller->getRoute();
      return  HTML::tag("ul",$this->reInitItems());
    }

    protected function reInitItems(){
      foreach($this->item as $it){
         $temp_t = $this->linkTemplate;
         if($this->route == $it['url']){
            $temp_t = str_ireplace('{active}',$this->activeClass,$temp_t);
         }
         $this->items[] =
             str_ireplace($this->filters,[$it['class'],$it['name'],Url::toRoute($it['url']),''],$temp_t);

      }
      return implode(' ',$this->items);
    }
}