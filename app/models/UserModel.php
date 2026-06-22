<?php

declare(strict_types=1);

class UserModel
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
                u.id,
                u.first_name,
                u.middle_name,
                u.last_name,
                u.extension_name,
                u.username,
                u.email,
                u.user_type,
                u.inst_no,
                u.id_no,
                u.role,
                u.status,
                d.name AS department_name
            FROM users u
            INNER JOIN departments d
                ON d.id = u.dept_id
            ORDER BY
                u.last_name ASC,
                u.first_name ASC
        ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $sql = "
            INSERT INTO users (
                dept_id,
                user_type,
                inst_no,
                id_no,
                first_name,
                middle_name,
                last_name,
                extension_name,
                username,
                email,
                password,
                role,
                status
            )
            VALUES (
                :dept_id,
                :user_type,
                :inst_no,
                :id_no,
                :first_name,
                :middle_name,
                :last_name,
                :extension_name,
                :username,
                :email,
                :password,
                :role,
                :status
            )
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'dept_id'        => $data['dept_id'],
            'user_type'      => $data['user_type'],
            'inst_no'        => $data['inst_no'],
            'id_no'          => $data['id_no'],
            'first_name'     => $data['first_name'],
            'middle_name'    => $data['middle_name'],
            'last_name'      => $data['last_name'],
            'extension_name' => $data['extension_name'],
            'username'       => $data['username'],
            'email'          => $data['email'],
            'password'       => $data['password'],
            'role'           => $data['role'],
            'status'         => $data['status'],
        ]);
    }
}