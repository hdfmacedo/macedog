<?php
namespace App\Repositories;

use App\Helpers\Database;
use PDO;

/**
 * Repository for tasks stored in the database.
 */
class TaskRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Return active tasks with due date and status.
     */
    public function getActiveTasks(): array
    {
        $stmt = $this->pdo->query("SELECT id, titulo, descricao, vencimento, prioridade, status FROM tarefas WHERE status = 'aberta'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
