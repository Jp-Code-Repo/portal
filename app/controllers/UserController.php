<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\DepartmentModel;
use App\Models\RoleModel;

class UserController extends Controller
{
    public function index(): void
    {
        $this->view('users/index', [
            'pageTitle' => 'Users',
        ]);
    }

    public function create(): void
    {
        $departmentModel = new DepartmentModel();

        $roleModel = new RoleModel();

        $departments = $departmentModel->getActiveDepartments();

        $roles = $roleModel->getActiveRoles();

        $this->view('users/create', [
            'pageTitle'   => 'Create User',
            'departments' => $departments,
            'roles'       => $roles,
        ]);
    }
}