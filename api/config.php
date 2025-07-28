<?php
require_once __DIR__ . '/vendor/autoload.php';

// Atur header default untuk semua file API
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Izinkan akses dari mana saja (penting untuk Vercel)
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight request (OPTIONS) dari browser
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

const SPREADSHEET_ID = '1Mgr2Lc2jq7mDb7QbVmbQMgHOpV7Chz7-nvnsczMAlJE';
const SHEET_NAME = 'Sheet1';

function getClient() {
    $client = new Google_Client();
    $client->setApplicationName('Aplikasi Perlengkapan Vercel');
    $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType('offline');
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    return $client;
}

function getSheetsService() {
    $client = getClient();
    return new Google_Service_Sheets($client);
}
?>
