<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Order Id</th>
                                <th class="text-left font-semibold">Name</th>
                                <th class="text-left font-semibold">Phone</th>
                                <th class="text-left font-semibold">Total Amount</th>
                                <th class="text-left font-semibold">Paid Amount</th>
                                <th class="text-left font-semibold">Order Status</th>
                                <th class="text-left font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="mb-3 border-b-2">
                                <td class="py-4">#{{ $order['id'] }}</td>
                                <td class="py-4">{{ $order['customer_name'] }}</td>
                                <td class="py-4">{{ $order['customer_phone_number'] }}</td>
                                <td class="py-4">{{ $order['total_amount'] }}</td>
                                <td class="py-4">{{ $order['paid_amount'] }}</td>
                                <td class="py-4">{{ $order['operational_status'] }}</td>
                                <td class="py-4">
                                    <a href="{{ route('order.details', $order['id']) }}"
                                        class="text-indigo-400">Details</a>
                                </td>
                            </tr>
                            @endforeach
                            <!-- More product rows -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>