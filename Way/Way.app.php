<?php declare(strict_types=1);

/**
 * DreamtripWay
 *
 * DreamtripWay
 *
 * @author   Stefan Schlombs
 * @version  1.0.0
 * @modul    versionRequiredSystem 1.0.0
 * @modul    groupAccess 1,2,3,4
 * @modul    language_path_de_DE Dreamtrip
 * @modul    language_name_de_DE Dreamtrip
 * @modul    language_path_en_US Dreamtrip
 * @modul    language_name_en_US Dreamtrip
 */
class ApplicationDreamtripWay_app extends Application_abstract
{


    public function setContent(): string
    {


        $this->pageData();

        /** @var ContainerExtensionTemplateLoad_cache_template $templateCache */
        $templateCache = Container::get('ContainerExtensionTemplateLoad_cache_template',
                                        Core::getRootClass(__CLASS__),
                                        'default');


        /** @var ApplicationDeveloperSkeleton_crud $crud */
        $crud  = Container::get('ApplicationDeveloperSkeleton_crud');
        $count = $crud->count();

        /** @var ContainerExtensionTemplateParseCreatePaginationHelper $pagination */
        $pagination = Container::get('ContainerExtensionTemplateParseCreatePaginationHelper',
                                     '',
                                     $count);
        $pagination->create();

        /** @var ApplicationDeveloperSkeleton_crud $crud */
        $crud        = Container::get('ApplicationDeveloperSkeleton_crud');
        $crudImports = $crud->find([],
                                   [],
                                   [],
                                   $pagination->getPagesView(),
                                   $pagination->getPageOffset());


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
                                       'index.php?application=ApplicationDreamtripWay');

        $breadcrumb->addBreadcrumbItem(ContainerFactoryLanguage::get('/Dreamtrip\/breadcrumb'),
                                       'index.php?application=Dreamtrip');

        /** @var ContainerFactoryMenu $menu */
        $menu = $this->getMenu();
        $menu->setMenuClassMain($thisClassName);

    }
}
