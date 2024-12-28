{{-- resources/views/about-us.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            About Us
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-900">Our Mission</h3>
                    <p class="mt-4 text-gray-700">
                        We aim to provide high-quality services and products to our customers while maintaining integrity, passion, and professionalism.
                    </p>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mt-8">Our Team</h3>
                    <p class="mt-4 text-gray-700">
                        Our dedicated team works together to bring innovative solutions, offering unparalleled expertise in our industry.
                    </p>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mt-8">Our Values</h3>
                    <p class="mt-4 text-gray-700">
                        We believe in honesty, hard work, and respect for all. Our values drive us to ensure every interaction with our customers is meaningful and impactful.
                    </p>

                    <h3 class="text-2xl font-bold text-gray-900 mt-8">Contact Us</h3>
                    <p class="mt-4 text-gray-700">
                        Feel free to reach out to us at any time. We are here to assist you with any questions or concerns you may have.
                    </p>
                    <p class="mt-4 text-gray-700">
                        Email: <a href="mailto:info@yourwebsite.com" class="text-blue-500">info@yourwebsite.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
