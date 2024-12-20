<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-lg">
                @if($images->isEmpty())
                    <p class="text-center mt-6 text-gray-600 dark:text-gray-400">No artworks available at the moment.</p>
                @else
                    <!-- Create a table layout -->
                    <table class="table-auto w-full text-center">
                        <tr>
                            @foreach($images as $index => $image)
                                <td class="p-4">
                                    <div class="rounded-lg overflow-hidden shadow-md">
                                        <!-- Image with specified dimensions -->
                                        <img src="{{ asset('storage/' . $image->image_path) }}" 
                                             alt="Artwork" 
                                             class="w-[250px] h-[250px] object-cover">
                                        <div class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                                            Uploaded by: {{ $image->user->name }}
                                        </div>
                                    </div>
                                </td>
                                <!-- Close the row after every four columns -->
                                @if(($index + 1) % 4 === 0 && !$loop->last)
                                    </tr><tr>
                                @endif
                            @endforeach
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
