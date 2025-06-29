@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow mt-10">
        <h2 class="text-xl font-bold mb-4">Edit Post</h2>

        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post content --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Post Content</label>
                <textarea name="content" rows="4"
                    class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('content', $post->content) }}</textarea>
            </div>

            {{-- Current Media Preview --}}
            @if($post->media_path)
                <div class="mb-4 relative" id="mediaPreviewWrapper">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Current Media</label>

                    @php $ext = pathinfo($post->media_path, PATHINFO_EXTENSION); @endphp

                    <div class="relative">
                        @if(in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
                            <img id="currentMedia" src="{{ asset('storage/' . $post->media_path) }}" class="rounded w-full mb-2">
                        @elseif(in_array($ext, ['mp4', 'mov', 'avi', 'webm']))
                            <video id="currentMedia" controls class="rounded w-full mb-2">
                                <source src="{{ asset('storage/' . $post->media_path) }}" type="video/{{ $ext }}">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                        <input type="checkbox" name="remove_media" value="1" id="removeMedia" class="hidden">

                        <button type="button" id="removeMediaBtn"
                            class="absolute top-1 right-1 bg-white text-red-600 hover:text-white hover:bg-red-600 rounded-full p-1 shadow cursor-pointer transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            {{-- Upload New Media --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Replace Media (optional)</label>
                <input type="file" name="media" accept="image/*,video/*" class="mt-1">
                <p class="text-sm text-gray-500 mt-1">Supported: JPG, PNG, MP4, MOV. Max 20MB.</p>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('feed') }}" class="text-gray-600 hover:underline">← Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update
                    Post</button>
            </div>
        </form>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const removeBtn = document.getElementById('removeMediaBtn');
        const media = document.getElementById('currentMedia');
        const checkbox = document.getElementById('removeMedia');

        if (removeBtn && media && checkbox) {
            removeBtn.addEventListener('click', function () {
                media.remove(); // Remove image/video from view
                checkbox.checked = true; // Mark checkbox for backend
                removeBtn.remove(); // remove x button
            });
        }
    });
</script>