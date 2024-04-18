@include('navbar')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Job Application Form</h1>
        </div>
        <div class="report-body">
            <form action="{{ route('submit-job-application')}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="job_id" value="{{ $jobListing }}">
                <div class="form-group">
                    <label for="name">Name<Span style="color: red">*</span>:</label><br>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email<Span style="color: red">*</span>:</label><br>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="why_hire">Why should we hire you? <Span style="color: red">*</span></label><br>
                    <textarea id="why_hire" name="why_hire" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="resume">Upload Resume (PDF, DOCX, DOC)<Span style="color: red">*</span>:</label><br>
                    <input type="file" id="resume" class="dropify" name="resume" accept=".pdf,.docx,.doc" required/>
                </div>
                <button type="submit" class="btn btn-primary">Submit Application</button>
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


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Dropify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<!-- Your Dropify initialization script -->
<script>
    $(document).ready(function(){
        $('.dropify').dropify();
    });
</script>

@include('footer')

