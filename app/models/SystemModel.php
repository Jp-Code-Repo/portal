<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDO;

class SystemModel
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
                s.id,
                s.name,
                s.description,
                s.launch_url,
                s.status,
                d.name AS department_name
            FROM systems s
            INNER JOIN departments d
                ON d.id = s.department_id
            ORDER BY s.name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $sql = "
            INSERT INTO systems (
                department_id,
                name,
                description,
                launch_url,
                status
            )
            VALUES (
                :department_id,
                :name,
                :description,
                :launch_url,
                :status
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'department_id' => $data['department_id'],
            'name'          => $data['name'],
            'description'   => $data['description'],
            'launch_url'    => $data['launch_url'],
            'status'        => $data['status'],
        ]);
    }
}