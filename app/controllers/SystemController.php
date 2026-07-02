<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\DepartmentModel;
use App\Models\SystemModel;

class SystemController extends Controller
{
    public function index(): void
    {
        $systemModel = new SystemModel();

        $systems = $systemModel->getAll();

        $this->view('systems/index', [
            'pageTitle' => 'Systems',
            'systems' => $systems
        ]);
    }

    public function create(): void
    {
        $departmentModel = new DepartmentModel();

        $departments = $departmentModel->getActiveDepartments();

        $this->view('systems/create', [
            'departments' => $departments,
            'pageTitle' => 'Create System',
        ]);
    }

    public function store(): void
    {
        $departmentId = (int) ($_POST['department_id'] ?? 0);
        $name         = trim($_POST['name'] ?? '');
        $description  = trim($_POST['description'] ?? '');
        $launchUrl    = trim($_POST['launch_url'] ?? '');
        $status       = (int) ($_POST['status'] ?? 1);

        if (
            $departmentId <= 0 ||
            $name === '' ||
            $launchUrl === ''
        ) {

            $_SESSION['old'] = [
                'department_id' => $departmentId,
                'name'          => $name,
                'description'   => $description,
                'launch_url'    => $launchUrl,
                'status'        => $status,
            ];

            toast_error('Please complete all required fields.');

            redirect('/systems/create');
        }

        $systemModel = new SystemModel();

        $result = $systemModel->create([
            'department_id' => $departmentId,
            'name'          => $name,
            'description'   => $description,
            'launch_url'    => $launchUrl,
            'status'        => $status,
        ]);

        if ($result) {

            unset($_SESSION['old']);

            toast_success('System added successfully.');

        } else {

            toast_error('Failed to add system.');

        }

        redirect('/systems');
    }
}