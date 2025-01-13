<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\leschka_zadani4\app\UI/@layout.latte */
final class Template_915dfd83bb extends Latte\Runtime\Template
{
	public const Source = 'C:\\xampp\\htdocs\\leschka_zadani4\\app\\UI/@layout.latte';

	public const Blocks = [
		['scripts' => 'blockScripts'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<title>';
		if ($this->hasBlock('title')) /* line 7 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('stripHtml', $ʟ_fi, $s));
			}) /* line 7 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
	<style>
		.flash-message {
			padding: 1rem;
			margin-bottom: 1rem;
			border-radius: 4px;
			animation: slideIn 0.3s ease-out;
		}

		.flash-success {
			background-color: #d4edda;
			border-left: 4px solid #28a745;
			color: #155724;
		}

		.flash-error {
			background-color: #f8d7da;
			border-left: 4px solid #dc3545;
			color: #721c24;
		}

		.flash-info {
			background-color: #cce5ff;
			border-left: 4px solid #0d6efd;
			color: #004085;
		}

		.flash-warning {
			background-color: #fff3cd;
			border-left: 4px solid #ffc107;
			color: #856404;
		}

		@keyframes slideIn {
			from {
				transform: translateY(-20px);
				opacity: 0;
			}
			to {
				transform: translateY(0);
				opacity: 1;
			}
		}

		#banner{
			max-width: 512px;
			margin: auto;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		#banner h1 {
			max-width: 512px;
			border-bottom: 1px gray solid;
		}
	</style>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap JS Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 68 */;
		echo '/assets/jQuery/jquery-3.7.1.js" type="application/javascript"></script>

	<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 71 */;
		echo '/assets/Nette/nette.ajax.js" type="application/javascript"></script>

	<script type="application/javascript">
		$(function ()
		{
			// Inicializace Nette pluginu
			$.nette.init();
		});
	</script>
</head>

<body class="bg-light">
';
		$this->renderBlock('content', [], 'html') /* line 84 */;
		$this->renderBlock('scripts', get_defined_vars()) /* line 89 */;
		echo '</body>
</html>
';
	}


	/** {block scripts} on line 89 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://unpkg.com/nette-forms@3"></script>
';
	}
}
