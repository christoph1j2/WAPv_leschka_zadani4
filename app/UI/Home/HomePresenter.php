<?php

declare(strict_types=1);

namespace App\UI\Home;

use App\Components\RegisterForm\RegisterComponent;
use App\Models\Kraj\KrajModel;
use App\Models\Obec\ObecModel;
use App\Models\User\UserModel;
use Nette;

ob_start();

final class HomePresenter extends Nette\Application\UI\Presenter
{
    /** @var UserModel @inject */
    public $userModel;

    /** @var KrajModel @inject */
    public $krajModel;

    /** @var ObecModel @inject */
    public $obecModel;

    function createComponentRegister(): ?Nette\ComponentModel\IComponent
    {
        return new RegisterComponent($this->userModel, $this->krajModel, $this->obecModel);
    }

    // Dynamic select box
    function handleZmenaOkresSelectBoxu($name, $choice)
    {
        if($this->isAjax())
        {
            // Seznam voleb
            $volby = $this->obecModel->seznamOkresuProSelect($choice);

            $options = "<option value='' selected>-- Zvolte Okres --</option>\n";
            foreach ($volby AS $key => $value)
            {
                // Pridani jedne volby do select boxu
                $options .= sprintf("<option value='%d'>%s</option>\n", $key, $value);
            }

            // Vraceni voleb pro select box
            $this->sendJson(['options' => $options]);
        }
    }

    function handleZmenaObecSelectBoxu($name, $choice)
    {
        if($this->isAjax())
        {
            $volby = $this->obecModel->seznamObciProSelect($choice);

            $options = "<option value='' selected> -- Zvolte Obec --</option>\n";
            foreach ($volby AS $key => $value)
            {
                $options .= sprintf("<option value='%d'>%s</option>\n", $key, $value);
            }
            $this->sendJson(['options' => $options]);
        }
    }

    function handleZmenaOkres2SelectBoxu($name, $choice)
    {
        if($this->isAjax())
        {
            // Seznam voleb
            $volby = $this->obecModel->seznamOkresuProSelect($choice);

            $options = "<option value='' selected>-- Zvolte Okres --</option>\n";
            foreach ($volby AS $key => $value)
            {
                // Pridani jedne volby do select boxu
                $options .= sprintf("<option value='%d'>%s</option>\n", $key, $value);
            }

            // Vraceni voleb pro select box
            $this->sendJson(['options' => $options]);
        }
    }

    function handleZmenaObec2SelectBoxu($name, $choice)
    {
        if($this->isAjax())
        {
            $volby = $this->obecModel->seznamObciProSelect($choice);

            $options = "<option value='' selected> -- Zvolte Obec --</option>\n";
            foreach ($volby AS $key => $value)
            {
                $options .= sprintf("<option value='%d'>%s</option>\n", $key, $value);
            }
            $this->sendJson(['options' => $options]);
        }
    }
}
