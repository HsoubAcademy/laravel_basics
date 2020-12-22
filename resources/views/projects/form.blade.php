
    <div class="form-group">
        <label for="title">عنوان المشروع</label>
        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $project->title }}">
        @error('title')
            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
        @enderror
    </div>
    <div class="form-group mt-4">
        <label for="title">وصف المشروع</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $project->description }}</textarea>
        @error('description')
            <div class="text-danger mt-2"><small>{{ $message }}</small></div>
        @enderror
    </div>
    