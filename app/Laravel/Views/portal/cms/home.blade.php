@extends('portal._layouts.main')

@section('content')
    <div class="container py-4 py-md-5" style="max-width: 960px;">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
            <div>
                <p class="text-uppercase text-primary fw-semibold small mb-1" style="letter-spacing: 0.05em;">
                    Content Management
                </p>
                <h1 class="h3 fw-bold text-dark mb-1">Edit Home Page</h1>
                <p class="text-secondary mb-0">Manage the home page text and button labels. Images and button destinations stay fixed.</p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('web.home') }}" target="_blank"
                    class="btn btn-outline-info d-inline-flex align-items-center justify-content-center gap-2">
                    <span>Preview Page</span>
                </a>
                <a href="{{ route('portal.dashboard') }}"
                    class="btn btn-outline-secondary d-inline-flex align-items-center justify-content-center gap-2">
                    <span>Back to Dashboard</span>
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 overflow-hidden">
            <form action="{{ route('portal.cms.update_home') }}" method="POST">
                @csrf
                <div class="card-body p-4 p-md-5">
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold text-secondary small text-uppercase">
                            Page Title / Heading
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            placeholder="Welcome to Rtcl" value="{{ old('title', $record->title ?? 'Welcome to Rtcl') }}">
                        @if ($errors->first('title'))
                            <div class="text-danger small mt-1">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="badge_text" class="form-label fw-semibold text-secondary small text-uppercase">
                                Badge Text
                            </label>
                            <input type="text" class="form-control @error('badge_text') is-invalid @enderror" id="badge_text"
                                name="badge_text"
                                value="{{ old('badge_text', $record->badge_text ?? 'Editorial & Knowledge Hub') }}">
                            @error('badge_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="primary_button_label" class="form-label fw-semibold text-secondary small text-uppercase">
                                Primary Button Label
                            </label>
                            <input type="text" class="form-control @error('primary_button_label') is-invalid @enderror"
                                id="primary_button_label" name="primary_button_label"
                                value="{{ old('primary_button_label', $record->primary_button_label ?? 'Go to Articles') }}">
                            @error('primary_button_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="secondary_button_label" class="form-label fw-semibold text-secondary small text-uppercase">
                                Secondary Button Label
                            </label>
                            <input type="text" class="form-control @error('secondary_button_label') is-invalid @enderror"
                                id="secondary_button_label" name="secondary_button_label"
                                value="{{ old('secondary_button_label', $record->secondary_button_label ?? 'Learn More') }}">
                            @error('secondary_button_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h2 class="h6 fw-bold text-dark border-bottom pb-2 mb-3">Featured Articles Section</h2>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="featured_label" class="form-label fw-semibold text-secondary small text-uppercase">
                                Section Label
                            </label>
                            <input type="text" class="form-control @error('featured_label') is-invalid @enderror"
                                id="featured_label" name="featured_label"
                                value="{{ old('featured_label', $record->featured_label ?? 'Featured') }}">
                            @error('featured_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="featured_title" class="form-label fw-semibold text-secondary small text-uppercase">
                                Section Heading
                            </label>
                            <input type="text" class="form-control @error('featured_title') is-invalid @enderror"
                                id="featured_title" name="featured_title"
                                value="{{ old('featured_title', $record->featured_title ?? 'Latest Articles') }}">
                            @error('featured_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="featured_link_label" class="form-label fw-semibold text-secondary small text-uppercase">
                                Articles Link Label
                            </label>
                            <input type="text" class="form-control @error('featured_link_label') is-invalid @enderror"
                                id="featured_link_label" name="featured_link_label"
                                value="{{ old('featured_link_label', $record->featured_link_label ?? 'View all articles') }}">
                            @error('featured_link_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="content" class="form-label fw-semibold text-secondary small text-uppercase">
                            Page Content
                        </label>
                        <div id="editor">
                            <textarea class="form-control editor" id="content"
                                name="content">{{ old('content', $record->content ?? '') }}</textarea>
                        </div>
                        @if ($errors->first('content'))
                            <div class="text-danger small mt-1">{{ $errors->first('content') }}</div>
                        @endif
                    </div>
                </div>

                <div
                    class="card-footer bg-white py-3 px-4 border-top d-flex flex-column flex-sm-row justify-content-end gap-2">
                    <a href="{{ route('portal.dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
                    <button type="submit"
                        class="btn submit-btn btn-primary d-inline-flex align-items-center justify-content-center gap-2 px-4">
                        <span>Save Changes</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/libs/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let editorInstance;

        ClassicEditor.create(document.querySelector('.editor'), {
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', 'link', '|',
                'fontColor', 'fontBackgroundColor', '|',
                'undo', 'redo'
            ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        }).then(editor => {
            editorInstance = editor;
        }).catch(error => console.error(error));

        document.addEventListener('DOMContentLoaded', function () {
            const submitBtn = document.querySelector('.submit-btn');
            const form = submitBtn.closest('form');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                if (editorInstance) {
                    document.querySelector('.editor').value = editorInstance.getData();
                }

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to save these changes to the Home Page?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, save changes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection