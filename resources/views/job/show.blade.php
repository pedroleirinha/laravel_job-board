<x-layout>
    <x-job-card :job="$job">
        <div>
            <x-link-button :href="route('jobs.show', $job)">
                Save
            </x-link-button>
        </div>
    </x-job-card>
</x-layout>