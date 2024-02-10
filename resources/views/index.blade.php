<x-app-layout>
    <x-slot name='title'>記事一覧</x-slot>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
	    @foreach ($articles as $article)
	        <!-- Posts Section -->
	        <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="{{ route('articles.show', [$article->id]) }}" class="hover:opacity-75"> <img src="{{ $article->images }}">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
			        <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a> <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $article->title }}</a>
			        <p href="#" class="text-sm pb-3">Published on {{ $article->created_at }}</p>
			        <a href="{{ route('articles.show', [$article->id]) }}" class="pb-6">{{ $article->body }}</a>
                    <a href="{{ route('articles.show', [$article->id]) }}" class="uppercase text-gray-800 hover:text-black">
                        Continue Reading <i class="fas fa-arrow-right"></i>
                    </a>
		        </div>
	        </article>
        @endforeach

        <!-- Pagination -->
        <div class="flex items-center py-8">
            @if ($articles->onFirstPage())
                <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
            @else
                <a href="{{ $articles->previousPageUrl() }}" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">
                    {{ $articles->currentPage() - 1 }}
                </a>
            @endif

            @if ($articles->hasMorePages())
                <a href="{{ $articles->nextPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center ml-3">
                    {{ $articles->currentPage() + 1 }}
                </a>
                <a href="{{ $articles->nextPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">
                    Next <i class="fas fa-arrow-right ml-2"></i>
                </a>
            @endif
        </div>
    </section>
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.
            </p>
            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">新着記事一覧</p>
            <ul>
                @foreach($recentlyPosts as $recentlyPost)
                    <li class="mb-4 border-b border-b-gray-300">
                        <p class="mb-1">
                            {{ $recentlyPost->created_at }}
                        </p>
                        <a href="#">
                            {{ $recentlyPost->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">Instagram</p>
            <div class="grid grid-cols-3 gap-3">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=4">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=5">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=6">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=7">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=8">
                <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=9">
            </div>
            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                <i class="fab fa-instagram mr-2"></i> Follow
                @dgrzyb
            </a>
        </div>
    </aside>
</x-app-layout>
