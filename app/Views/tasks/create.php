<?= view('layouts/header', ['title' => 'Create Task']) ?>
<h2>Create Task</h2>
<form action="/tasks/store" method="post">
    <div class="mb-3">
        <label>Title:</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description:</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Save Task</button>
    <a href="/tasks" class="btn btn-secondary">Back</a>
</form>
<?= view('layouts/footer') ?>