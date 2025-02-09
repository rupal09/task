<?php
namespace App\Controllers;

use App\Models\Task as TaskModel;
use CodeIgniter\Controller;

class Task extends Controller
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }

        $tasks = $this->taskModel->where('user_id', session()->get('logged_in'))->findAll();
        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks/create');
    }

    public function store()
    {
        $this->taskModel->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => 'pending',
            'user_id'     => session()->get('logged_in'),
        ]);
        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
    
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);
    
        if (!$task || $task['user_id'] != session()->get('logged_in')) {
            return redirect()->to('/tasks')->with('error', 'Task not found or unauthorized.');
        }
    
        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        if (!session()->has('logged_in')) {
            return redirect()->to('/login');
        }
    
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);
    
        if (!$task || $task['user_id'] != session()->get('logged_in')) {
            return redirect()->to('/tasks')->with('error', 'Task not found or unauthorized.');
        }
    
        $taskModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status'      => $this->request->getPost('status'),
        ]);
    
        return redirect()->to('/tasks')->with('success', 'Task updated successfully.');
    }

    public function updateStatus($id)
    {
        $taskModel = new TaskModel();
        $taskModel->update($id, ['status' => 'completed']);
        return redirect()->to('/tasks')->with('success', 'Task stattus updated successfully.');
    }

    public function delete($id)
    {
        $this->taskModel->delete($id);
        return redirect()->to('/tasks');
    }
}