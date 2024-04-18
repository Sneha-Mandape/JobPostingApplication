@include('navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Rejected Applications</h1>
                  <a href="{{route('applications')}}"><button class="view">Back</button></a>
               </div>
               <div class="report-body" style="height: 400px; overflow-y: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company Name</th>
                            <th>Rejection Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rejections as $rejection)
                            <tr>
                                <td>{{ $rejection->jobApplication->job->title }}</td>
                                <td>{{ $rejection->jobApplication->job->company_details }}</td>
                                <td style="color: red">{{ $rejection->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
         </div>


         @include('footer')

