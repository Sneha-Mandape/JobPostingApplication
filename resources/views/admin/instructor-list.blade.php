@include('admin.navbar')



         <div class="main">
                <div class="report-container">
                    <div class="report-header">
                       <h1 class="recent-Articles">Candidate  List</h1>
                    </div>
                    <div class="report-body">
                     <table class="table">
                         <thead>
                             <tr>
                                <th>Name</th>
                                <th>Email</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($instructors as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                         </tbody>
                     </table>
                 </div>
        </div>
     @include('admin.footer')
