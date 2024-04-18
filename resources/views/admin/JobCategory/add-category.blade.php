@include('admin.navbar')

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Add Job Category</h1>
           <a href="{{route('view-category')}}"><button class="view">View All</button></a>
        </div>
        <div class="report-body">
            <form action="{{ route('submit-category')}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="name">Category Name:</label><br>
                    <input type="text" id="name" name="name" class="form-control" required>
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
