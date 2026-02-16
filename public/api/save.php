<?php
/**
 * Admin-API für Flugplatz Oberrißdorf
 * Speichert JSON-Content-Dateien und handhabt Bildupload.
 *
 * Erlaubte Dateien: fees, team, site, airfield, impressum
 * Auth: Einfache Passwortprüfung (SHA-256 Hash)
 */

// CORS für lokale Entwicklung
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// --- Konfiguration ---
// Passwort-Hash ändern! Standard: "admin"
// Neuen Hash erzeugen: echo hash('sha256', 'IhrPasswort');
define('PASSWORD_HASH', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

// Pfad zu den JSON-Dateien (relativ zum Script)
define('DATA_DIR', __DIR__ . '/../data/');

// Erlaubte Dateinamen
define('ALLOWED_FILES', ['fees', 'team', 'site', 'airfield', 'impressum']);

// Max. Dateigröße für JSON (512 KB)
define('MAX_JSON_SIZE', 512 * 1024);

// --- Hilfsfunktionen ---

function respond(int $code, array $data): void {
    http_response_code($code);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

function authenticate(string $password): bool {
    return hash('sha256', $password) === PASSWORD_HASH;
}

// --- Hauptlogik ---

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, ['error' => 'Nur POST-Anfragen erlaubt.']);
}

// JSON-Body lesen
$rawBody = file_get_contents('php://input');
if (strlen($rawBody) > MAX_JSON_SIZE) {
    respond(413, ['error' => 'Anfrage zu groß.']);
}

$input = json_decode($rawBody, true);
if (!$input) {
    respond(400, ['error' => 'Ungültiges JSON.']);
}

// Auth prüfen
$password = $input['password'] ?? '';
if (!authenticate($password)) {
    respond(401, ['error' => 'Nicht autorisiert.']);
}

// Datei-Parameter
$file = $input['file'] ?? '';
$data = $input['data'] ?? null;

if (!$file || $data === null) {
    respond(400, ['error' => 'Parameter "file" und "data" erforderlich.']);
}

// Sicherheit: Nur erlaubte Dateinamen
if (!in_array($file, ALLOWED_FILES, true)) {
    respond(400, ['error' => 'Unzulässiger Dateiname: ' . $file]);
}

// Data-Verzeichnis erstellen falls nötig
if (!is_dir(DATA_DIR)) {
    mkdir(DATA_DIR, 0755, true);
}

// JSON-Datei schreiben
$filePath = DATA_DIR . $file . '.json';
$jsonContent = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if ($jsonContent === false) {
    respond(500, ['error' => 'JSON-Kodierung fehlgeschlagen.']);
}

// Backup der alten Datei (optional)
if (file_exists($filePath)) {
    $backupDir = DATA_DIR . 'backups/';
    if (!is_dir($backupDir)) {
        mkdir($backupDir, 0755, true);
    }
    $backupPath = $backupDir . $file . '_' . date('Y-m-d_H-i-s') . '.json';
    copy($filePath, $backupPath);

    // Alte Backups aufräumen (max. 10 pro Datei)
    $backups = glob($backupDir . $file . '_*.json');
    if (count($backups) > 10) {
        sort($backups);
        $toDelete = array_slice($backups, 0, count($backups) - 10);
        foreach ($toDelete as $old) {
            unlink($old);
        }
    }
}

// Datei schreiben
$result = file_put_contents($filePath, $jsonContent, LOCK_EX);

if ($result === false) {
    respond(500, ['error' => 'Datei konnte nicht gespeichert werden. Schreibrechte prüfen!']);
}

respond(200, [
    'success' => true,
    'message' => $file . '.json wurde gespeichert.',
    'size' => strlen($jsonContent)
]);
