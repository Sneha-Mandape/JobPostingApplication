@include('navbar')

<div class="main">

    <div class="report-container">
       <div class="report-header">
          <h1 class="recent-Articles">Applied Jobs</h1>
       </div>
       <div class="report-body" style="height: 400px; overflow-y: auto;"">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Date Applied</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appliedJobs as $job)
                <tr>
                    <td>{{ $job->job->title }}</td>
                    <td>{{ $job->job->company_details }}</td>
                    <td>{{ $job->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    </div>
 </div>

@include('footer')
