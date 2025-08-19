<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");


 if(isset($_GET['us_id'])){
    $usfId = $_GET['us_id'];

    $sql = "SELECT * FROM tbl_userprofiles WHERE usf_us_id = $usfId";
    // Execute the query
    $result = $conn->query($sql);
    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $user_profile = $result->fetch_assoc();
        $usf_firstname = $user_profile['usf_firstname'];
        $usf_lastname = $user_profile['usf_lastname'];
        $usf_gender = $user_profile['usf_gender'];
        $usf_dob = $user_profile['usf_dob'];
        $usf_phone = $user_profile['usf_phone'];
        $usf_image = $user_profile['usf_image'];
        $usf_address = $user_profile['usf_address'];
    }
 }
?>




<div class="container-fluid">
   <div class="row">
      <div class="col-lg-5">
         <div class="card card-block p-card" style="height: 500px;">
            <div class="profile-box"  style="height: 50px;">
               <div class="profile-card rounded">
                  <img src="../assets/images/user <?= "/" . $usf_image; ?> " alt="profile-bg"
                     class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                  <h3 class="font-600 text-white text-center mb-0"> <?= $_GET['us_name']; ?> </h3>
                  <p class="text-white text-center mb-5"> <?php if($_GET['us_role'] == '1'){ echo "User"; }elseif($_GET['us_role'] == '2'){ echo "Approver"; }else{ echo "Admin"; } ?> </p>
               </div>
               <div class="pro-content rounded">
                  <div class="d-flex align-items-center mb-3">
                     <div class="p-icon mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                        </svg>
                     </div>
                     <p class="mb-0 eml"> <?= $_GET['us_email']; ?></p>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <div class="p-icon mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                        </svg>
                     </div>
                     <p class="mb-0"> <?= $usf_phone; ?> </p>
                  </div>
                  <div class="d-flex justify-content-center">
                     <div class="social-ic d-inline-flex rounded">                        
                        <a href="#">
                           <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g  clip-path="url(#clip0)">
                                 <path d="M341.269 85.0133H388.011V3.60533C379.947 2.496 352.213 0 319.915 0C252.523 0 206.357 42.3893 206.357 120.299V192H131.989V283.008H206.357V512H297.536V283.029H368.896L380.224 192.021H297.515V129.323C297.536 103.019 304.619 85.0133 341.269 85.0133V85.0133Z" fill="black"/>
                              </g>
                              <defs>
                                 <clipPath><rect width="512" height="512" fill="white"/></clipPath>
                              </defs>
                           </svg>
                        </a>
                        <a href="#">
                           <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g >
                                 <path  d="M459.392 151.744C480.213 136.96 497.728 118.507 512 97.2587V97.2373C492.949 105.579 472.683 111.125 451.52 113.813C473.28 100.821 489.899 80.4053 497.707 55.808C477.419 67.904 455.019 76.4373 431.147 81.216C411.883 60.6933 384.427 48 354.475 48C296.363 48 249.579 95.168 249.579 152.981C249.579 161.301 250.283 169.301 252.011 176.917C164.757 172.651 87.5307 130.837 35.648 67.1147C26.6027 82.8373 21.2693 100.821 21.2693 120.171C21.2693 156.523 39.9787 188.736 67.904 207.403C51.0293 207.083 34.496 202.176 20.48 194.475V195.627C20.48 246.635 56.8533 289.003 104.576 298.773C96.0213 301.12 86.72 302.229 77.056 302.229C70.336 302.229 63.552 301.845 57.1947 300.437C70.784 341.995 109.397 372.565 155.264 373.568C119.552 401.493 74.1973 418.325 25.1093 418.325C16.512 418.325 8.256 417.941 0 416.896C46.5067 446.869 101.589 464 161.024 464C346.261 464 466.987 309.461 459.392 151.744V151.744Z" fill="black"/>
                              </g>
                           </svg>
                        </a>
                        <a href="#">
                           <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                                 <path  d="M500.672 126.485L501.312 130.666C495.125 108.714 478.421 91.7756 457.195 85.6103L456.747 85.5036C416.832 74.6663 256.213 74.6663 256.213 74.6663C256.213 74.6663 95.9999 74.453 55.6799 85.5036C34.0479 91.7756 17.3226 108.714 11.2426 130.218L11.1359 130.666C-3.77607 208.554 -3.88274 302.144 11.7973 385.536L11.1359 381.312C17.3226 403.264 34.0266 420.202 55.2533 426.368L55.7013 426.474C95.5733 437.333 256.235 437.333 256.235 437.333C256.235 437.333 416.427 437.333 456.768 426.474C478.421 420.202 495.147 403.264 501.227 381.76L501.333 381.312C508.117 345.088 512 303.402 512 260.821C512 259.264 512 257.685 511.979 256.106C512 254.656 512 252.928 512 251.2C512 208.597 508.117 166.912 500.672 126.485V126.485ZM204.971 333.888V178.304L338.645 256.213L204.971 333.888Z" fill="black"/>
                              </g>
                              <defs>
                                 <clipPath><rect width="512" height="512" fill="white"/></clipPath>
                              </defs>
                           </svg>
                        </a>
                        <a href="#">
                              <svg width="24" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <g clip-path="url(#clip0)">
                                    <path  d="M262.955 0C122.603 0.0213333 48 89.9413 48 187.989C48 233.451 73.408 290.176 114.091 308.16C125.696 313.387 124.16 307.008 134.144 268.821C134.933 265.643 134.528 262.891 131.968 259.925C73.8133 192.661 120.619 54.3787 254.656 54.3787C448.64 54.3787 412.395 322.795 288.405 322.795C256.448 322.795 232.64 297.707 240.171 266.667C249.301 229.696 267.179 189.952 267.179 163.307C267.179 96.1493 167.125 106.112 167.125 195.093C167.125 222.592 176.853 241.152 176.853 241.152C176.853 241.152 144.661 371.2 138.688 395.499C128.576 436.629 140.053 503.211 141.056 508.949C141.675 512.107 145.216 513.109 147.2 510.507C150.379 506.347 189.291 450.837 200.192 410.709C204.16 396.096 220.437 336.789 220.437 336.789C231.168 356.16 262.101 372.373 295.061 372.373C393.109 372.373 463.979 286.187 463.979 179.243C463.637 76.7147 375.893 0 262.955 0V0Z" fill="black"/>
                                 </g>
                                 <defs>
                                    <clipPath><rect width="512" height="512" fill="white"/></clipPath>
                                 </defs>
                              </svg>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-4 col-lg-12"></div>
            <div class="col-sm-4 col-lg-12"></div>
            <div class="col-sm-4 col-lg-12"></div>
         </div>
      </div>
      <div class="col-lg-7">
         <div class="card card-block" style=" height: 500px;">
            <div class="card-header pb-0">
                <div class="header-title" style="float: right;">
                     <div class="profile-icon bg-primary-light svg-primary text-center"> 
                     <a href="form_user_list.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m15 15 6-6m0 0-6-6m6 6H9a6 6 0 0 0 0 12h3" />
                        </svg>
                     </a>
                     </div>
               </div>
               <div class="header-title">
                  <h4 class="card-title">Details</h4>
               </div>
            </div>
            <div class="card-body">
               <ul class="list-inline p-0 m-0">
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-danger-light svg-danger text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                     </svg>
                     </div>
                     <div class="ml-3">
                        <h5>Name</h5>
                        <p class="mb-0"> <?= $usf_firstname . " " .$usf_lastname ?> </p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-primary-light svg-primary text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                     </svg>
                     </div>
                     <div class="ml-3">
                        <h5>Gender</h5>
                        <p class="mb-0">  <?php if($usf_gender == '1'){ echo "Male"; }else{ echo "Female"; } ?> </p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-warning-light svg-warning text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
                        </svg>
                     </div>
                     <div class="ml-3">
                        <h5> Birthday</h5>
                        <p class="mb-0"> <?= $usf_dob; ?> </p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-success-light svg-success text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                     <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                     </svg>

                     </div>
                     <div class="ml-3">
                        <h5>Address</h5>
                        <p class="mb-0"> <?= $usf_address; ?> </p>
                     </div>
                  </li>
                  <li class="d-flex align-items-center mb-3">
                     <div class="profile-icon iq-icon-box rounded-small bg-info-light svg-info text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                     </svg>

                     </div>
                     <div class="ml-3">
                        <h5>Register Date</h5>
                        <p class="mb-0"> <?= $_GET['us_create_date']; ?> </p>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
      </div>

    </div>
    <!-- Wrapper End-->
<?php
 include("main_foother.php");
?> 

