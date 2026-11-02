
<?php

class BaseDAO
{
    protected PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    protected function validateIdentifier(string $identifier): void
    {
        if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $identifier)) {
            throw new InvalidArgumentException("Invalid database identifier");
        }
    }

    // READ: Get all records
    public function getAll(string $table): array
    {
        $this->validateIdentifier($table);

        $query = "SELECT * FROM `$table`";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ: Get one record by ID
    public function getById(string $table, string $idColumn, int $id): array|false
    {
        $this->validateIdentifier($table);
        $this->validateIdentifier($idColumn);

        $query = "SELECT * FROM `$table` WHERE `$idColumn` = :id";
        $statement = $this->connection->prepare($query);
        $statement->execute(['id' => $id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // CREATE: Insert a new record
    public function create(string $table, array $data): int
    {
        $this->validateIdentifier($table);

        if (empty($data)) {
            throw new InvalidArgumentException("Data cannot be empty");
        }

        foreach (array_keys($data) as $column) {
            $this->validateIdentifier($column);
        }

        $columns = array_keys($data);
        $columnList = implode(', ', array_map(fn($column) => "`$column`", $columns));
        $placeholders = implode(', ', array_map(fn($column) => ":$column", $columns));

        $query = "INSERT INTO `$table` ($columnList) VALUES ($placeholders)";
        $statement = $this->connection->prepare($query);
        $statement->execute($data);

        return (int) $this->connection->lastInsertId();
    }

    // UPDATE: Update an existing record
    public function update(string $table, string $idColumn, int $id, array $data): bool
    {
        $this->validateIdentifier($table);
        $this->validateIdentifier($idColumn);

        if (empty($data)) {
            throw new InvalidArgumentException("Data cannot be empty");
        }

        foreach (array_keys($data) as $column) {
            $this->validateIdentifier($column);
        }

        $setParts = [];

        foreach (array_keys($data) as $column) {
            $setParts[] = "`$column` = :$column";
        }

        $setClause = implode(', ', $setParts);

        $query = "UPDATE `$table` SET $setClause WHERE `$idColumn` = :id";
        $statement = $this->connection->prepare($query);

        $data['id'] = $id;

        return $statement->execute($data);
    }

    // DELETE: Delete a record
    public function delete(string $table, string $idColumn, int $id): bool
    {
        $this->validateIdentifier($table);
        $this->validateIdentifier($idColumn);

        $query = "DELETE FROM `$table` WHERE `$idColumn` = :id";
        $statement = $this->connection->prepare($query);

        return $statement->execute(['id' => $id]);
    }
}
