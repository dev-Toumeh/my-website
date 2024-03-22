<?php

namespace Toumeh\MyWebsite\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Qualifications extends AbstractEntity
{
    protected string $category = '';
    protected int $timeFrom;
    protected int $timeTo;

    protected string $city = '';

    protected string $company = '';

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    protected string $jobName = '';
    protected string $jobDescription = '';

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function getTimeFrom(): int
    {
        return $this->timeFrom;
    }

    public function setTimeFrom(int $timeFrom): void
    {
        $this->timeFrom = $timeFrom;
    }

    public function getTimeTo(): int
    {
        return $this->timeTo;
    }

    public function setTimeTo(int $timeTo): void
    {
        $this->timeTo = $timeTo;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getJobName(): string
    {
        return $this->jobName;
    }

    public function setJobName(string $jobName): void
    {
        $this->jobName = $jobName;
    }

    public function getJobDescription(): string
    {
        return $this->jobDescription;
    }

    public function setJobDescription(string $jobDescription): void
    {
        $this->jobDescription = $jobDescription;
    }
}
