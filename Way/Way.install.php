<?php declare(strict_types=1);


class ApplicationDreamtripWay_install extends ContainerFactoryModulInstall_abstract
{


    public function install(): void
    {

        $this->importMetaFromModul("_app");

    }

    public function uninstall(): void
    {

        $this->removeStdEntities();

    }

    public function update(): void
    {

    }

    public function refresh(): void
    {

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

    public function repair(): void
    {

    }
}
