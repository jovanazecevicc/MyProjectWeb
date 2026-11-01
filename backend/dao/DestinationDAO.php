
<?php

require_once __DIR__ . '/BaseDAO.php';

class DestinationDAO extends BaseDAO
{
    private string $table = 'destinations';
    private string $idColumn = 'destination_id';

    // Get all destinations
    public function getAllDestinations(): array
    {
        return $this->getAll($this->table);
    }

    // Get one destination by ID
    public function getDestinationById(int $id): array|false
    {
        return $this->getById($this->table, $this->idColumn, $id);
    }

    // Create a new destination
    public function createDestination(array $data): int
    {
        return $this->create($this->table, $data);
    }

    // Update a destination
    public function updateDestination(int $id, array $data): bool
    {
        return $this->update($this->table, $this->idColumn, $id, $data);
    }

    // Delete a destination
    public function deleteDestination(int $id): bool
    {
        return $this->delete($this->table, $this->idColumn, $id);
    }
}
