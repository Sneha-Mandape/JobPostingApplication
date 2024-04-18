@include('admin.navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Job Type List</h1>
               </div>
               <div class="report-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Job Type Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobtypes as $jobtype)
                        <tr>
                            <td>{{ $jobtype->jobCategory->name }}</td>
                            <td>{{ $jobtype->job_type_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
         </div>
@include('admin.footer')
