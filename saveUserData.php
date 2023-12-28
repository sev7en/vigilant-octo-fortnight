<?php

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $filename = __DIR__ . '/.well-known/nostr.json';
    $userData = $data['username'] . ':' . $data['key'] . ";\n";

    if (file_put_contents($filename, $userData, FILE_APPEND)) {
        echo json_encode(['message' => 'Data saved successfully']);
    } else {
        echo json_encode(['message' => 'Error saving data']);
    }
} else {
    echo json_encode(['message' => 'Invalid data']);
}

?>
