<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Artworks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Artworks Uploaded by You</h3>
                    
                    @if($images->isEmpty())
                        <p>No artworks uploaded yet.</p>
                    @else
                        <!-- Create a table -->
                        <table class="table-auto w-full text-center border-collapse border border-gray-300 dark:border-gray-600">
                            <tr>
                                @foreach($images as $index => $image)
                                    <td class="border border-gray-300 dark:border-gray-600 p-[10pt]">
                                        <div class="w-[250px] h-[250px] overflow-hidden mx-auto">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                                 alt="Artwork" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                            {{ $image->created_at->format('d M Y') }}
                                        </p>
                                        <!-- Delete Button -->
                                        <form action="{{ route('artworks.destroy', $image->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                class="px-4 py-2 bg-red-600 text-white text-sm rounded hover:bg-red-700"
                                                onclick="return confirm('Are you sure you want to delete this artwork?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                    <!-- Close the row after four columns -->
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
    </div>
</x-app-layout>
