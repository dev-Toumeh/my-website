<?php

namespace Toumeh\MyWebsite\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Car extends AbstractEntity
{
    protected string $manufacturer = '';
    protected string $model = '';
    protected string $ps = '';

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getPs(): string
    {
        return $this->ps;
    }

    public function setPs(string $ps): void
    {
        $this->ps = $ps;
    }


}
