<?php

namespace App\Models\Preklad;

use App\Models\BaseModel;
use Nette\Localization\Translator;

class PrekladModel extends BaseModel implements Translator
{
    /** @var string */
    protected $locale = 'cs';

    /** @var string */
    static protected $prekladPro = '';

    /** @var [] */
    protected $preklady = [];

    function getTableName(): string
    {
        return 'preklad';
    }

    function setLocale(string $locale)
    {
        $allowedLocales = ['cs', 'en', 'de'];
        $this->locale = in_array($locale, $allowedLocales) ? $locale : 'cs';
    }

    function getCurrentLocale(): string
    {
        return $this->locale;
    }

    public function nacistPreklady(string $locale)
    {
        $this->setLocale($locale);

        $this->preklady = $this->vsechnyZaznamy()
            ->fetchAll();
    }

    /**
     * @inheritDoc
     */
    public function translate(\Stringable|string $message, ...$parameters): string|\Stringable
    {
        foreach ($this->preklady as $preklad) {
            if ($preklad['cs'] === $message) {
                $key = "{$this->locale}";
                return $preklad[$key] ?? $message;
            }
        }

        return '??? ' . $message . ' ???';
        //return $message;
    }
}