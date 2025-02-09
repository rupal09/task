<?= view('layouts/header', ['title' => 'Register']) ?>
<h2>Register</h2>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<form action="/register-user" method="post">
    <div class="mb-3">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <a href="/login" class="btn btn-link">Login</a>
</form>
<?= view('layouts/footer') ?>