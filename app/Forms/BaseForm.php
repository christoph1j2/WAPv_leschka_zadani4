<?php

namespace App\Forms;

use Contributte\FormsBootstrap\BootstrapForm;
use Nette\Utils\ArrayHash;

abstract class BaseForm extends BootstrapForm
{
    // Errory
    const   EMPTY_FIELD = "Položka '%label' musí být vyplněna.",
            USER_EXISTS = "Toto uživatelské jméno již existuje.";

    public function __construct($container = null)
    {
        // Inicializace rodice
        parent::__construct($container);

        $this->initializeForm();
    }

    protected function initializeForm()
    {
        // Pridani polozek
        $this->pridatPolozky();

        // Odeslani formulare
        $this->addSubmit('send', 'Odeslat formulář');

        $this->onValidate[] = [$this, 'validateForm'];
        $this->onSuccess[] = [$this, 'formSucceeded'];


        // post
        $this->postProcessing();
    }

    abstract protected function formSucceeded(BootstrapForm $form, ArrayHash $data);
    abstract protected function validateForm(BootstrapForm $form, ArrayHash $data);

    //* Metody k vycisteni dat proti xss a sql injection
    abstract protected function sanitizeData(ArrayHash $data);
    protected function sanitizeText(string $text): string
    {
        $text = strip_tags($text);
        $text = htmlspecialchars($text, ENT_QUOTES|ENT_HTML5, 'UTF-8');
        $text = trim($text);

        return $text;
    }

    protected function pridatPolozky()
    {

    }

    protected function postProcessing()
    {

    }
}