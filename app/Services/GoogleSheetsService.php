<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetsService
{
    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        $this->spreadsheetId = env('GOOGLE_SHEETS_SPREADSHEET_ID', '1b8-rRFi2ArA6Vf-xPrYA_1csd6n7lJIK21dJ6F_Cr9Y');

        if (file_exists(storage_path('app/google-credentials.json'))) {
            $this->client = new Client();
            $this->client->setApplicationName('Finance Management System');
            $this->client->setScopes([Sheets::SPREADSHEETS_READONLY]);
            $this->client->setAuthConfig(storage_path('app/google-credentials.json'));
            $this->client->setAccessType('offline');
            $this->service = new Sheets($this->client);
        }
    }

    public function getBudgetData()
    {
        $filePath = storage_path('app/budget_data_2026-02-19.json');
        if (file_exists($filePath)) {
            $data = json_decode(file_get_contents($filePath), true);
            $budgets = [];
            foreach ($data as $item) {
                $budgets[] = [
                    'id' => $item['program'] ?? $item['rowNumber'] ?? '',
                    'name' => $item['expenseCategory'] ?? '',
                    'amount' => (float) ($item['totalBudget'] ?? 0),
                ];
            }
            return $budgets;
        }
        // Fallback to dummy
        return [
            ['id' => '30501', 'name' => 'Package 1', 'amount' => 1000],
            ['id' => '30502', 'name' => 'Package 2', 'amount' => 2000],
            ['id' => '30503', 'name' => 'Package 3', 'amount' => 1500],
            ['id' => '30504', 'name' => 'Package 4', 'amount' => 2500],
        ];
    }

    public function getTransactions()
    {
        if ($this->service) {
            try {
                $range = 'Transactions!A:D';
                $response = $this->service->spreadsheets_values->get($this->spreadsheetId, $range);
                $values = $response->getValues();
                $transactions = [];
                foreach ($values as $row) {
                    $transactions[] = [
                        'id' => $row[0] ?? '',
                        'description' => $row[1] ?? '',
                        'amount' => (float) ($row[2] ?? 0),
                        'date' => $row[3] ?? '',
                    ];
                }
                return $transactions;
            } catch (\Exception $e) {
                // Fallback to dummy
            }
        }
        // Dummy data
        return [
            ['id' => 1, 'description' => 'Transaction 1', 'amount' => 100, 'date' => '2023-01-01'],
            ['id' => 2, 'description' => 'Transaction 2', 'amount' => 200, 'date' => '2023-01-02'],
        ];
    }

    public function getStatement()
    {
        return $this->getTransactions();
    }
}