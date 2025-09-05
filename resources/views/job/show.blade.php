<x-layout>
    <x-bread-crumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
        <div>
            <x-link-button :href="route('jobs.show', $job)">
                Save
            </x-link-button>
        </div>
    </x-job-card>
</x-layout>