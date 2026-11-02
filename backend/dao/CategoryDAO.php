
<?php

require_once __DIR__ . '/BaseDAO.php';

class CategoryDAO extends BaseDAO
{
    private string $table = 'categories';
    private string $idColumn = 'category_id';

    // Get all categories
    public function getAllCategories(): array
    {
        return $this->getAll($this->table);
    }

    // Get one category by ID
    public function getCategoryById(int $id): array|false
    {
        return $this->getById($this->table, $this->idColumn, $id);
    }

    // Create a new category
    public function createCategory(array $data): int
    {
        return $this->create($this->table, $data);
    }

    // Update a category
    public function updateCategory(int $id, array $data): bool
    {
        return $this->update($this->table, $this->idColumn, $id, $data);
    }

    // Delete a category
    public function deleteCategory(int $id): bool
    {
        return $this->delete($this->table, $this->idColumn, $id);
    }
}
