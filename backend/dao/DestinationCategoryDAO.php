
<?php

require_once __DIR__ . '/BaseDAO.php';

class DestinationCategoryDAO extends BaseDAO
{
    private string $table = 'destination_category';

    // Get all destination-category relationships
    public function getAllDestinationCategories(): array
    {
        return $this->getAll($this->table);
    }

    // Get categories for a destination
    public function getCategoriesByDestination(int $destinationId): array
    {
        $query = "SELECT * FROM destination_category
                  WHERE destination_id = :destination_id";

        $statement = $this->connection->prepare($query);
        $statement->execute([
            'destination_id' => $destinationId
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Create a destination-category relationship
    public function createDestinationCategory(array $data): bool
    {
        $query = "INSERT INTO destination_category
                  (destination_id, category_id)
                  VALUES (:destination_id, :category_id)";

        $statement = $this->connection->prepare($query);

        return $statement->execute([
            'destination_id' => $data['destination_id'],
            'category_id' => $data['category_id']
        ]);
    }

    // Update a relationship
    public function updateDestinationCategory(
        int $oldDestinationId,
        int $oldCategoryId,
        int $newDestinationId,
        int $newCategoryId
    ): bool {
        $query = "UPDATE destination_category
                  SET destination_id = :new_destination_id,
                      category_id = :new_category_id
                  WHERE destination_id = :old_destination_id
                  AND category_id = :old_category_id";

        $statement = $this->connection->prepare($query);

        return $statement->execute([
            'new_destination_id' => $newDestinationId,
            'new_category_id' => $newCategoryId,
            'old_destination_id' => $oldDestinationId,
            'old_category_id' => $oldCategoryId
        ]);
    }

    // Delete a relationship
    public function deleteDestinationCategory(
        int $destinationId,
        int $categoryId
    ): bool {
        $query = "DELETE FROM destination_category
                  WHERE destination_id = :destination_id
                  AND category_id = :category_id";

        $statement = $this->connection->prepare($query);

        return $statement->execute([
            'destination_id' => $destinationId,
            'category_id' => $categoryId
        ]);
    }
}
