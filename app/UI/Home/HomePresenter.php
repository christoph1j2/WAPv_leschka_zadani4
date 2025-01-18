<?php

declare(strict_types=1);

namespace App\UI\Home;

use App\Components\RegisterForm\RegisterComponent;
use App\Models\Kraj\KrajModel;
use App\Models\Obec\ObecModel;
use App\Models\Preklad\PrekladModel;
use App\Models\User\UserModel;
use Latte\Essential\TranslatorExtension;
use Nette;

//ob_start();

final class HomePresenter extends Nette\Application\UI\Presenter
{
    /** @var UserModel @inject */
    public $userModel;

    /** @var KrajModel @inject */
    public $krajModel;

    /** @var ObecModel @inject */
    public $obecModel;

    /** @var PrekladModel */
    public $prekladModel;

    /** @persistent */
    public $locale = 'cs';

    public function __construct(PrekladModel $prekladModel)
    {
        $this->prekladModel = $prekladModel;
    }

    function beforeRender()
    {
        parent::beforeRender();

        // prekladac
        $extension = new TranslatorExtension(
            $this->prekladModel->translate(...)
        );
        $this->template->getLatte()->addExtension($extension);
        $this->prekladModel->nacistPreklady($this->locale);

        $this->template->locale = $this->locale;

    }

    function createComponentRegister(): ?Nette\ComponentModel\IComponent
    {
        // vytvori komponentu register a setne locale a translator
        $component = new RegisterComponent($this->userModel, $this->krajModel, $this->obecModel, $this->prekladModel);
        $component->setTranslator($this->prekladModel);
        $component->setLocale($this->locale);

        return $component;
    }

    // Dynamic select box
    function handleZmenaOkresSelectBoxu($name, $choice)
    {
        if($this->isAjax())
        {
            $this->prekladModel->nacistPreklady($this->locale);

            // Seznam voleb
            $volby = $this->obecModel->seznamOkresuProSelect($choice);

            $options = "<option value='' selected>{$this->prekladModel->translate('-- Zvolte okres --')}</option>\n";
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
            $this->prekladModel->nacistPreklady($this->locale);

            $volby = $this->obecModel->seznamObciProSelect($choice);

            $options = "<option value='' selected>{$this->prekladModel->translate('-- Zvolte obec --')}</option>\n";
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
            $this->prekladModel->nacistPreklady($this->locale);

            // Seznam voleb
            $volby = $this->obecModel->seznamOkresuProSelect($choice);

            $options = "<option value='' selected>{$this->prekladModel->translate('-- Zvolte okres --')}</option>\n";
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
            $this->prekladModel->nacistPreklady($this->locale);

            $volby = $this->obecModel->seznamObciProSelect($choice);

            $options = "<option value='' selected>{$this->prekladModel->translate('-- Zvolte obec --')}</option>\n";
            foreach ($volby AS $key => $value)
            {
                $options .= sprintf("<option value='%d'>%s</option>\n", $key, $value);
            }
            $this->sendJson(['options' => $options]);
        }
    }
}
