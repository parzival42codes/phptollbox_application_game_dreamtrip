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
    private array $jsonData = [];

    public function setContent(): string
    {
        $container = Container::DIC();

        $this->pageData();

        /** @var ContainerExtensionTemplateLoad_cache_template $templateCache */
        $templateCache = Container::get('ContainerExtensionTemplateLoad_cache_template',
                                        Core::getRootClass(__CLASS__),
                                        'default,choice.container,choice.action.container,choice.action.item');

        /** @var ContainerFactoryUser $user */
        $user = $container->getDIC('/User');

//        d($user);
//        eol();

        /** @var ApplicationDreamtrip_crud_user $crudUser */
        $crudUser
            = Container::get('ApplicationDreamtrip_crud_user');
        $crudUser->setCrudUser($user->getUserId());
        $crudUser->findById();

        if ($crudUser->getCrudCard() === '') {
            $crudUser->setCrudCard('start');
        }

        /** @var ApplicationDreamtrip_crud $crudCard */
        $crudCard = Container::get('ApplicationDreamtrip_crud');
        $crudCard->setCrudIdent($crudUser->getCrudCard());
        $crudCard->findById(true);

        $this->jsonData = json_decode($crudCard->getCrudData(),
                                      true);

        /** @var ContainerExtensionTemplate $template */
        $template = Container::get('ContainerExtensionTemplate');
        $template->set($templateCache->getCacheContent()['default']);

//        d($this->getChoices($templateCache));
//        eol();

        $template->assign('choices',
                          $this->getChoices($templateCache));

        $template->parse();
        return $template->get();
    }

    private function pageData(): void
    {
        /** @var ContainerIndexPage $page */
        $page = Container::getInstance('ContainerIndexPage');
        $page->setPageTitle(ContainerFactoryLanguage::get('/' . $this->___getRootClass() . '/meta/title'));
        $page->setPageDescription(ContainerFactoryLanguage::get('/' . $this->___getRootClass() . '/meta/description'));

        /** @var ContainerFactoryRouter $router */
        $router = Container::get('ContainerFactoryRouter');
        $router->analyzeUrl('index.php?application=' . $this->___getRootClass() . '');

        $breadcrumb = $page->getBreadcrumb();

        $breadcrumb->addBreadcrumbItem(ContainerFactoryLanguage::get('/' . $this->___getRootClass() . '/meta/title'),
                                       'index.php?application=' . $this->___getRootClass());

        $menu = $this->getMenu();
        $menu->setMenuClassMain($this->___getRootClass());

    }

    protected function getChoices(ContainerExtensionTemplateLoad_cache_template $templateCache): string
    {
        d($this->jsonData['_']['choices']);

        /** @var ContainerExtensionTemplate $template */
        $template = Container::get('ContainerExtensionTemplate');
        $template->set($templateCache->getCacheContent()['choice.container']);

        $tableTcs = [];

        foreach ($this->jsonData['_']['choices'] as $choiceKey => $choiceItem) {

            d($choiceItem);

            $templateContent = '';

            foreach ($choiceItem['action'] as $action) {
                /** @var ContainerExtensionTemplate $templateActionItem */
                $templateActionItem = Container::get('ContainerExtensionTemplate');
                $templateActionItem->set($templateCache->getCacheContent()['choice.action.item']);
                $templateActionItem->assign('item',
                                            $action['action'] . ' - ' . implode(',',
                                                                                $action['parameter']));

                $templateActionItem->parse();
                $templateContent .= $templateActionItem->get();
            }

            /** @var ContainerExtensionTemplate $templateActionContainer */
            $templateActionContainer = Container::get('ContainerExtensionTemplate');
            $templateActionContainer->set($templateCache->getCacheContent()['choice.action.container']);
            $templateActionContainer->assign('content',
                                             $templateContent);
            $templateActionContainer->parse();

            $message = ContainerFactoryLanguage::getLanguageText($choiceItem['language']);

            $tableTcs[] = [
                'path'     => $choiceKey,
                'icon'     => '',
                'if'       => '',
                'action'   => $templateActionContainer->get(),
                'message'  => $message,
                'duration' => $choiceItem['duration'],
            ];
        }

        d($tableTcs);
        eol();

        $template->assign('Table_Table',
                          $tableTcs);

        $template->parse();
        return $template->get();
    }
}
