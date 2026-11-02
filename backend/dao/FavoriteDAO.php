
<?php

require_once __DIR__ . '/BaseDAO.php';

class FavoriteDAO extends BaseDAO
{
    private string $table = 'favorites';
    private string $idColumn = 'favorite_id';

    // Get all favorites
    public function getAllFavorites(): array
    {
        return $this->getAll($this->table);
    }

    // Get one favorite by ID
    public function getFavoriteById(int $id): array|false
    {
        return $this->getById($this->table, $this->idColumn, $id);
    }

    // Create a new favorite
    public function createFavorite(array $data): int
    {
        return $this->create($this->table, $data);
    }

    // Update a favorite
    public function updateFavorite(int $id, array $data): bool
    {
        return $this->update($this->table, $this->idColumn, $id, $data);
    }

    // Delete a favorite
    public function deleteFavorite(int $id): bool
    {
        return $this->delete($this->table, $this->idColumn, $id);
    }
}
