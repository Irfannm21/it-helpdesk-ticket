<x-app-layout>
    <x-slot:heading>
        Ticket
    </x-slot:heading>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900"></h1>
                {{-- <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name, title,
                    email and role.</p> --}}
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button type="button"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Ticket
                </button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID Client
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    01/Client/I/24
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Irfan</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">20-01-2024
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">BlueScreen</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Completed</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    02/Client/I/24
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Irfan</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">20-01-2024
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">BlueScreen</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Draft</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    03/Client/I/24
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Irfan</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">20-01-2024
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">BlueScreen</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Draft</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, Lindsay Walton</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    04/Client/I/24
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Irfan</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">20-01-2024
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">BlueScreen</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">On Repair</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                </td>
                            </tr>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                    05/Client/I/24
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Irfan</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">23-01-2024
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Tidak bisa menyala</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">On Repair</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                </td>
                            </tr>

                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
