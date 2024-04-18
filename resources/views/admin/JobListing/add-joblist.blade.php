@include('admin.navbar')

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Post a Job</h1>
           <a href="{{route('view-job')}}"><button class="view">View All</button></a>
        </div>
        <div class="report-body">
            <form action="{{ route('submit-job')}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="job category">Select Job Category:</label><br>
                    <select id="job_category" name="job_category" class="form-control" required>
                        <option value="">Select a Job Category</option>
                        @foreach($jobCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="job_type_dropdown">
                    <label for="job_type">Select Job Type:</label><br>
                    <select id="job_type" name="job_type" class="form-control" required>
                        <option value="">Select a Job Type</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title:</label><br>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="company_details">Company Details:</label><br>
                    <textarea id="company_details" name="company_details" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Tags:</label><br>
                    <input type="text" id="tags" name="tags" class="form-control">
                </div>
                <div class="form-group">
                    <label for="skills">Skills:</label><br>
                    <input type="text" id="skills" name="skills" class="form-control">
                </div>
                <div class="form-group">
                    <label for="experience_required">Experience Required:</label><br>
                    <input type="text" id="experience_required" name="experience_required" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="salary">Salary:</label><br>
                    <input type="text" id="salary" name="salary" class="form-control">
                </div>
                <!-- Custom additional fields section -->
                <div class="form-group">
                    <label for="custom_fields">Custom Additional Fields:</label><br>
                    <!-- Add as many key-value pairs as needed -->
                    <div id="custom_fields">
                        <!-- Example input field for custom field -->
                        <input type="text" name="custom_key[]" class="form-control" placeholder="Key">
                        <input type="text" name="custom_value[]" class="form-control" placeholder="Value">
                    </div>
                    <button type="button" id="add_custom_field" class="btn  mt-0">Add Custom Field</button>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
     </div>
</div>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get the success message element
        var successMessage = document.getElementById('successMessage');

        // Check if the success message element exists
        if (successMessage) {
            // Hide the success message after 4 seconds
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 4000); // 4000 milliseconds = 4 seconds
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {

            $('#job_category').change(function() {
                debugger
                var categoryId = $(this).val();
                var jobTypeDropdown = $('#job_type');
                jobTypeDropdown.empty(); // Clear existing options

                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: '/admin/get-job-types/' + categoryId,
                        success: function(data) {
                            console.log('Data received:', data);
                            // Populate the job type dropdown with options
                            $.each(data, function(index, jobType) {
                                $('<option>').val(jobType.id).text(jobType.job_type_name).appendTo(jobTypeDropdown);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching job types:', error);
                            // Handle errors here
                        }
                    });
                } else {
                    // If no category selected, show default option
                    $('<option>').val('').text('Select a Job Type').appendTo(jobTypeDropdown);
                }
            });

            $('#add_custom_field').click(function() {
            $('<div class="custom-field">').append(
                $('<input type="text" name="custom_key[]" class="form-control mt-2" placeholder="Key">'),
                $('<input type="text" name="custom_value[]" class="form-control mt-2" placeholder="Value">')
            ).appendTo('#custom_fields');
        });
        });
</script>

@include('admin.footer')
