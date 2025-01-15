<?php

namespace App\Components\RegisterForm;

use App\Components\BaseComponent;
use App\Forms\Register\RegisterForm;
use App\Models\Kraj\KrajModel;
use App\Models\Obec\ObecModel;
use App\Models\Preklad\PrekladModel;
use App\Models\User\UserModel;
use Latte\Essential\TranslatorExtension;
use Nette;
use Tracy\Debugger;

class RegisterComponent extends BaseComponent
{
    /** @var UserModel */
    private $userModel;

    /** @var KrajModel */
    private $krajModel;

    /** @var ObecModel */
    private $obecModel;

    /** @var PrekladModel  */
    public $prekladModel;

    /** @persistent */
    public $locale = 'cs';

    public function __construct(UserModel $userModel, KrajModel $krajModel, ObecModel $obecModel, PrekladModel $prekladModel)
    {
        parent::__construct();



        $this->userModel = $userModel;
        $this->krajModel = $krajModel;
        $this->obecModel = $obecModel;
        $this->prekladModel = $prekladModel;

        if (!$this->prekladModel) {
            throw new \RuntimeException('PrekladModel was not properly injected');
        }
    }

    function beforeRender()
    {
        parent::beforeRender();

        $latte = $this->template->getLatte();

        $extension = new TranslatorExtension(
            $this->prekladModel->translate(...)
        );
        $latte->addExtension($extension);
        $this->prekladModel->nacistPreklady($this->locale);

        $this->template->setTranslator($this->prekladModel);

    }

    function createComponentForm(): ?Nette\ComponentModel\IComponent
    {
        return new RegisterForm(
            $this->userModel,
            $this->krajModel,
            $this->obecModel,
            $this->prekladModel,
        );
    }

    public function render(...$parameters): void
    {
        // For debugging
        if (!$this->krajModel) {
            throw new \RuntimeException('KrajModel is null during render');
        }

        parent::render();
    }
}