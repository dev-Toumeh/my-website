<?php

namespace Toumeh\MyWebsite\Domain\Model;


use Exception;
use InvalidArgumentException;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Contacts extends AbstractEntity {
    public const string NAME = 'name';
    public const string EMAIL = 'email';
    public const string PHONE = 'phone';
    public const string MESSAGE = 'message';

    protected string $name = '';
    protected string $email = '';
    protected string $phone = '';
    protected string $message = '';

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = htmlspecialchars(strip_tags($name));
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException("Invalid email format");
        }
    }

    public function getPhone(): string {
        return $this->phone;
    }

    public function setPhone(string $phone): void {
        if (preg_match('/^(\+49|0049)[1-9]\d{6,12}$/', $phone)) {
            $this->phone = $phone;
        } else {
            throw new InvalidArgumentException("Invalid phone format");
        }
    }

    public function getMessage(): string {
        return $this->message;
    }

    public function setMessage(string $message): void {
        $this->message = htmlspecialchars(strip_tags($message));
    }

    public function getData(array $data): array {
            $this->setName($data[self::NAME] ?? '');
            $this->setEmail($data[self::EMAIL] ?? '');
            $this->setPhone($data[self::PHONE] ?? '');
            $this->setMessage($data[self::MESSAGE] ?? '');

            return [
                self::NAME => $this->getName(),
                self::EMAIL => $this->getEmail(),
                self::PHONE => $this->getPhone(),
                self::MESSAGE => $this->getMessage(),
            ];
    }
}