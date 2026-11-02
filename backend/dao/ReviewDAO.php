
<?php

require_once __DIR__ . '/BaseDAO.php';

class ReviewDAO extends BaseDAO
{
    private string $table = 'reviews';
    private string $idColumn = 'review_id';

    // Get all reviews
    public function getAllReviews(): array
    {
        return $this->getAll($this->table);
    }

    // Get one review by ID
    public function getReviewById(int $id): array|false
    {
        return $this->getById($this->table, $this->idColumn, $id);
    }

    // Create a new review
    public function createReview(array $data): int
    {
        return $this->create($this->table, $data);
    }

    // Update a review
    public function updateReview(int $id, array $data): bool
    {
        return $this->update($this->table, $this->idColumn, $id, $data);
    }

    // Delete a review
    public function deleteReview(int $id): bool
    {
        return $this->delete($this->table, $this->idColumn, $id);
    }
}
