<?php

namespace App\Components;

use Nette\Application\UI\Control;

abstract class BaseComponent extends Control
{
    public function __construct()
    {
    }

    protected function getTemplateFileName()
    {
        return str_replace('.php', '.latte', $this->getReflection()->getFileName());
    }

    protected function getTranslator()
    {
        return null;
    }

    protected function putParametersIntoTemplate(...$parameters)
    {

    }

    function render(...$parameters)
    {
        // Pripojeni sablony komponenty
        $this->template->setFile($this->getTemplateFileName());

        // Nastaveni translatoru
        if (null !== ($translator = $this->getTranslator())) {
            $this->template->setTranslator($translator);
        }

        // Predani lokalnich promennych do sablony
        $this->putParametersIntoTemplate(...$parameters);

        // Vykresleni
        $this->template->render();
    }
}