@include('admin.navbar')



         <div class="main">

            <div class="report-container">
               <div class="report-header">
                  <h1 class="recent-Articles">Job Category List</h1>
               </div>
               <div class="report-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            </div>
         </div>
@include('admin.footer')
