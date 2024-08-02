<x-app-layout>
    <div class="w-full min-h-screen">
      <div class="container mx-auto px-4 py-12">
        <div class="grid grid-rows-1 grid-flow-col gap-6">
            <div class="col-auto w-full text-center">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover rounded-md">
            </div>
            <div class="grid-cols-1 w-full">
                {{-- Author Profile --}}
                <div class="row-auto justify-between mb-4">
                    <div>
                        <div class="inline-flex items-center">
                            <a href="#">
                                <img src="{{ $post->author->profile_photo_url }}" class="h-10 rounded-full" alt="Profile of {{ $post->author->name }}">
                            </a>
                            <div class="inline-flex ml-2">
                                <a href="#">
                                    <span>{{ $post->author->name }}</span>
                                </a>
                                <div class="ml-1">
                                    <span class="mx-1">
                                        |
                                    </span>
                                    <span>
                                       Published at {{ $post->readablePublished() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Prompt Container --}}
                <div class="row-auto bg-white overflow-wrap break-word border border-gray-200 rounded-lg px-8 py-6 self-center">
                    {{-- The Prompt --}}
                    <div class="prompt">
                        <b id="postBody">{{ $post->body }}</b>
                    </div>
                    {{-- The Copy Button --}}
                    <div class="prompt-buttons mt-4 text-center">
                        <button onclick="copyToClipboard()" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M18 3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1V9a4 4 0 0 0-4-4h-3a1.99 1.99 0 0 0-1 .267V5a2 2 0 0 1 2-2h7Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M8 7.054V11H4.2a2 2 0 0 1 .281-.432l2.46-2.87A2 2 0 0 1 8 7.054ZM10 7v4a2 2 0 0 1-2 2H4v6a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3Z" clip-rule="evenodd"/>
                              </svg>                                                       
                            Copy
                        </button>
                    </div>
                </div>
                {{-- Image Dimenstion Container --}}
                <div class="border border-gray-200 rounded-lg mt-5 text-left py-3 px-4 self-center">
                    <h3 class="text-md text-gray-500 font-bold uppercase text-center">Image Dimension</h3>
                    <div class="text-center">
                        <span class="inline-flex items-center text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 mr-1">
                                <path fill-rule="evenodd" d="M1 5.25A2.25 2.25 0 0 1 3.25 3h13.5A2.25 2.25 0 0 1 19 5.25v9.5A2.25 2.25 0 0 1 16.75 17H3.25A2.25 2.25 0 0 1 1 14.75v-9.5Zm1.5 5.81v3.69c0 .414.336.75.75.75h13.5a.75.75 0 0 0 .75-.75v-2.69l-2.22-2.219a.75.75 0 0 0-1.06 0l-1.91 1.909.47.47a.75.75 0 1 1-1.06 1.06L6.53 8.091a.75.75 0 0 0-1.06 0l-2.97 2.97ZM12 7a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" clip-rule="evenodd" />
                              </svg>                              
                            {{ $post->height }}x{{ $post->width }}
                        </span> 
                    </div>
                </div>

                {{-- Model Used Container--}}
                <div class="border border-gray-200 rounded-lg mt-5 text-left py-3 px-4 self-center">
                    <h3 class="text-md text-gray-500 font-bold uppercase text-center">Model Used</h3>
                    <div class="text-center">
                        <span class="inline-flex items-center text-center">
                            🤖 {{ $post->ai_model }} 
                        </span>
                        <span class="text-gray-800">{{ $post->version }}</span>
                    </div>
                </div>
                  {{-- Model Used Container--}}
                <div class="border border-gray-200 rounded-lg mt-5 text-left py-3 px-4 self-center">
                    <h3 class="text-md text-gray-500 font-bold uppercase text-center">Prompt Category</h3>
                    <div class="text-center">
                        <span>{{ $post->category }} </span>
                    </div>
                </div>
            </div>
        </div>
        
      </div>

    </div>

{{--     
    <div class="container">
        <div class="post">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            @endif
            <p>Published on: {{ $post->published_at ? $post->published_at->format('F j, Y') : 'Not published' }}</p>

            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        </div>
    </div> --}}
</x-app-layout>

<script>
    function copyToClipboard() {
        // Get the text from the element
        var bodyText = document.getElementById('postBody').innerText;
        
        // Create a temporary textarea element to hold the text
        var tempTextArea = document.createElement('textarea');
        tempTextArea.value = bodyText;
        
        // Append the textarea to the body
        document.body.appendChild(tempTextArea);
        
        // Select the text inside the textarea
        tempTextArea.select();
        tempTextArea.setSelectionRange(0, 99999); // For mobile devices
        
        // Copy the text to the clipboard
        document.execCommand('copy');
        
        // Remove the textarea element from the document
        document.body.removeChild(tempTextArea);
        
        // Optionally, provide feedback to the user
        alert('Copied to clipboard!');
    }
</script>