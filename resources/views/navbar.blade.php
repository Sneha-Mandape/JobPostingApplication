<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible"
         content="IE=edge">
      <meta name="viewport"
         content="width=device-width,
         initial-scale=1.0">
         <title>Job Posting Application </title>
      <link rel="stylesheet"
         href="{{ asset('css/style.css')}}">
      <link rel="stylesheet"
         href="{{asset('css/responsive.css')}}">
   </head>
   <body>
      <!-- for header part -->
      <header>
         <div class="logosec">
            <div class="logo">Job Posting App</div>
            <img src=
               "https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
               class="icn menuicn"
               id="menuicn"
               alt="menu-icon">
         </div>
         <div class="searchbar">
            <input type="text"
               placeholder="Search">
            <div class="searchbtn">
               <img src=
                  "https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
                  class="icn srchicn"
                  alt="search-icon">
            </div>
         </div>
         <div class="message">
            <div class="circle"></div>
            <img src=
               "https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png"
               class="icn"
               alt="">
            <div class="dp">
               <img src=
                  "https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                  class="dpicn"
                  alt="dp">
            </div>
         </div>
      </header>
      <div class="main-container">
         <div class="navcontainer">
            <nav class="nav">
               <div class="nav-upper-options">

                <a href="{{route('instructor.view-schedule')}}">
                  <div class="nav-option option5">
                     <img src=
                        "https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                        class="nav-img"
                        alt="blog">
                     <h4>Available Jobs</h4>
                  </div>
                </a>
                <a href="{{route('applied-jobs')}}">
                    <div class="nav-option option5">
                       <img src=
                          "https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                          class="nav-img"
                          alt="blog">
                       <h4>Applied Jobs</h4>
                    </div>
                </a>

                <a href="{{route('applicant-rejected-applications')}}">
                    <div class="nav-option option5">
                       <img src=
                          "https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
                          class="nav-img"
                          alt="blog">
                       <h4>Rejected Applications</h4>
                    </div>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a onclick="event.preventDefault(); this.closest('form').submit();" style="cursor: pointer;">
                  <div class="nav-option logout">
                     <img src=
                        "https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
                        class="nav-img"
                        alt="logout">
                     <h4>Logout</h4>
                  </div>
                </a>
            </form>
               </div>
            </nav>
         </div>
         <script>
            // Get the current URL
            var currentUrl = window.location.href;

            // Select all navigation links
            var navLinks = document.querySelectorAll('.nav-option');

            // Loop through each navigation link
            navLinks.forEach(function(navLink) {
              // Check if the href attribute of the link matches the current URL
              if (navLink.href === currentUrl) {
                // If there's a match, add the 'active' class to the parent list item
                navLink.parentNode.classList.add('active');
              }
            });
          </script>
