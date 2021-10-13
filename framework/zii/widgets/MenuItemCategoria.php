<?php

class MenuItemCategoria extends CWidget {

    public $items=array();

    public function init()
    {
        $categorias = new CActiveDataProvider('Categoria');
        $this->items = $categorias->data;
    }

    public function run()
    {
        $this->renderItems($this->items);
    }

    protected function renderItems($items){
        foreach ($items as $item) {
            $url = "/index.php?r=post/categoria&id={$item->categoria_id}";
            echo CHtml::openTag('a', array('class' => 'dropdown-item', 'href' => $url));
            echo CHtml::encode($item->nome);
            echo CHtml::closeTag('a');
        }
    }
}