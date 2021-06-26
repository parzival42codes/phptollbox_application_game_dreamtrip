<?php

class ApplicationDreamtrip_crud_choice extends Base_abstract_crud
{

    protected static string $table   = 'custom_dreamptrip_choice';
    protected static string $tableId = 'crudIdent';

    /**
     * @var int|null
     * @database type int;11
     * @database isPrimary
     * @database default ContainerFactoryDatabaseEngineMysqlTable::DEFAULT_AUTO_INCREMENT
     */
    protected  ?int $crudId = null;

    /**
     * @var string
     * @database type varchar;250
     * @database isIndex
     */
    protected string $crudIdent = '';
    /**
     * @var string
     * @database type text
     */
    protected string $crudText = '';
    /**
     * @var string
     * @database type text
     */
    protected string $crudParameter = '';


    /**
     * @return string
     */
    public function getCrudIdent(): string
    {
        return $this->crudIdent;
    }

    /**
     * @param string $crudIdent
     */
    public function setCrudIdent(string $crudIdent): void
    {
        $this->crudIdent = $crudIdent;
    }

    /**
     * @return string
     */
    public function getCrudData(): string
    {
        return $this->crudText;
    }

    /**
     * @param string $crudText
     */
    public function setCrudData(string $crudText): void
    {
        $this->crudText = $crudText;
    }


}
