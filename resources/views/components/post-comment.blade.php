@props(['comment'])
<x-panel class="">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?id={{ $comment->id }}" alt="" class="rounded-xl" width="45"
                height="45">
        </div>
        <div class="">
            <header class="mb-4 space-y-2">
                <div class="flex items-center justify-between">
                    <div class="space-y-2">
                        <h3 class="font-bold text-sm">{{ $comment->author->name }}</h3>
                        <a href="#" class="text-xs">{{ $comment->author->username }}</a>
                    </div>
                    <p class="text-xs text-gray-500"><time> {{ $comment->created_at->diffForHumans() }} </time></p>
                </div>
                <p class="text-sm">
                    {{ $comment->body }}
                </p>
            </header>
        </div>
    </article>
</x-panel>
