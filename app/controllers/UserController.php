<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;

use App\Core\Validation\Validator;

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

    public function store(): void
    {
        $validator = new Validator(

            $_POST,

            [
                'dept_id'        => 'required',
                'user_type'      => 'required',
                'role'           => 'required',
                'inst_no'        => 'required',
                'id_no'          => 'required',
                'last_name'      => 'required',
                'first_name'     => 'required',
                'username'       => 'required',
                'email'          => 'required|email',
                'status'         => 'required',
            ],

            [
                'dept_id'    => 'Department',
                'user_type'  => 'User Type',
                'inst_no'    => 'Institutional Number',
                'id_no'      => 'ID Number',
                'last_name'  => 'Last Name',
                'first_name' => 'First Name',
                'username'   => 'Username',
                'email'      => 'Email Address',
                'role'       => 'Role',
                'status'     => 'Status',
            ]

        );

        $result = $validator->validate();

        if ($result->fails()) {

            $_SESSION['old'] = $_POST;

            toast_error(
                implode('<br>', $result->errors())
            );

            redirect('/users/create');
        }

        $userModel = new UserModel();

        if ($userModel->usernameExists($_POST['username'])) {

            $_SESSION['old'] = $_POST;

            toast_error('Username already exists.');

            redirect('/users/create');
        }

        if ($userModel->emailExists($_POST['email'])) {

            $_SESSION['old'] = $_POST;

            toast_error('Email address already exists.');

            redirect('/users/create');
        }

        echo 'Duplicate Check Passed';

        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz123456789';

        $temporaryPassword = '';

        for ($i = 0; $i < 10; $i++) {

            $temporaryPassword .= $characters[random_int(
                0,
                strlen($characters) - 1
            )];

        }

        $hashedPassword = password_hash(
            $temporaryPassword,
            PASSWORD_DEFAULT
        );

        $userModel->create([
            
        ]);
    }
}