<?php
namespace App\Models;

/**
 * Domain model representing a task.
 */
class Task
{
    public int $id;
    public string $titulo;
    public string $descricao;
    public string $vencimento;
    public string $prioridade;
    public string $status;

    public function isLate(): bool
    {
        return strtotime($this->vencimento) < time();
    }
}
