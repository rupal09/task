<?= view('layouts/header', ['title' => 'Edit Task']) ?>

<h2>Edit Task</h2>

<form action="/tasks/update/<?= $task['id'] ?>" method="post">
    <div class="mb-3">
        <label>Title:</label>
        <input type="text" name="title" class="form-control" value="<?= esc($task['title']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Description:</label>
        <textarea name="description" class="form-control"><?= esc($task['description']) ?></textarea>
    </div>
    <div class="mb-3">
        <label>Status:</label>
        <select name="status" class="form-control">
            <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update Task</button>
    <a href="/tasks" class="btn btn-secondary">Cancel</a>
</form>

<?= view('layouts/footer') ?>
