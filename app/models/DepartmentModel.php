<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class DepartmentModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll(): array
    {
        $sql = "
            SELECT
                id,
                name,
                status
            FROM departments
            ORDER BY name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function getActiveDepartments(): array
    {
        $sql = "
            SELECT
                id,
                name
            FROM departments
            WHERE status = 1
            ORDER BY name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $sql = "
            INSERT INTO departments (
                name,
                status
            )
            VALUES (
                :name,
                :status
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'name'   => $data['name'],
            'status' => $data['status'],
        ]);
    }
}