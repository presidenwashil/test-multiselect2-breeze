<?php

use App\Models\Patient;
use Livewire\Volt\Component;

new class extends Component {
    public function getPatientProperty()
    {
        return Patient::all();
    }
}; ?>

<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($this->patient as $patient)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $patient->name }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $patient->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $patient->phone }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                    
</div>
