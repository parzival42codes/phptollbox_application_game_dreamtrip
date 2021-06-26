<?php

class ApplicationDreamtrip_crud_user extends Base_abstract_crud
{

    protected static string $table   = 'custom_dreamptrip_user';
    protected static string $tableId = 'crudUser';

    /**
     * @var int
     * @database type int;11
     * @database isPrimary
     */
    protected int $crudUser = 0;
    /**
     * @var string
     * @database type varchar;250
     */
    protected string $crudCard = '';
    /**
     * @var int
     * @database type int;11
     */
    protected int $crudLevel = 0;
    /**
     * @var int
     * @database type int;11
     */
    protected int $crudExp = 0;
    /**
     * @var float
     * @database type float;11
     */
    protected float $crudStrength = 5;
    /**
     * @var float
     * @database type float;11
     */
    protected float $crudPerception = 5;
    /**
     * @var float
     * @database type float;11
     */
    protected float $crudEndurance = 5;
    /**
     * @var float
     * @database type float;11
     */
    protected float $crudCharisma = 5;
    /**
     * @var float
     * @database type float;11
     */
    protected float $crudAgility = 5;
    /**
     * @var float
     * @database type float;11
     */
    protected float $crudLuck = 5;
    /**
     * @var int
     * @database type int;11
     */
    protected int $crudSwimming = 0;
    /**
     * @var int
     * @database type int;11
     */
    protected int $crudClimbing = 0;
    /**
     * @var int
     * @database type int;11
     */
    protected int $crudLinguistik = 0;

    /**
     * @return int
     */
    public function getCrudUser(): int
    {
        return $this->crudUser;
    }

    /**
     * @param int $crudUser
     */
    public function setCrudUser(int $crudUser): void
    {
        $this->crudUser = $crudUser;
    }

    /**
     * @return string
     */
    public function getCrudCard(): string
    {
        return $this->crudCard;
    }

    /**
     * @param string $crudCard
     */
    public function setCrudCard(string $crudCard): void
    {
        $this->crudCard = $crudCard;
    }

    /**
     * @return int
     */
    public function getCrudLevel(): int
    {
        return $this->crudLevel;
    }

    /**
     * @param int $crudLevel
     */
    public function setCrudLevel(int $crudLevel): void
    {
        $this->crudLevel = $crudLevel;
    }

    /**
     * @return int
     */
    public function getCrudExp(): int
    {
        return $this->crudExp;
    }

    /**
     * @param int $crudExp
     */
    public function setCrudExp(int $crudExp): void
    {
        $this->crudExp = $crudExp;
    }


}
