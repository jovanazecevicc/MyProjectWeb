<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../dao/DestinationDAO.php';

header('Content-Type: application/json');

try {
    $connection = Database::connect();
    $dao = new DestinationDAO($connection);

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {

        // GET - Read
        case 'GET':
            if (isset($_GET['id'])) {
                $result = $dao->getDestinationById((int) $_GET['id']);
            } else {
                $result = $dao->getAllDestinations();
            }

            echo json_encode($result);
            break;

        // POST - Create
        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);

            $id = $dao->createDestination($data);

            http_response_code(201);
            echo json_encode([
                'message' => 'Destination created successfully',
                'id' => $id
            ]);
            break;

        // PUT - Update
        case 'PUT':

        // PATCH - Partial update
        case 'PATCH':
            $id = (int) ($_GET['id'] ?? 0);
            $data = json_decode(file_get_contents('php://input'), true);

            $result = $dao->updateDestination($id, $data);

            echo json_encode([
                'message' => 'Destination updated successfully',
                'success' => $result
            ]);
            break;

        // DELETE - Delete
        case 'DELETE':
            $id = (int) ($_GET['id'] ?? 0);

            $result = $dao->deleteDestination($id);

            echo json_encode([
                'message' => 'Destination deleted successfully',
                'success' => $result
            ]);
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
    }

} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}