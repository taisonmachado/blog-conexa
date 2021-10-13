<?php

class MenuItemCategoria extends CWidget {
    public function init()
    {
        $categorias = new CDataProvider('Categoria');
        $this->items = $categorias;
    }

    public function run()
    {
        $this->renderItems($this->items);
    }

    protected function renderItems($items){
        foreach ($items as $item) {
            $url = "index.php?r=post/categoria&id={$item->categoria_id}";
            echo CHtml::openTag('a', array('class' => 'dropdown-item', 'url' => $url));
            echo CHtml::encode($item->nome);
            echo CHtml::closeTag('a');
        }
    }
}