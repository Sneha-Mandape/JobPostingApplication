@include('admin.navbar')


<div class="main">

    <div class="report-container">
       <div class="report-header">
          <h1 class="recent-Articles">Applied Jobs</h1>
       </div>
       <div class="report-body" style="height: 400px; overflow-y: auto;">
        <table class="table">
            <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>Candidate Email</th>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Date Applied</th>
                    <th> Status </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                @foreach($appliedJobs as $job)
                <tr>
                    <td>{{ $job->name }} </td>
                    <td>{{ $job->email }} </td>
                    <td>{{ $job->job->title }}</td>
                    <td>{{ $job->job->company_details }}</td>
                    <td>{{ $job->created_at->format('M d, Y') }}</td>
                    @if($job->status == 1)
                        <td>Active </td>
                    @else
                    <td style="color: red; font-weight:500">Rejected </td>
                    @endif
                    <td>
                        <a class="view-icon" href="{{ route('job-application.view', ['id' => $job->id]) }}">
                            <i class="fa fa-eye"></i> <!-- Assuming you're using Font Awesome -->
                        </a>&nbsp;

                        <a class="edit-icon" href="{{ route('job-application.edit', ['id' => $job->id]) }}">
                            <i class="fa fa-edit"></i><!-- Assuming you're using Font Awesome -->
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    </div>
 </div>






@include('admin.footer')
