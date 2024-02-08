<x-app-layout> <x-slot name='title'> 記事一覧 </x-slot>
<section class="w-full md:w-2/3 flex flex-col items-center px-3">
	@foreach ($articles as $article)
	<!-- Posts Section -->
	<article class="flex flex-col shadow my-4">
		<!-- Article Image -->
		<a href="#" class="hover:opacity-75"> <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
		</a>
		<div class="bg-white flex flex-col justify-start p-6">
			<a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a> <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $article->title }}</a>
			<p href="#" class="text-sm pb-3">
				By @foreach($users as $user) @if($user->id === $article->user_id) <a href="#" class="font-semibold hover:text-gray-800">{{ $user->name }}</a> @endif @endforeach , Published on {{
				$article->created_at }}
			</p>
			<a href="#" class="pb-6">{{ $article->body }}</a> <a href="#" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
		</div>
	</article>
	@endforeach

	<!-- Pagination -->
	<div class="flex items-center py-8">
		@if ($articles->onFirstPage()) <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a> @else <a
			href="{{ $articles->previousPageUrl() }}" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">{{ $articles->currentPage() - 1 }}</a>
		@endif @if ($articles->hasMorePages()) <a href="{{ $articles->nextPageUrl() }}"
			class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center ml-3">{{ $articles->currentPage() + 1 }}</a> <a
			href="{{ $articles->nextPageUrl() }}" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
		@endif
	</div>

</section>
</x-app-layout>