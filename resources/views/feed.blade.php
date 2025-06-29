@extends('layouts.app')

@section('content')


    <div class="bg-white rounded-lg shadow p-4 mb-6 w-full max-w-5xl mx-auto">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Top section: profile and input -->
            <div class="flex items-start space-x-3 mb-4">

                <div class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>


                <div class="flex-1">
                    <textarea name="content" rows="2"
                        class="w-full py-2 px-6 bg-gray-100 rounded-lg resize-none focus:outline-none focus:ring focus:ring-blue-300"
                        placeholder="What's on your mind, {{ strtok(auth()->user()->name, ' ') }}?"></textarea>
                </div>
            </div>

            <div id="mediaPreview" class="mb-4 hidden">
                <p class="text-sm text-gray-500 mb-1">Preview:</p>
                <div id="previewContainer" class="rounded overflow-hidden max-h-96"></div>
            </div>

            <hr class="my-2">

            <!-- Bottom section: media buttons -->
            <div class="flex justify-between items-center text-sm text-gray-600">
                <!-- Go Live -->
                <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-100 px-2 py-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                        stroke="#f02849">
                        <path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5" />
                        <rect x="2" y="6" width="14" height="12" rx="2" />
                    </svg>
                    <span class="text-sm font-semibold">Go Live</span>
                </label>

                <!-- Photo/Video -->
                <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-100 px-2 py-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                        stroke="#43b45e">
                        <path d="M18 22H4a2 2 0 0 1-2-2V6" />
                        <path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18" />
                        <circle cx="12" cy="8" r="2" />
                        <rect width="16" height="16" x="6" y="2" rx="2" />
                    </svg>
                    <span class="text-sm font-semibold">Photo/Video</span>
                    <input type="file" name="media" accept="image/*,video/*" class="hidden" id="mediaInput">
                </label>

                <!-- Feeling/Activity -->
                <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-100 px-2 py-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none"
                        stroke="#ebb128" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-smile-icon lucide-smile">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 14s1.5 2 4 2 4-2 4-2" />
                        <line x1="9" x2="9.01" y1="9" y2="9" />
                        <line x1="15" x2="15.01" y1="9" y2="9" />
                    </svg>
                    <span class="text-sm font-semibold">Feeling/Activity</span>
                </label>
            </div>


            <div class="mt-4 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold hover:bg-blue-700 transition">
                    Post
                </button>
            </div>
        </form>
    </div>



    @foreach($posts as $post)
        <div class="bg-white p-4 rounded shadow mb-4">
            <div class="flex items-center flex-row justify-between space-x-2 mb-2 relative">
                <!-- User name and date posted -->
                <div class="flex items-center space-x-2 w-full">
                    <div class="w-10 h-10 bg-blue-300 rounded-full flex items-center justify-center font-bold text-white">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-semibold">{{ $post->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                </div>


                <div x-data="{ open: false }" class="relative">
                    <!-- Dropdown button -->
                    <button @click="open = !open" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 hover:text-black" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="19" cy="12" r="1" />
                            <circle cx="5" cy="12" r="1" />
                        </svg>
                    </button>

                    <!-- Dropdown for edit and delete -->
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 mt-2 w-32 bg-white border rounded shadow-md z-10">
                        <!-- Edit -->
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">✏️
                            Edit</a>

                        <!-- Delete -->
                        <form id="delete-post-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST"
                            class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete({{ $post->id }})"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                🗑️ Delete
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <p class="mb-2">{{ $post->content }}</p>

            @if($post->media_path)
                @php
                    $ext = pathinfo($post->media_path, PATHINFO_EXTENSION);
                @endphp

                @if(in_array($ext, ['mp4', 'mov', 'avi']))
                    <video controls class="rounded min-w-[300px] max-w-xl h-auto mb-2 mx-auto object-cover">
                        <source src="{{ asset('storage/' . $post->media_path) }}" type="video/{{ $ext }}">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <img src="{{ asset('storage/' . $post->media_path) }}"
                        class="rounded min-w-[300px] max-w-xl h-auto mb-2 mx-auto object-cover">
                @endif
            @endif


            <!-- Like, Comment, Share buttons -->
            <div class="flex justify-around  items-center text-sm text-gray-600 border-t border-b py-2 mt-2">

                <form class="mt-3" method="POST" action="{{ route('likes.store') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    @php
                        $liked = $post->likes->contains('user_id', auth()->id());
                    @endphp
                    <button type="submit" class="flex items-center space-x-1 hover:text-blue-600">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-thumbs-up-icon lucide-thumbs-up {{ $liked ? 'text-blue-600' : 'text-gray-500' }}">
                                <path d="M7 10v12" />
                                <path
                                    d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z" />
                            </svg>
                        </span>
                        <span>Like ({{ $post->likes->count() }})</span>
                    </button>
                </form>


                <div class="flex items-center space-x-1 hover:text-blue-600">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-message-circle-icon lucide-message-circle">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
                        </svg></span>
                    <span>Comment ({{ $post->comments->count() }})</span>
                </div>


                <div class="flex items-center space-x-1 text-gray-400 cursor-not-allowed">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-forward-icon lucide-forward">
                            <path d="m15 17 5-5-5-5" />
                            <path d="M4 18v-2a4 4 0 0 1 4-4h12" />
                        </svg></span>
                    <span>Share</span>
                </div>

            </div>
            <div class="space-y-1 mt-2 ">
                @foreach($post->comments as $comment)
                    <div class="flex items-start space-x-2 mb-2 bg-[#f3f4f6] p-2 rounded-md">
                        <div class="w-10 h-10 bg-blue-300 rounded-full flex items-center justify-center font-bold text-white">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </div>
                        <p class="text-sm ">
                            <strong>{{ $comment->user->name }}</strong><br> {{ $comment->comment }}
                        </p>
                    </div>
                @endforeach
            </div>
            <!-- Comment  -->
            <form method="POST" action="{{ route('comments.store') }}" class="mt-2 flex items-center space-x-2">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="text" name="comment" placeholder="Write a comment..." class="w-full border p-1 rounded">
                <button class="text-blue-600">Send</button>
            </form>
        </div>
    @endforeach
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('mediaInput');
        const previewContainer = document.getElementById('previewContainer');
        const mediaPreviewWrapper = document.getElementById('mediaPreview');

        if (!input) {
            console.error('mediaInput not found');
            return;
        }

        input.addEventListener('change', function () {
            const file = this.files[0];
            previewContainer.innerHTML = '';

            if (file) {
                const type = file.type;
                const url = URL.createObjectURL(file);
                let element;

                if (type.startsWith('image/')) {
                    element = document.createElement('img');
                    element.src = url;
                    element.className = 'w-full max-h-52 rounded object-contain';
                } else if (type.startsWith('video/')) {
                    element = document.createElement('video');
                    element.controls = true;
                    element.className = 'w-full max-h-52 rounded';
                    const source = document.createElement('source');
                    source.src = url;
                    source.type = type;
                    element.appendChild(source);
                }

                if (element) {
                    mediaPreviewWrapper.classList.remove('hidden');
                    previewContainer.appendChild(element);
                }
            } else {
                mediaPreviewWrapper.classList.add('hidden');
            }
        });
    });


    function confirmDelete(postId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to undo this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-post-${postId}`).submit();
            }
        });
    }
</script>