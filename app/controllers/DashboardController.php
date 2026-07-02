<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function index(): void
    {
        $announcements = [
            [
                'title' => 'Enrollment Starts Monday',
                'date' => 'June 22, 2026'
            ],
            [
                'title' => 'Faculty Meeting This Friday',
                'date' => 'June 19, 2026'
            ],
            [
                'title' => 'Library System Maintenance',
                'date' => 'June 25, 2026'
            ]
        ];

        $systems = [
            [
                'name' => 'Enrollment System',
                'department' => 'Registrar Department',
                'description' => 'Student enrollment and registration services.',
                'url' => '#',
                'icon' => '📝'
            ],
            [
                'name' => 'Library System',
                'department' => 'Library Department',
                'description' => 'Library catalog and circulation management.',
                'url' => '#',
                'icon' => '📚'
            ],
            [
                'name' => 'HR System',
                'department' => 'Human Resources',
                'description' => 'Employee records and HR management.',
                'url' => '#',
                'icon' => '👥'
            ],
            [
                'name' => 'Survey System',
                'department' => 'Quality Assurance',
                'description' => 'Institutional surveys and evaluations.',
                'url' => '#',
                'icon' => '📊'
            ]
        ];

        $this->view('dashboard/index', [
            'pageTitle' => 'Dashboard',
            'announcements' => $announcements,
            'systems' => $systems
        ]);
    }
}