<?php

declare(strict_types=1);

namespace App\Models;

use InvalidArgumentException;

class Unidade
{
    private ?int $id;
    private string $nome;
    private string $endereco;
    private string $horarioAbertura;    
    private string $horarioFechamento;  
    private int $tempoMedioMinutos;    
    private bool $ativa;

    public function __construct(
        string $nome,
        string $endereco,
        string $horarioAbertura,
        string $horarioFechamento,
        int $tempoMedioMinutos = 20,
        bool $ativa = true,
        ?int $id = null
    ) {
        if ($tempoMedioMinutos <= 0) {
            throw new InvalidArgumentException('O tempo médio de atendimento deve ser maior que zero.');
        }

        $this->id = $id;
        $this->nome = trim($nome);
        $this->endereco = trim($endereco);
        $this->horarioAbertura = $horarioAbertura;
        $this->horarioFechamento = $horarioFechamento;
        $this->tempoMedioMinutos = $tempoMedioMinutos;
        $this->ativa = $ativa;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getEndereco(): string { return $this->endereco; }
    public function getHorarioAbertura(): string { return $this->horarioAbertura; }
    public function getHorarioFechamento(): string { return $this->horarioFechamento; }
    public function getTempoMedioMinutos(): int { return $this->tempoMedioMinutos; }
    public function isAtiva(): bool { return $this->ativa; }
}