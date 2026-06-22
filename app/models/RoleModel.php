<?php

declare(strict_types=1);

class RoleModel
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
                code,
                user_type,
                status
            FROM roles
            ORDER BY name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function getActiveRoles(): array
    {
        $sql = "
            SELECT
                id,
                name,
                code,
                user_type
            FROM roles
            WHERE status = 1
            ORDER BY name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }
}