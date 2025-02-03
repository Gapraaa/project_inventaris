@extends('layouts.admin')

@section('header-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
    <!-- Card 1 -->
    <div class="p-4 bg-white rounded shadow">
        <h2 class="text-lg font-bold text-gray-700">Total Inventory</h2>
        <p class="mt-2 text-2xl font-semibold text-blue-500">120 Items</p>
    </div>
    <!-- Card 2 -->
    <div class="p-4 bg-white rounded shadow">
        <h2 class="text-lg font-bold text-gray-700">Active Users</h2>
        <p class="mt-2 text-2xl font-semibold text-green-500">35 Users</p>
    </div>
    <!-- Card 3 -->
    <div class="p-4 bg-white rounded shadow">
        <h2 class="text-lg font-bold text-gray-700">Pending Requests</h2>
        <p class="mt-2 text-2xl font-semibold text-yellow-500">8 Requests</p>
    </div>
</div>

<div class="mt-8 bg-white rounded shadow">
    <div class="p-4 border-b">
        <h3 class="text-lg font-bold text-gray-700">Recent Activity</h3>
    </div>
    <div class="p-4">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="p-2 border-b">Date</th>
                    <th class="p-2 border-b">Activity</th>
                    <th class="p-2 border-b">User</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-2 border-b">2025-01-20</td>
                    <td class="p-2 border-b">Added new inventory item</td>
                    <td class="p-2 border-b">Admin</td>
                </tr>
                <tr>
                    <td class="p-2 border-b">2025-01-19</td>
                    <td class="p-2 border-b">Approved request</td>
                    <td class="p-2 border-b">John Doe</td>
                </tr>
                <tr>
                    <td class="p-2 border-b">2025-01-18</td>
                    <td class="p-2 border-b">Updated user role</td>
                    <td class="p-2 border-b">Jane Smith</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
