@extends('layouts.admin.master')


@section('title', 'Common Questions')

@section('styles')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <style>
        .project-card-wrapper {
            margin-bottom: 20px;
            width: 100%;
        }

        .text-bold {
            font-weight: 600;
        }

        .collapse {
            visibility: visible !important;
        }
    </style>
@endsection

@section('content')
    <div class="app-container">
        <div class="app-content">
            <div class="projects-section">


                <!-- Repeater -->
                <div class="project-boxes jsGridView">
                    <div class="project-card-wrapper">
                        <div class="project-box" style="background-color: #e9e7fd;">
                            <div class="project-box-header">
                                <span class="text-bold">
                                    Common Questions
                                </span>
                            </div>
                            <div class="box-progress-wrapper">
                                <form action="{{ route('admin.updateCommonQuestions') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group"
                                        style="display: flex; flex-direction: column; padding: 10px; width: 100%;">

                                        <fieldset>

                                            @if ($commonQuestions->count() > 0)
                                                <div class="Statistic-class-repeater" id="Statistic-section-repeater">
                                                    <div data-repeater-list="group-a">

                                                        @foreach ($commonQuestions as $index => $question)
                                                            <div data-repeater-item>
                                                                <div class="row">

                                                                    <div class="mb-3 col-5">
                                                                        <label class="form-label" for="form-repeater-1-1">
                                                                            Question
                                                                        </label>
                                                                        <input class="form-control" id="question"
                                                                            name="question"
                                                                            value="{{ $question->question }}" type="text"
                                                                            spellcheck="false" data-ms-editor="true"
                                                                            placeholder="Question">
                                                                    </div>



                                                                    <div class="mb-3 col-5">
                                                                        <label class="form-label" for="form-repeater-1-3">
                                                                            Answer
                                                                        </label>
                                                                        <textarea class="form-control" data-val="true" id="answer" name="answer" type="text" spellcheck="false"
                                                                            rows="1" data-ms-editor="true" placeholder="Answer">{{ $question->answer }}</textarea>
                                                                    </div>


                                                                    <div class="mb-3 col-2 d-flex align-items-center mb-0">
                                                                        <button type="button"
                                                                            class="mt-4 btn rounded-pill btn-outline-danger waves-effect"
                                                                            data-repeater-delete="">
                                                                            <i class="ti ti-x ti-xs me-1"></i>
                                                                            <span class="align-middle">
                                                                                Delete
                                                                            </span>
                                                                        </button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                    <div>
                                                        <button type="button"
                                                            class="btn rounded-pill btn-outline-primary waves-effect"
                                                            data-repeater-create="">
                                                            <i class="ti ti-plus me-1"></i>
                                                            <span class="align-middle">
                                                                Add
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="Statistic-class-repeater" id="Statistic-section-repeater">
                                                    <div data-repeater-list="group-a">
                                                        <div data-repeater-item>
                                                            <div class="row">

                                                                <div class="mb-3 col-5">
                                                                    <label class="form-label" for="form-repeater-1-1">
                                                                        Question
                                                                    </label>
                                                                    <input class="form-control" id="question"
                                                                        name="question" type="text" spellcheck="false"
                                                                        data-ms-editor="true" placeholder="Questions">
                                                                </div>


                                                                <div class="mb-3 col-5">
                                                                    <label class="form-label" for="form-repeater-1-3">
                                                                        Answer
                                                                    </label>
                                                                    <textarea class="form-control" data-val="true" id="answer" name="answer" type="text" spellcheck="false"
                                                                        rows="1" data-ms-editor="true" placeholder="Answer"></textarea>
                                                                </div>


                                                                <div class="mb-3 col-2 d-flex align-items-center mb-0">
                                                                    <button type="button"
                                                                        class="mt-4 btn rounded-pill btn-outline-danger waves-effect"
                                                                        data-repeater-delete="">
                                                                        <i class="ti ti-x ti-xs me-1"></i>
                                                                        <span class="align-middle">
                                                                            Delete
                                                                        </span>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="button"
                                                            class="btn rounded-pill btn-outline-primary waves-effect"
                                                            data-repeater-create="">
                                                            <i class="ti ti-plus me-1"></i>
                                                            <span class="align-middle">
                                                                Add
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif

                                        </fieldset>
                                        <!-- button -->
                                        <button type="submit"
                                            class="my-5 py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">
                                            Save changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Repeater -->
                <hr class="my-3">
                <!-- Common Questions -->
                <h3>
                    Common Questions
                </h3>

                <div class="accordion my-3" id="accordionWithIcon">
                    @foreach ($commonQuestions as $index => $question)
                        <div class="card accordion-item my-2">
                            <h2 class="accordion-header d-flex align-items-center">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionWithIcon-{{ $index }}" aria-expanded="false">
                                    <i class="ti ti-star ti-xs me-2"></i>
                                    {{ $question->question }}
                                </button>
                            </h2>

                            <div id="accordionWithIcon-{{ $index }}" class="accordion-collapse collapse"
                                style="">
                                <div class="accordion-body">
                                    {{ $question->answer }}
                                </div>
                                @php
                                    $date = $question->updated_at;
                                    $date = date('Y-m-d', strtotime($date));
                                @endphp
                                                        </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
        integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var formRepeater = $(".Statistic-class-repeater");

        var row = 2;
        var col = 1;
        formRepeater.on('submit', function(e) {
            e.preventDefault();
        });
        formRepeater.repeater({
            show: function() {
                var fromControl = $(this).find('.form-control, .form-select');
                var formLabel = $(this).find('.form-label');

                fromControl.each(function(i) {
                    var id = 'Statistic-class-repeater-' + row + '-' + col;
                    $(fromControl[i]).attr('id', id);
                    $(formLabel[i]).attr('for', id);

                    col++;
                });

                row++;

                $(this).slideDown();
            },
            hide: function(e) {
                Swal.fire({
                    title: 'هل انت متاكد ؟',
                    text: "لن تتمكن من استرجاع هذا العنصر!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'نعم, احذفها!',
                    cancelButtonText: 'لا, الغي الامر',
                    denyButtonText: 'لا تحذف'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).slideUp(e);
                    }
                })
            }
        });
    </script>

@endsection
