@extends('layouts.app')

@section('title', 'تعديل ' . $project->title)

@section('content')
<div class="row justify-content-center text-right">
    <div class="col-10 col-xl-7 card p-5 mt-5">
        <h3 class="text-center pb-5 font-weight-bold">تعديل المشروع</h3>
        <form method="post" action="/projects/{{ $project->id }}" dir="rtl">
            @csrf
            @method('PATCH')
            @include('projects.form')
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary px-4 px-sm-5">تعديل</button>
                <a href="/projects" class="btn btn-light px-4 px-sm-5">إلغاء</a>
            </div>

        </form>
    </div>
</div>
@endsection