<?php

namespace Toumeh\MyWebsite\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Skills extends AbstractEntity
{

    protected string $category = '';
    protected string $name = '';

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}