<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Total Budget</h3>
                        <p class="text-2xl font-bold text-blue-600" id="total-budget">$0</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Budget Packages</h3>
                        <ul class="list-disc list-inside">
                            <li>30501</li>
                            <li>30502</li>
                            <li>30503</li>
                            <li>30504</li>
                        </ul>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('budget.management') }}" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Budget</a>
                            <a href="{{ route('withdrawal') }}" class="block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Withdrawal</a>
                            <a href="{{ route('statement') }}" class="block bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">Statement</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Transactions</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="transactions-table">
                            <!-- Transactions will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fetch budget data
        fetch('/api/budget')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-budget').textContent = '$' + data.total;
            });

        // Fetch transactions
        fetch('/api/transactions')
            .then(response => response.json())
            .then(data => {
                const table = document.getElementById('transactions-table');
                data.forEach(transaction => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${transaction.id}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${transaction.description}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${transaction.amount}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${transaction.date}</td>
                    `;
                    table.appendChild(row);
                });
            });
    </script>
</x-app-layout>
