@extends('admin.layout')

@section('courses')
    <div id="test_app">
        <form action="#" method="POST" @submit.prevent = "createQuestion">
            {!! csrf_field() !!}
        <section id="main-content">
            <section class="wrapper">
                <div class="form-group col-md-6 col-md-offset-3">
                    <label for="name" class="control-label">Question content:</label>
                    <input type="text" class="form-control" v-model="question_content" name="question-content" required>
                </div>
                <div v-if="status" class="alert alert-success col-md-3">
                    <strong> Create question Success!</strong>
                </div>
                <div class="col-md-2 col-md-offset-3" style="margin-bottom: 5%">
                    <label for="">Type of question:</label> <br>
                    <select class="btn btn-primary" v-model.number="question_type"
                            name="question-type">
                        @foreach($list_type as $type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Point of question:</label> <br>
                    <select class="btn btn-primary" v-model.number="question_point">
                        <option value="1" >1</option>
                        <option value="2" >2</option>
                        <option value="3" >3</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="">Total answer:</label> <br>
                    <select class="btn btn-primary" v-model.number="total_answer">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="">Course:</label> <br>
                    <select class="btn btn-primary" v-model.number="course"
                            name="question-course" class="btn btn-success">
                        @foreach($list_course as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div v-for="(test, index) in total_answer">
                    <div class="col-md-9 col-md-offset-2">
                        <div id="answer" class="list-answer">
                            <div class="col-md-3">
                                <input type="text" class="form-control"
                                       v-model="list_tag[index]" required placeholder="Answer-tag">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                       v-model="list_content[index]"
                                       name="answer_content" required placeholder="Answer-content">
                            </div>
                            <div class="col-md-1">
                                <div class="radio">
                                    <label><input v-model="correct" type="radio" class="answer-correct" v-bind:value='test'></label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <input type="file" @change="onFileChange">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>


            <button type="submit" class="btn btn-success col-md-offset-6 create-question">
                Create
            </button>
        </form>

    </div>
    <script src="{{mix('js/app.js')}}"></script>
@endsection