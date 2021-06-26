<?php declare(strict_types=1);

/**
 * Dreamtrip
 *
 * @author   Stefan Schlombs
 * @version  1.0.0
 * @modul    versionRequiredSystem 1.0.0
 */
class ApplicationDreamtrip extends Base
{
    private array $jsonData = [];

    public function __construct(string $json)
    {
        $this->jsonData = json_decode($json,
                                      true);

        d($json);
        d($this->jsonData);

    }

    public function getChoices(): void
    {
        d($this->jsonData['_']['choices']);

        $choiceCollect = [];

        $choiceCollect[] = [
            'choiceNr' => '',
            'text'     => '',
            'required' => '',
            'duration' => '',
        ];

        eol();
    }

}
