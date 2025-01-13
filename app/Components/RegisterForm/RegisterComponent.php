<?php

namespace App\Components\RegisterForm;

use App\Components\BaseComponent;
use App\Forms\Register\RegisterForm;
use App\Models\Kraj\KrajModel;
use App\Models\Obec\ObecModel;
use App\Models\User\UserModel;
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

    public function __construct(UserModel $userModel, KrajModel $krajModel, ObecModel $obecModel)
    {
        parent::__construct();

        if (!$krajModel)
        {
            throw new \RuntimeException('KrajModel cannot be null');
        }

        $this->userModel = $userModel;
        $this->krajModel = $krajModel;
        $this->obecModel = $obecModel;
    }

    function createComponentForm(): ?Nette\ComponentModel\IComponent
    {
        return new RegisterForm(
            $this->userModel,
            $this->krajModel,
            $this->obecModel
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