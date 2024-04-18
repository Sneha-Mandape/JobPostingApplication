@include('navbar')



         {{-- <div class="main">


            <div class="report-container">
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
            </div>

            </div>
         </div> --}}
@include('footer')
