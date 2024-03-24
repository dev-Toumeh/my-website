<?php

namespace Toumeh\MyWebsite\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Projects extends AbstractEntity {
    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var string
     */
    protected string $image = '';

    /**
     * @var string
     */
    protected string $description = '';

    /**
     * @var string
     */
    protected string $githubUrl = '';

    // Getters and setters for each property
    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getGithubUrl(): string {
        return $this->githubUrl;
    }

    public function setGithubUrl(string $githubUrl): void {
        $this->githubUrl = $githubUrl;
    }
}