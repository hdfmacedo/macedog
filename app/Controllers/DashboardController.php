<?php
namespace App\Controllers;

use App\Repositories\TaskRepository;

/**
 * Controller for the dashboard and tasks list.
 */
class DashboardController
{
    private TaskRepository $tasks;

    public function __construct()
    {
        $this->tasks = new TaskRepository();
    }

    /**
     * Show dashboard with tasks.
     */
    public function index()
    {
        $tasks = $this->tasks->getActiveTasks();
        require __DIR__ . '/../Views/dashboard.php';
    }
}
