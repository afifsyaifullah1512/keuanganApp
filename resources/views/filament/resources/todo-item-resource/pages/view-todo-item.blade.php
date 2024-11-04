<div class="space-y-4">
    <div>
        <h3 class="text-lg font-medium">{{ $record->title }}</h3>
        <p class="text-sm text-gray-500">Due: {{ $record->due_date->format('M d, Y') }}</p>
    </div>

    <div>
        <h4 class="text-sm font-medium">Priority</h4>
        <p class="mt-1">{{ ucfirst($record->priority) }}</p>
    </div>

    @if($record->tags)
        <div>
            <h4 class="text-sm font-medium">Tags</h4>
            <div class="mt-1 flex flex-wrap gap-1">
                @foreach($record->tags as $tag)
                    <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        </div>
    @endif

    @if($record->description)
        <div>
            <h4 class="text-sm font-medium">Description</h4>
            <div class="mt-1 prose prose-sm max-w-none">
                {!! $record->description !!}
            </div>
        </div>
    @endif

    <div>
        <h4 class="text-sm font-medium">Status</h4>
        <p class="mt-1">{{ $record->is_completed ? 'Completed' : 'Not Completed' }}</p>
    </div>
</div>