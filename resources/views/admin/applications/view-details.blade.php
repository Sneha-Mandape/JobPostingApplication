@include('admin.navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Available Jobs</h1>
                  <a href="{{route('applications')}}"><button class="view">Back</button></a>
               </div>
               <div class="report-body" style="height: 400px; overflow-y: auto;">
                <table class="table">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <p><b>{{ $applicantDetail->job->title }}</b></p>
                                <p>Applicant Name :  {{ $applicantDetail->name }}</p>
                                <p>Applicant Email :  {{ $applicantDetail->email }}</p>
                                <p>Why should we hire you ?:  {{ $applicantDetail->why_hire }}</p>
                                <p>Uploaded Resume : <br> <a class="view-icon" href="{{ Storage::url($applicantDetail->resume) }}" target="_blank">View Resume</a></p>
                                {{-- <p>Job Type: {{ $jobList->jobType->job_type_name }}</p>
                                <p>Company Details: {{ $jobList->company_details }}</p>
                                <p>Tags: {{ $jobList->tags }}</p>
                                <p>Skills: {{ $jobList->skills }}</p>
                                <p>Experience Required: {{ $jobList->experience_required }}</p>
                                <p>Description:<br>{{ $jobList->description }}</p>
                                <p>Salary: {{ $jobList->salary }}</p>
                                @foreach($jobList->custom_fields as $key => $value)
                                <p>{{ $key }}: {{ $value }}</p>
                                @endforeach
                                <form action="{{ route('apply-now', ['jobListing' => $jobList->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Apply Now</button>
                                </form> --}}
                            </td>

                        </tr>
                    </tbody>

                </table>
            </div>

            </div>
         </div>

         @include('admin.footer')
