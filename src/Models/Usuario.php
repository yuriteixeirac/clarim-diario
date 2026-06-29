<?php

namespace App\Models;

class Usuario
{
    private ?int $id;
    private string $username;
    private string $password;

    public function __construct(?int $id, string $username, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function comparePassword(string $purePassword): bool
    {
        return password_verify($purePassword, $this->password);
    }
}
