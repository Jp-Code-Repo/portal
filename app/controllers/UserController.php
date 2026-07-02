<?php

declare(strict_types=1);

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
            'pageTitle' => 'Create User',
            'departments' => $departments,
            'roles' => $roles,
        ]);
    }
}