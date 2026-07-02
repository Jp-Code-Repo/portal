<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\DepartmentModel;

class DepartmentController extends Controller
{
    public function index(): void
    {
        $departmentModel = new DepartmentModel();

        $departments = $departmentModel->getAll();

        $this->view('departments/index', [
            'pageTitle' => 'Departments',
            'departments' => $departments
        ]);
    }

    public function create(): void
    {
        $this->view('departments/create', [
            'pageTitle' => 'Create Department',
        ]);
    }

    public function store(): void
    {
        $name = trim($_POST['name'] ?? '');

        $status = (int) ($_POST['status'] ?? 1);

        if ($name === '') {

            $_SESSION['old'] = [
                'name' => $name,
                'status' => $status,
            ];

            toast_error('Department name is required');

            redirect('/departments/create');
        }

        $departmentModel = new DepartmentModel();

        $result = $departmentModel->create([
            'name' => $name,
            'status' => $status,
        ]);

        if ($result) {

            toast_success('Department added successfully.');

            unset($_SESSION['old']);

        } else {

            toast_error('Failed to add department.');

        }

        redirect('/departments');
    }
}