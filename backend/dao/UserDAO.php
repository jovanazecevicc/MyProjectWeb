
<?php

require_once __DIR__ . '/BaseDAO.php';

class UserDAO extends BaseDAO
{
    private string $table = 'users';
    private string $idColumn = 'user_id';

    // Get all users
    public function getAllUsers(): array
    {
        return $this->getAll($this->table);
    }

    // Get one user by ID
    public function getUserById(int $id): array|false
    {
        return $this->getById($this->table, $this->idColumn, $id);
    }

    // Create a new user
    public function createUser(array $data): int
    {
        return $this->create($this->table, $data);
    }

    // Update an existing user
    public function updateUser(int $id, array $data): bool
    {
        return $this->update($this->table, $this->idColumn, $id, $data);
    }

    // Delete a user
    public function deleteUser(int $id): bool
    {
        return $this->delete($this->table, $this->idColumn, $id);
    }
}
