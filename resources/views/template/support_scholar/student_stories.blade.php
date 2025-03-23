<!DOCTYPE html>
<html lang="en">
<head>
    <title>Story</title>
    @include('template.layouts.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .info_container
        {
                color: black;
         }
        .disabled-link
        {
                    pointer-events: none;
                    cursor: not-allowed;
                    opacity: 0.6;
        }

    </style>
</head>
<body>

<div class="super_container">

	<!-- Header -->

@include('template.layouts.navbar')

	<!-- Home -->


	<!-- Popular -->


	<!-- Register -->

	@include('template.layouts.home')

	<!-- Services -->

	<div class="services page_section">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1 class="">Student Story</h1>
					</div>
				</div>
			</div>

            <div class="row services_row">
                <!-- Left Section for Images -->
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="image_container">
                        <img src="{{ asset('templates/students_images/' . $students->images) }}" class="img-fluid" alt="Left Image" style="height: 400px; width:100%; filter: blur(12px)">

                    </div>
                </div>
                <!-- Right Section for Information -->
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="info_container mt-5" style="color: black;">
                        {{-- <h2>Student Name: <span>{{$students->name}} </h2> --}}
                        {{-- <h2>Qalam ID: <span>{{$students->qalam_id}}</span></h2> --}}
                        <!-- Add an ID to the paragraph tag for easier targeting with JavaScript -->
                        {{-- <h2>Son/Doughter of <span>{{$students->father_name}}</span></h2> --}}
                        <h3>Hometown: <span>{{$students->province}}</span></h3>
                        <h3>Name: <span>{{$students->student_name}}</span></h3>
                        <!-- Add a unique ID to the paragraph tag for targeting -->
                        <h3>Discipline: <span>{{$students->discipline}}</span></h3>
                        <!-- Add a unique ID to the paragraph tag for targeting -->
                        <h3>Province: <span>{{$students->province}}</span></h3>
                        <!-- Add a unique ID to the paragraph tag for targeting -->
                        <h3>Gender: <span>{{$students->gender}}</span></h3>

                        <h3>Household Income: <span>{{$students->monthly_income}} (PKR)</span></h3>
                        <!-- Add a unique ID to the paragraph tag for targeting -->
                        <br>

                        <!-- Add an ID to the paragraph tag for easier targeting with JavaScript -->
                        {{-- <span ><img src="{{ asset('templates/images/quotation-right-mark-svgrepo-com.svg') }}" alt="" style="width:15px; height:15px; color:bluel; transform: rotate(180deg);"></span> --}}

                        <div class="owl-item">
                            <div class="testimonials_item text-center">
                                {{-- <div class="quote">“</div> --}}
                                <p class="text-dark" style="text-align: start">
                                    {{-- <span class="quote">"</span> --}}
                                    {{$students->statement_of_purpose}}
                                    {{-- <span class="quote">"</span> --}}
                                 </p>

                            </div>
                        </div>
                        <!-- Add a button to toggle visibility -->
                    </div>
                </div>

            </div>

		</div>
	</div>


    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 mb-3">
                <div class="hero_box d-flex flex-row align-items-center justify-content-start" style="height:100px">
                    <!-- Conditional link based on $isPledgeApproved value -->
                    <a href="{{ $isPledgeApproved == 1 ? url('Make_a_Pledge', ['id' => $students->id]) : '#' }}"
                       class="d-flex align-items-center {{ $isPledgeApproved == 0 ? 'disabled-link' : '' }}"
                       {{ $isPledgeApproved == 0 ? 'aria-disabled="true"' : '' }}>
                        <img src="{{ asset('templates/images/forward-svgrepo-com.svg') }}" class="svg" alt="">
                        <div class="hero_box_content">
                            <h2 class="hero_box_title">Make a Pledge</h2>
                            <a href="{{ url('student_stories') }}" class="hero_box_link" hidden>View More</a>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="hero_box d-flex flex-row align-items-center justify-content-start" style="height:100px">
                    <!-- Conditional link based on $isPaymentApproved value -->
                    <a href="{{ $isPaymentApproved == 1 ? url('payment', ['id' => $students->id]) : '#' }}"
                       class="d-flex align-items-center {{ $isPaymentApproved == 0 ? 'disabled-link' : '' }}"
                       {{ $isPaymentApproved == 0 ? 'aria-disabled="true"' : '' }}>
                        <img src="{{ asset('templates/images/bank-svgrepo-com.svg') }}" class="svg" alt="">
                        <div class="hero_box_content">
                            <h2 class="hero_box_title">Pay Now</h2>
                            <a href="{{ url('select_project') }}" class="hero_box_link" hidden>View More</a>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>



	<!-- Testimonials -->

<hr class="mt-5">

	<!-- Events -->

    {{-- @include('template.layouts.event') --}}
	<!-- Footer -->

    @include('template.layouts.footer')

</body>
</html>
