@extends ('task/layout')

    @section ('content')

    <div class="row mt-3">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto ">

            <div class="card shadow">
                <div class="card-header bg-primary">
                    <div class="card-title font-weight-bold text-white "> Laravel 6 AJAX Todo Application   </div>
                </div>

                <form method="post" id="taskForm">
                    {{csrf_field() }}

                    <div class="card-body">

                    <!-- --- Display success message ----- -->
                    @if(Session::has('success'))
                        <div class='alert alert-success'>
                            {{ Session::get('success') }}
                            @php 
                                Session::forget('success')
                            @endphp
                        </div>
                    @endif


                        <div class="form-group">
                            <label for="task_title"> Task Title </label>
                            <input type="text" class="form-control" name="task_title" id="task_title" placeholder="Task Title">
                        </div>

                        <div class="form-group">
                            <label for="description"> Description </label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                        </div>

                        <div class="form-group">
                            <label for="category"> Category </label>
                            <input type="text" class="form-control" name="category" id="category" placeholder="Category">
                        </div>

                        <div class="form-group">
                            <label for="duration"> Duration </label>
                            <input type="text" class="form-control" name="duration" id="duration" placeholder="Duration">
                        </div>

                    <div class="card-footer">
                        <button type="button" id="saveBtn" class="btn btn-success">Save Task</button>
                    </div>

                    <div id="result"></div>
                </form>
            </div>
        </div>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        // Pass csrf token in ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Trigger ajax function on save button click
        $("#saveBtn").click(function() {
            var formData = $("#taskForm").serialize();
            $.ajax({
                    type    :   "POST",
                    url     :   "store",
                    data    :   formData,
                    dataType :   "json",

                    success: function(res) { 
                        if(res.status == "success") {
                            $("#result").html("<div class='alert alert-success'>" + res.message + "</div>");
                        }

                        else if(res.status == "failed") {
                            $("#result").html("<div class='alert alert-danger'>" + res.message + "</div>");
                        }
                    }                   
            });
        });        
    });
</script>