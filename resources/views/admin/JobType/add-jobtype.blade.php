@include('admin.navbar')

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Add Job Type</h1>
           <a href="{{route('view-jobtypes')}}"><button class="view">View All</button></a>
        </div>
        <div class="report-body">
            <form action="{{ route('submit-jobtype')}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="job category">Select Job Category:</label><br>
                    <select id="job_category" name="job_category" class="form-control" required>
                        <option value="">Select a Job Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="job_type_name">Job Type:</label><br>
                    <input type="text" id="job_type_name" name="job_type_name" class="form-control" placeholder="Enter Job Type Name" required>
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

@include('admin.footer')
