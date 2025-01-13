<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\leschka_zadani4\app\Components\RegisterForm\RegisterComponent.latte */
final class Template_f7d18b0cb5 extends Latte\Runtime\Template
{
	public const Source = 'C:\\xampp\\htdocs\\leschka_zadani4\\app\\Components\\RegisterForm\\RegisterComponent.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
';
		foreach ($flashes as $flash) /* line 4 */ {
			$alertClass = match ($flash->type) {
				'success' => 'alert-success',
				'error' => 'alert-danger',
				'info' => 'alert-info',
				'warning' => 'alert-warning',
				default => 'alert-info',
			}
			/* line 5 */;
			echo '                <div class="mx-3 alert ';
			echo LR\Filters::escapeHtmlAttr($alertClass) /* line 12 */;
			echo ' alert-dismissible fade show" role="alert">
                    ';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 13 */;
			echo '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
';

		}

		echo '            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Registrační formulář</h2>

                    <p class="text-center mb-4">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($presenter->link('this', ['locale' => 'cs']))) /* line 22 */;
		echo '">CZ</a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($presenter->link('this', ['locale' => 'en']))) /* line 23 */;
		echo '">EN</a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($presenter->link('this', ['locale' => 'de']))) /* line 24 */;
		echo '">DE</a>
                    </p>

';
		foreach ($flashes as $flash) /* line 27 */ {
			echo '                    <div class="alert alert-';
			echo LR\Filters::escapeHtmlAttr($flash->type) /* line 27 */;
			echo ' alert-dismissible fade show" role="alert">
                        ';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 28 */;
			echo '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
';

		}

		echo '
                    ';
		$form = $this->global->formsStack[] = $this->global->uiControl['form'] /* line 32 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, ['class' => 'needs-validation']) /* line 32 */;
		echo "\n";
		ob_start(fn() => '');
		try {
			echo '                        <ul class="alert alert-danger">';
			ob_start();
			try {
				echo "\n";
				foreach ($form->getOwnErrors() as $error) /* line 34 */ {
					echo '                            <li>';
					echo LR\Filters::escapeHtmlText($error) /* line 34 */;
					echo '</li>
';

				}

				echo '                        ';

			} finally {
				$ʟ_ifc[0] = rtrim(ob_get_flush()) === '';
			}
			echo '</ul>
';

		} finally {
			if ($ʟ_ifc[0] ?? null) {
				ob_end_clean();

			} else {
				echo ob_get_clean();
			}
		}
		echo '
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 40 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['username']->hasErrors() ? ' is-invalid' : '')]) /* line 41 */;
		echo '
                                    <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('username', $this->global)->getError()) /* line 42 */;
		echo '</div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 47 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['name']->hasErrors() ? ' is-invalid' : '')]) /* line 48 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getError()) /* line 49 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('surname', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 52 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('surname', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['surname']->hasErrors() ? ' is-invalid' : '')]) /* line 53 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('surname', $this->global)->getError()) /* line 54 */;
		echo '</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 60 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['password']->hasErrors() ? ' is-invalid' : '')]) /* line 61 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('password', $this->global)->getError()) /* line 62 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('password_confirm', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 65 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('password_confirm', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['password_confirm']->hasErrors() ? ' is-invalid' : '')]) /* line 66 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('password_confirm', $this->global)->getError()) /* line 67 */;
		echo '</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 72 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['email']->hasErrors() ? ' is-invalid' : '')]) /* line 73 */;
		echo '
                                    <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getError()) /* line 74 */;
		echo '</div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title h5 mb-3">Adresa</h3>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('kraj', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 84 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('kraj', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['kraj']->hasErrors() ? ' is-invalid' : '')]) /* line 85 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('kraj', $this->global)->getError()) /* line 86 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('okres', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 89 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('okres', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['okres']->hasErrors() ? ' is-invalid' : '')]) /* line 90 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('okres', $this->global)->getError()) /* line 91 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('city', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 94 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('city', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['city']->hasErrors() ? ' is-invalid' : '')]) /* line 95 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('city', $this->global)->getError()) /* line 96 */;
		echo '</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('postal_code', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 101 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('postal_code', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['postal_code']->hasErrors() ? ' is-invalid' : '')]) /* line 102 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('postal_code', $this->global)->getError()) /* line 103 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('street', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 106 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('street', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['street']->hasErrors() ? ' is-invalid' : '')]) /* line 107 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('street', $this->global)->getError()) /* line 108 */;
		echo '</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="card-title h5 mb-3">Korespondenční adresa</h3>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('correspondence_kraj', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 119 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('correspondence_kraj', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['correspondence_kraj']->hasErrors() ? ' is-invalid' : '')]) /* line 120 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('correspondence_kraj', $this->global)->getError()) /* line 121 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('correspondence_okres', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 124 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('correspondence_okres', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['correspondence_okres']->hasErrors() ? ' is-invalid' : '')]) /* line 125 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('correspondence_okres', $this->global)->getError()) /* line 126 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('correspondence_city', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 129 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('correspondence_city', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['correspondence_city']->hasErrors() ? ' is-invalid' : '')]) /* line 130 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('correspondence_city', $this->global)->getError()) /* line 131 */;
		echo '</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('correspondence_postal_code', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 136 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('correspondence_postal_code', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['correspondence_postal_code']->hasErrors() ? ' is-invalid' : '')]) /* line 137 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('correspondence_postal_code', $this->global)->getError()) /* line 138 */;
		echo '</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('correspondence_street', $this->global)->getLabel())?->addAttributes(['class' => 'form-label']) /* line 141 */;
		echo '
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('correspondence_street', $this->global)->getControl()->addAttributes(['class' => 'form-control' . ($form['correspondence_street']->hasErrors() ? ' is-invalid' : '')]) /* line 142 */;
		echo '
                                        <div class="invalid-feedback">';
		echo LR\Filters::escapeHtmlText(Nette\Bridges\FormsLatte\Runtime::item('correspondence_street', $this->global)->getError()) /* line 143 */;
		echo '</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            ';
		echo Nette\Bridges\FormsLatte\Runtime::item('send', $this->global)->getControl()->addAttributes(['class' => 'btn btn-primary btn-lg']) /* line 150 */;
		echo '
                        </div>
                    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 152 */;

		echo '
                </div>
            </div>
        </div>
    </div>
</div>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '4, 27', 'error' => '34'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}
