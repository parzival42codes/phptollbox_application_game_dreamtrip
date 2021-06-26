<?php declare(strict_types=1);


class ApplicationDreamtrip_install_init extends Base
{

    public static function part1(): void
    {

        /** @var ApplicationDreamtrip_crud $crud */
        $crud = Container::get('ApplicationDreamtrip_crud');

        $crud->setCrudIdent('start');
        $crud->setCrudData('
        {
  "_": {
    "text": {
      "de_DE": "Dreamtrip",
      "en_US": "Dreamtrip"
    },
    "choices": {
      "go": {
        "duration": 120,
        "language": {
          "de_DE": "Dreamtrip",
          "en_US": "Dreamtrip"
        },
        "action": [
          {
            "action": "",
            "parameter": {
            }
          }
        ]
      }
    }
  }
}
        ');

    }

}
