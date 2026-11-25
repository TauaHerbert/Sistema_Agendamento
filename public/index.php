<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/src/autoload.php';

use App\Models\Agendamento;
use App\Models\BloqueioAgenda;
use App\Models\Unidade;

$unidade = new Unidade(
    nome: 'Unidade Central',
    endereco: 'Av. Principal, 100',
    horarioAbertura: '08:00',
    horarioFechamento: '17:00',
    tempoMedioMinutos: 20,
    ativa: true,
    id: 1
);

// Exemplo: Unidade fechada hoje das 10:00 às 14:00
$bloqueio = new BloqueioAgenda(
    unidadeId: 1,
    dataHoraInicio: new DateTimeImmutable('2026-11-24 10:00'),
    dataHoraFim: new DateTimeImmutable('2026-11-24 14:00'),
    motivo: 'Manutenção interna'
);

$slotManha = [new DateTimeImmutable('2026-11-24 10:20'), new DateTimeImmutable('2026-11-24 10:40')];
$slotTarde = [new DateTimeImmutable('2026-11-24 14:00'), new DateTimeImmutable('2026-11-24 14:20')];

echo "Unidade: {$unidade->getNome()}<br>";
echo "Protocolo exemplo: " . Agendamento::gerarProtocolo() . "<br>";
echo "Horário 10:20 bloqueado? " . ($bloqueio->conflitaCom($slotManha[0], $slotManha[1]) ? 'Sim' : 'Não') . "<br>";
echo "Horário 14:00 bloqueado? " . ($bloqueio->conflitaCom($slotTarde[0], $slotTarde[1]) ? 'Sim' : 'Não') . "<br>";