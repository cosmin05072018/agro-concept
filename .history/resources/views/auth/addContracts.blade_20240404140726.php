
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adaugă un nou contract de arendare') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-3">
                <div class="container mx-auto py-6">
                    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                        <div class="md:flex">
                            <div class="w-full px-4 py-6">
                                <h2 class="text-center text-2xl font-semibold mb-6">Contract Form</h2>

                                <!-- Formular -->
                                <form action="#" method="POST">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="first_name" class="block text-gray-700 font-bold mb-2">First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-input rounded-md shadow-sm w-full" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="last_name" class="block text-gray-700 font-bold mb-2">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-input rounded-md shadow-sm w-full" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="start_date" class="block text-gray-700 font-bold mb-2">Start Date</label>
                                        <input type="date" id="start_date" name="start_date" class="form-input rounded-md shadow-sm w-full" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="end_date" class="block text-gray-700 font-bold mb-2">End Date</label>
                                        <input type="date" id="end_date" name="end_date" class="form-input rounded-md shadow-sm w-full" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="location" class="block text-gray-700 font-bold mb-2">Location</label>
                                        <input type="text" id="location" name="location" class="form-input rounded-md shadow-sm w-full" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="notes" class="block text-gray-700 font-bold mb-2">Notes</label>
                                        <textarea id="notes" name="notes" class="form-textarea rounded-md shadow-sm w-full" rows="4"></textarea>
                                    </div>

                                    <div class="mt-6">
                                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
