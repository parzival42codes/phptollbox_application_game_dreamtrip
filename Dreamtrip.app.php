<?php declare(strict_types=1);

/**
 * Dreamtrip
 *
 * @author   Stefan Schlombs
 * @version  1.0.0
 * @modul    versionRequiredSystem 1.0.0
 * @modul    groupAccess 2,3,4
 * @modul    language_path_de_DE Dreamtrip
 * @modul    language_name_de_DE Dreamtrip
 * @modul    language_path_en_US Dreamtrip
 * @modul    language_name_en_US Dreamtrip
 */
class ApplicationDreamtrip_app extends Application_abstract
{

    public function setContent(): string
    {
        $this->pageData();

        /** @var ContainerExtensionTemplateLoad_cache_template $templateCache */
        $templateCache = Container::get('ContainerExtensionTemplateLoad_cache_template',
                                        Core::getRootClass(__CLASS__),
                                        'default');

        /** @var ContainerFactoryUser $user */
        $user = Container::getInstance('ContainerFactoryUser');

        /** @var ApplicationDreamtrip_crud_user $crudUser */
        $crudUser = Container::get('ApplicationDreamtrip_crud_user');
        $crudUser->setCrudUser($user->getUserId());
        $crudUser->findById();

        if ($crudUser->getCrudCard() === '') {
            $crudUser->setCrudCard('start');
        }

        /** @var ApplicationDreamtrip_crud $crudCard */
        $crudCard = Container::get('ApplicationDreamtrip_crud');
        $crudCard->setCrudIdent($crudUser->getCrudCard());
        $crudCard->findById(true);

        /** @var ApplicationDreamtrip $dreamTrip */
        $dreamTrip = Container::get('ApplicationDreamtrip',
                                    $crudCard->getCrudData());

        $dreamTrip->getChoices();

        /** @var ContainerExtensionTemplate $template */
        $template = Container::get('ContainerExtensionTemplate');
        $template->set($templateCache->getCacheContent()['default']);

        $template->parse();
        return $template->get();


    }

    public function pageData(): void
    {
        $thisClassName = Core::getRootClass(__CLASS__);

        /** @var ContainerIndexPage $page */
        $page = Container::getInstance('ContainerIndexPage');
        $page->setPageTitle(ContainerFactoryLanguage::get('/' . $thisClassName . '/meta/title'));
        $page->setPageDescription(ContainerFactoryLanguage::get('/' . $thisClassName . '/meta/description'));

        /** @var ContainerFactoryRouter $router */
        $router = Container::get('ContainerFactoryRouter');
        $router->analyzeUrl('index.php?application=' . $thisClassName . '');


        $breadcrumb = $page->getBreadcrumb();

        $breadcrumb->addBreadcrumbItem(ContainerFactoryLanguage::get('/' . $thisClassName . '/meta/title'),
                                       'index.php?application=ApplicationDreamtrip');


        /** @var ContainerFactoryMenu $menu */
        $menu = $this->getMenu();
        $menu->setMenuClassMain($thisClassName);

    }
}
