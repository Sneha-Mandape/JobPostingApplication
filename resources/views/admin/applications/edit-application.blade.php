@include('admin.navbar')

<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet">

<div class="main">
    <div class="report-container">
        @if(session('success'))
            <div id="successMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div id="errorMessage" class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="report-header">
           <h1 class="recent-Articles">Edit Application Form</h1>
           <a href="{{route('applications')}}"><button class="view">Back</button></a>
        </div>
        <div class="report-body">
            <form action="{{ route('job-application.update', ['id' => $applicantDetail->id])}}" method="POST" enctype="multipart/form-data">
                @csrf <!-- CSRF protection -->
                <input type="hidden" name="candidate_id" value="{{ $applicantDetail->candidate_id }}">
                <input type="hidden" name="application_id" value="{{ $applicantDetail->id }}">
                <div class="form-group">
                    <label for="name">Name<Span style="color: red">*</span>:</label><br>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $applicantDetail->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email<Span style="color: red">*</span>:</label><br>
                    <input type="email" id="email" name="email" class="form-control"value="{{ $applicantDetail->email }}" required>
                </div>
                <div class="form-group">
                    <label for="why_hire">Why should we hire you? <Span style="color: red">*</span></label><br>
                    <textarea id="why_hire" name="why_hire" class="form-control" rows="5" required>{{ $applicantDetail->why_hire }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $applicantDetail->status == '1' ? 'selected' : '' }}>Accepted</option>
                        <option value="0" {{ $applicantDetail->status == '0' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="form-group" id="rejection_reason" style="{{ $applicantDetail->status == '0' ? '' : 'display:none;' }}">
                    <label for="reason">Rejection Reason:</label><br>
                    <textarea id="reason" name="reason" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="resume">Upload Resume (PDF, DOCX, DOC)<Span style="color: red">*</span>:</label><br>
                    <input type="file" id="resume" class="dropify" name="resume" accept=".pdf,.docx,.doc"/>
                </div>
                <div class="form-group">
                    <p class="form-control">Uploaded Resume :  <a class="view-icon" href="{{ Storage::url($applicantDetail->resume) }}" target="_blank">View Resume</a></p>
                </div>
                <button type="submit" class="btn btn-primary">Update Application</button>
            </form>

        </div>
     </div>
</div>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get the success message element
        var successMessage = document.getElementById('successMessage');
        var errorMessage = document.getElementById('errorMessage');

        // Check if the success message element exists
        if (successMessage) {
            // Hide the success message after 4 seconds
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 3000); // 4000 milliseconds = 4 seconds
        }

        if (errorMessage) {
            // Hide the success message after 4 seconds
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 3000); // 4000 milliseconds = 4 seconds
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var statusSelect = document.getElementById('status');
        var rejectionReason = document.getElementById('rejection_reason');

        // Show/hide rejection reason field based on selected status
        statusSelect.addEventListener('change', function () {
            if (this.value === '0') {
                rejectionReason.style.display = '';
            } else {
                rejectionReason.style.display = 'none';
            }
        });
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


@include('admin.footer')
