@extends('layouts.app')

@section('content')

    <div class="container">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Lesson</h4>
                <form action="{{route('lessons.store')}}" class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Articles (a, an, the)" value="" required="">
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Videos</h4>

                    <div class="col-12">
                        <label for="video_link" class="form-label">Link <span class="text-body-secondary">(Optional)</span></label>
                        <input type="text" name="video_link" class="form-control" id="video_link" placeholder="https://...">
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Exercises and tests</h4>

                    <div class="col-12">
                        <label for="exercise_link" class="form-label">Link <span class="text-body-secondary">(Optional)</span></label>
                        <input type="text" name="exercise_link" class="form-control" id="exercise_link" placeholder="http://localhost 20-24">
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Vocabularies</h4>

                    <div class="col-12">
                        <label for="vocabulary_link" class="form-label">Link <span class="text-body-secondary">(Optional)</span></label>
                        <input type="text" name="vocabulary_link" class="form-control" id="vocabulary_link" placeholder="http://localhost 20-24">
                    </div>

                    <div class="col-12">
                        <label for="vocabularies" class="form-label mt-3 mb-2">Vocabularies<span class="text-body-secondary">(Optional)</span></label>
                        <textarea type="text" name="vocabularies" class="form-control" id="vocabularies" placeholder="Apple - Olma...." rows="8"></textarea>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Useful links</h4>

                    <div class="col-12 mb-3">
                        <label for="useful_link" class="form-label">Link <span class="text-body-secondary">(Optional)</span></label>
                        <input type="text" name="useful_link" class="form-control" id="useful_link" placeholder="http://...">
                    </div>

                    <div class="col-12">
                        <label for="useful_file" class="form-label">File <span class="text-body-secondary">(Optional)</span></label>
                        <input type="file" name="useful_file" class="form-control" id="useful_file" placeholder="http://...">
                    </div>

                    <hr class="my-4">

                    <button type="submit" class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
