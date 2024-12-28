<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 w-full max-w-sm"> <!-- Reduced width here -->
            <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mb-6">Edit Image</h1>
            <form action="{{ route('artworks.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Title Input -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Title</label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        value="{{ $image->title }}" 
                        class="w-full px-4 py-2 border rounded-lg text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        required>
                </div>
                <!-- Description Input -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Description</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="w-full px-4 py-2 border rounded-lg text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $image->description }}</textarea>
                </div>
                <!-- Image Input -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Change Image</label>
                    <input 
                        type="file" 
                        id="image" 
                        name="image" 
                        class="w-full px-4 py-2 border rounded-lg text-gray-800 dark:text-gray-100 bg-gray-50 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-red-500 text-black py-2 px-4 rounded-lg font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
