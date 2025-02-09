<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Task Manager' ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/tasks">Task Manager</a>
        <ul class="navbar-nav ms-auto">
            <?php if (session()->has('logged_in')): ?>
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container mt-4">