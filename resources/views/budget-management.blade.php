<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Budget Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Budget Packages</h3>
                    <ul class="list-disc list-inside" id="budget-list">
                        <!-- Budgets will be loaded here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        fetch('/api/budget')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('budget-list');
                data.packages.forEach(pkg => {
                    const li = document.createElement('li');
                    li.textContent = `${pkg.name}: $${pkg.amount}`;
                    list.appendChild(li);
                });
            });
    </script>
</x-app-layout>