<x-app-layout>
    <div class="artworkcontainer grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @foreach($images as $image)
            <div class="artwork">
                <img src="{{ asset('storage/'.$image->image_path) }}" alt="" class="w-full h-auto rounded-lg">
            </div>
        @endforeach
    </div>
</x-app-layout>
