@include('navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Available Jobs</h1>
               </div>
               <div class="report-body" style="height: 400px; overflow-y: auto;"">
                <table class="table">
                    <tbody>
                        @foreach($jobListings as $jobList)
                        <tr>
                            <td colspan="2">
                                <p><b>{{ $jobList->title }}</b></p>
                                <p>Job Category: {{ $jobList->jobCategory->name }}</p>
                                <p>Job Type: {{ $jobList->jobType->job_type_name }}</p>
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
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            </div>
         </div>

