<?php

namespace Toumeh\MyWebsite\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Urls extends AbstractEntity
{
    protected string $url = '';
    protected string $type = '';
    protected string $title = '';

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
