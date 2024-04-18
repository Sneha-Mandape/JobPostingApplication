@include('admin.navbar')



         <div class="main">

            <div class="box-container">
               <div class="box box1">
                  <div class="text">
                     <h2 class="topic-heading">{{$jobListings }}</h2>
                     <h2 class="topic">Total Job Posted</h2>
                  </div>
                  <img src=
                     "https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
                     alt="Views">
               </div>
               <div class="box box2">
                  <div class="text">
                     <h2 class="topic-heading">{{$jobApplications}}</h2>
                     <h2 class="topic">Total Application</h2>
                  </div>
                  <img src=
                     "https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
                     alt="likes">
               </div>
               <div class="box box3">
                  <div class="text">
                     <h2 class="topic-heading">{{$categories}}</h2>
                     <h2 class="topic">Total Category</h2>
                  </div>
                  <img src=
                     "https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
                     alt="comments">
               </div>
               <div class="box box4">
                  <div class="text">
                     <h2 class="topic-heading">{{$jobtypes}}</h2>
                     <h2 class="topic">Total Job Type</h2>
                  </div>
                  <img src=
                     "https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
               </div>
            </div>
            {{-- <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Courses List</h1>
                  <button class="view">View All</button>
               </div>
               <div class="report-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->level }}</td>
                            <td>{{ $course->description }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="course-image">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}

            </div>
         </div>
@include('admin.footer')
