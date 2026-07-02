<?php
    // active/highlight depending on the route
    $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $isDashboard = $currentUri === '/'
        || $currentUri === '';

    $isSystems = str_contains($currentUri, '/systems');
    $isDepartments = str_contains($currentUri, '/departments');
    $isUsers = str_contains($currentUri, '/users');
?>

<div class="sidebar p-3">

    <div class="sidebar-brand mb-4">

        <a
            href="/"
            class="text-decoration-none"
        >
            <i class="bi bi-plugin px-1"></i>
            Portal
        </a>

    </div>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="/" class="nav-link <?= $isDashboard ? 'active' : '' ?>">
                <i class="bi bi-columns-gap pe-1"></i>
                Dashboard
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/systems" class="nav-link <?= $isSystems ? 'active' : '' ?>">
                <i class="bi bi-boxes pe-1"></i>
                Systems
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/users" class="nav-link <?= $isUsers ? 'active' : '' ?>">
                <i class="bi bi-people-fill pe-1"></i>
                Users
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="/departments" class="nav-link <?= $isDepartments ? 'active' : '' ?>">
                <i class="bi bi-bank2 pe-1"></i>
                Departments
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link">
                <i class="bi bi-question-octagon-fill pe-1"></i>
                Requests
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link">
                <i class="bi bi-receipt pe-1"></i>
                Audit Logs
            </a>
        </li>

    </ul>

</div>