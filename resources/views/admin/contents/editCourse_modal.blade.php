<button type="button" class="btn btn-primary edit-course" data-toggle="modal" data-target="#editCourseModal" value="{{$element}}">
    Edit
    <i class ="glyphicon glyphicon-pencil"></i>
</button>
<div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Edit Course</h4>
            </div>
            <div class="modal-body">
                <form class="update-course">
                    <div class="row-fluid">
                        <label for="name" class="control-label">Language</label> <br>
                        <select  class="subject_id" data-show-subtext="true" data-live-search="true" data-style="btn btn-success">
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}"><?=$subject->name ?></option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <input type="hidden" class="form-control" id="edit-course-id" name="course-id" value="{{$element->id}}">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="edit-course-name" name="course-name" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description:</label>
                        <textarea class="form-control" id="edit-course-description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id = "update-course">Edit</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#editCourseModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    });
</script>