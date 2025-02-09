<?= view('layouts/header', ['title' => 'Tasks']) ?>
<h2>My Tasks</h2>
<a href="/tasks/create" class="btn btn-success mb-3">Create Task</a>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['description']) ?></td>
                <td>
                    <span class="badge bg-<?= $task['status'] == 'completed' ? 'success' : 'warning' ?>">
                        <?= ucfirst($task['status']) ?>
                    </span>
                </td>
                <td>
                    <?php if ($task['status'] == 'pending'): ?>
                        <a href="/tasks/complete/<?= $task['id'] ?>" class="btn btn-primary btn-sm">Mark as Done</a>
                    <?php endif; ?>
                    <a href="/tasks/delete/<?= $task['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= view('layouts/footer') ?>