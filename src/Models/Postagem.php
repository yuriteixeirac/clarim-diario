<?php

namespace App\Models;

use DateTime;

class Postagem
{
    private ?int $id;
    private string $titulo;
    private string $corpo;
    private ?DateTime $criado_em;

    public function __construct(
        string $titulo,
        string $corpo,
        int $id = null,
        DateTime $criado_em = null,
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->corpo = $corpo;
        $this->criado_em = $criado_em;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getCorpo(): string
    {
        return $this->corpo;
    }

    public function getCriadoEm(): string
    {
        return $this->criado_em->format("Y-m-d H:i:s");
    }
}
