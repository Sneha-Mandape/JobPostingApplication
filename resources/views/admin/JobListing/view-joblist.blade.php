@include('admin.navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Available Jobs</h1>
               </div>
               <div class="report-body" style="height: 400px; overflow-y: auto;">
                <table class="table">
                    <tbody>
                        <ul>
                        @foreach($jobListings as $jobList)
                        <li>
                            <p><b>{{ $jobList->title }}</b></p>
                            <p>Job Category : {{ $jobList->jobCategory->name }}</td>
                            <p>Job Type : {{ $jobList->jobType->job_type_name }}</td>
                            <p>Company Details : {{ $jobList->company_details }}</p>
                            <p>Tags : {{ $jobList->tags }}</p>
                            <p>skills : {{ $jobList->skills }}</p>
                            <p>Experience Required : {{ $jobList->experience_required }}</p>
                            <p>Decription : </br>{{ $jobList->description }}</p>
                            <p>Salary : {{ $jobList->salary }}</p>
                            @foreach($jobList->custom_fields as $key => $value)
                                <p>{{ $key }}: {{ $value }}</p>
                            @endforeach
                            </li><hr>
                        @endforeach
                        </ul>
                    </tbody>
                </table>
            </div>

            </div>
         </div>
@include('admin.footer')
