<button type="button" class="btn btn-success" data-toggle="modal" data-target="#CreateAnswer">
    <i class ="glyphicon glyphicon-plus"></i>
    Create Answer
</button>
<div class="modal fade" id="CreateAnswer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Create answer</h4>
            </div>
            {!! Form::open() !!}
            {{ csrf_field() }}
            <div class="modal-body" id="box-create-answer">
                <div class="form-group">
                    <label for="answer-tag" class="control-label">Tag:</label>
                    <input type="text" class="form-control" id="" name="answer-tag" required>
                </div>
                <div class="form-group">
                    <label for="answer-content" class="control-label">Answer content:</label>
                    <textarea class="form-control" name="answer-content" required></textarea>
                </div>
                <div class="col-md-6 form-group">
                    <label for="create-answer-correct">Correct?</label>
                    <br>
                    <select class="selectpicker show-tick" data-style="btn-primary"
                            name="answer-correct">
                        <option value="0">Incorrect</option>
                        <option value="1">Correct</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <input id="new-answer" type='file'
                           onchange="readURL(this);" name="answer-desc"
                           multiple>
                    <img id="new-answer-img"
                         src="/img/answer_image/default.jpg" alt="your image"
                         style="height: 100px; width: 100px"/>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id = "create-subject">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    $('#CreateAnswer').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
    });
</script>