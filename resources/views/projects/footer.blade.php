<div class="card-footer border-0 bg-transparent">
    <div class="d-flex  text-sm">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="mr-2">
                {{ $project->created_at->diffForHumans() }}
            </div>
        </div>
        <div class="d-flex align-items-center mr-3">
           <img src="/images/list-check.svg" alt="">
            <div class="mr-2">
                {{  $project->tasks->count() }}
            </div>
        </div>
        <div class="d-flex align-items-center mr-auto">
            <form  method="POST" action="/projects/{{ $project->id }}" class="hide-submit">
                @csrf
                @method("DELETE")
                <input type="submit" class="btn btn-delete mt-2" value="">
            </form>
        </div>
    </div>
</div>