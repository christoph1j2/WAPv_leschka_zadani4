<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\leschka_zadani4\app\UI\Home/default.latte */
final class Template_2cc23e58aa extends Latte\Runtime\Template
{
	public const Source = 'C:\\xampp\\htdocs\\leschka_zadani4\\app\\UI\\Home/default.latte';

	public const Blocks = [
		['content' => 'blockContent', 'title' => 'blockTitle'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '9'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div id="banner" class="bg-white px-3 py-1 my-2 rounded">
';
		$this->renderBlock('title', get_defined_vars()) /* line 5 */;
		echo '</div>

<div id="content">
';
		foreach ($flashes as $flash) /* line 9 */ {
			echo '	<div class="mx-3 flash-message flash-';
			echo LR\Filters::escapeHtmlAttr($flash->type) /* line 9 */;
			echo '">
		';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 10 */;
			echo '
	</div>
';

		}

		$ʟ_tmp = $this->global->uiControl->getComponent('register');
		if ($ʟ_tmp instanceof Nette\Application\UI\Renderable) $ʟ_tmp->redrawControl(null, false);
		$ʟ_tmp->render() /* line 12 */;

		echo '</div>

<script type="application/javascript">
	$(function()
	{
		// Poveseni funkce pro zmenu selectu Kraj, ...
		$(\'select[name="kraj"]\').on(\'change\', function ()
		{
			// Aktualni select box (array)
			let select = $(this)[0];

			// Vytvoreni AJAX pozadavku + zpracovani odpovedi
			$.nette.ajax({
				url: ';
		echo LR\Filters::escapeJs($this->global->uiPresenter->link('ZmenaOkresSelectBoxu!')) /* line 26 */;
		echo ',
				data: { name: select.name, choice: select.value }
			})
					.done(function (payload) {
						console.log(payload);
						let dependent = $("select[data-depends=\'" + select.name + "\']")[0];

						if (dependent) {
							dependent.innerHTML=payload.options;

							$(dependent).prop(\'disabled\', false).change();
						}
					})
					.fail(function () {
						console.error("failed to fetch");
					});
		});

		// Poveseni funkce pro zmenu selectu Okres
		$(\'select[name="okres"]\').on(\'change\', function (){
			let select = $(this)[0];

			$.nette.ajax({
				url: ';
		echo LR\Filters::escapeJs($this->global->uiPresenter->link('ZmenaObecSelectBoxu!')) /* line 49 */;
		echo ',
				data: { name: select.name, choice: select.value }
			})
					.done(function (payload){
						console.log(payload);
						let dependent = $("select[data-depends=\'" + select.name + "\']")[0];

						if(dependent){
							dependent.innerHTML = payload.options;
							$(dependent).prop(\'disabled\', false);
							$(dependent).change();
						}
					})
					.fail(function (){
						console.error("failed to fetch")
					});
		});

		// Korespondenci adresy ...
		$(\'select[name="correspondence_kraj"]\').on(\'change\', function (){
			let select = $(this)[0];

			$.nette.ajax({
				url: ';
		echo LR\Filters::escapeJs($this->global->uiPresenter->link('ZmenaOkres2SelectBoxu!')) /* line 72 */;
		echo ',
				data: { name: select.name, choice: select.value }
			})
					.done(function (payload){
						console.log(payload);
						let dependent = $("select[data-depends=\'" + select.name + "\']")[0];

						if(dependent){
							dependent.innerHTML = payload.options;
							$(dependent).prop(\'disabled\', false);
							$(dependent).change();
						}
					})
					.fail(function (){
						console.error("failed to fetch")
					});
		});
		$(\'select[name="correspondence_okres"]\').on(\'change\', function (){
			let select = $(this)[0];

			$.nette.ajax({
				url: ';
		echo LR\Filters::escapeJs($this->global->uiPresenter->link('ZmenaObec2SelectBoxu!')) /* line 93 */;
		echo ',
				data: { name: select.name, choice: select.value }
			})
					.done(function (payload){
						console.log(payload);
						let dependent = $("select[data-depends=\'" + select.name + "\']")[0];

						if(dependent){
							dependent.innerHTML = payload.options;
							$(dependent).prop(\'disabled\', false);
							$(dependent).change();
						}
					})
					.fail(function (){
						console.error("failed to fetch")
					});
		});

		$(\'form\').on(\'submit\', function (event) {
			event.preventDefault();

			let formData = $(this).serializeArray();
			console.log(formData);

			console.log(\'Okres:\', $(\'select[name="okres"]\').val());
			console.log(\'Obec:\', $(\'select[name="city"]\').val());
			this.submit();
		})
	});
</script>


';
	}


	/** n:block="title" on line 5 */
	public function blockTitle(array $ʟ_args): void
	{
		echo '	<h1 class="text-center">Nette, Zadání 4</h1>
';
	}
}
