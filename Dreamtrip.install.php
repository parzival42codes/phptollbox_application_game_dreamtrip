<?php declare(strict_types=1);


class ApplicationDreamtrip_install extends ContainerFactoryModulInstall_abstract
{


    public function install(): void
    {
        $this->importMetaFromModul('_app');
        $this->importQueryDatabaseFromCrud('ApplicationDreamtrip_crud');
        $this->importQueryDatabaseFromCrud('ApplicationDreamtrip_crud_user');

        $cardList = [
            'start',
        ];

        foreach ($cardList as $cardListItem) {
            /** @var ContainerFactoryFile $cardFile */
            $cardFile = Container::get('ContainerFactoryFile',
                                       'ApplicationDreamtripDataCard_template_' . $cardListItem . '_json');
            $cardFile->load();
            $cardFileData = $cardFile->get();

            $cardFile->decode();

            /** @var array $cardFileDecode */
            $cardFileDecode = $cardFile->get();

            $this->installFunction(function () {
                /** @var array $data */ /*$before*/

                /** @var ApplicationDreamtrip_crud $crud */
                $crud = Container::get('ApplicationDreamtrip_crud');
                $crud->setCrudIdent($data['ident']);
                $crud->setCrudPath($data['path']);
                $crud->setCrudData($data['data']);

                $progressData['message'] = $crud->insert(true);

                /*$after*/
            },
                [
                    'ident' => $cardListItem,
                    'path'  => $cardFileDecode['path'],
                    'data'  => $cardFileData,
                ]);
        }

    }

    public function uninstall(): void
    {
        $this->removeStdEntities();
    }

    public function activate(): void
    {
        $this->importRoute();
        $this->importMenu();
        $this->importLanguage();
    }

    public function deactivate(): void
    {
        $this->removeStdEntitiesDeactivate();
    }


}
