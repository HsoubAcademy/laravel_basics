@extends('layouts.app')

@section('title', $project->title)

@section('content')
<header class="d-sm-flex justify-content-between align-items-center my-5 text-center" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects">المشاريع</a> / {{ $project->title }}
    </div>

    <div class="mt-4 mt-sm-0">
        <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary px-4">تعديل المشروع</a>
    </div>
</header>

<section class="row text-right" dir="rtl">
    {{-- Project Details --}}
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                    @case(1)
                    <span class="text-success">مكتمل</span>
                    @break
                    @case(2)
                    <span class="text-danger">ملغي</span>
                    @break
                    @default
                    <span class="text-warning">قيد الإنجاز</span>
                    @endswitch
                </div>
                <h5 class="font-weight-bold card-title"><a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
                </h5>
                <div class="card-text my-4">
                    {{ $project->description }}
                </div>

            </div>
            @include('projects.footer')
        </div>

        <div class="card">

            <div class="card-body">
                <form action="/projects/{{ $project->id }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <select name="status" class="custom-select" onchange="this.form.submit()">
                        <option value="0" {{ ($project->status == 0) ? 'selected' : '' }}>قيد الإنجاز</option>
                        <option value="1" {{ ($project->status == 1) ? 'selected' : '' }}>مكتمل</option>
                        <option value="2" {{ ($project->status == 2) ? 'selected' : '' }}>ملغي</option>
                    </select>
                </form>
            </div>
        </div>
    </div>

    {{-- Tasks --}}
    <div class="col-lg-8">
        @foreach ($project->tasks as $task)
        <div class="card p-3 mb-3 d-flex flex-row align-items-center">
            <div class="{{ $task->done ? 'checked text-muted' : '' }}">
                {{  $task->body }}
            </div>
            <div class="d-flex mr-auto">
                <form action="/projects/{{ $task->project->id }}/tasks/{{ $task->id }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="done" onchange="this.form.submit()" class="form-control ml-4"
                        {{ $task->done ? 'checked' : '' }}>
                </form>

                <div class="d-flex align-items-center mr-auto">
                    <form method="POST" action="/projects/{{ $task->project->id }}/tasks/{{ $task->id }}"
                        class="hide-submit">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-delete mt-1" value="">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div class="card">
            <form method="POST" action="/projects/{{ $project->id }}/tasks" class="p-3 d-flex">
                @csrf
                <input type="text" name="body" class="form-control p-2 ml-2" placeholder="أضف مهمة جديدة">
                <button type="submit" class="btn btn-primary">أضف</button>
            </form>

        </div>
    </div>
</section>
@endsection