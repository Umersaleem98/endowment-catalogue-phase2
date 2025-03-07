<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teams</title>
    @include('template.layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        b {
            font-size: 1.25rem;
            /* Use relative units for font size */
        }

        .image-container img {
            width: 100%;
            height: auto;
            max-height: 500px;
            /* Set max height for large screens */
        }

        .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            position: relative;
            padding: 1rem;
            /* Add padding for better spacing */
        }

        .text-container p {
            font-size: 1rem;
            /* Use relative units for font size */
            text-align: left;
            overflow: hidden;
            position: relative;
            margin: 0;
        }

        /* Collapse text only on small screens */
        @media (max-width: 768px) {
            .text-container p.collapsed {
                max-height: 200px;
                /* Limit the height when collapsed */
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .show-more {
                display: block;
                /* Show the "Show More" button on small screens */
            }
        }

        /* Ensure full text is shown on larger screens */
        @media (min-width: 769px) {
            .text-container p {
                max-height: none;
                /* Show full text on larger screens */
            }

            .show-more {
                display: none;
                /* Hide the "Show More" button on larger screens */
            }
        }

        .show-more {
            color: blue;
            cursor: pointer;
            font-weight: bold;
            margin-top: 1rem;
            /* Adjust spacing */
            display: none;
            /* Hidden by default */
        }

        .author {
            font-size: 1.1rem;
            /* Use relative units for font size */
            color: black;
            font-weight: bold;
            margin-top: 1rem;
            /* Adjust spacing */
            text-align: left;
        }



        .members {
            padding: 30px 0;
        }

        .members .member {
            border: 0;
            background-color: #f2f2f2;
        }

        .card-body {
            /* padding: 62px 22px; */
            padding: 10px;
            transition: 0.5s;
            cursor: pointer;
        }

        .hover {
            margin-top: -70px;
            background-color: #ffffff;
            margin-bottom: 70px;
        }

        .card-body p {
            color: #ffa400;
            margin-bottom: 12px;

        }

        ul {
            margin: 0;
            padding: 0;
        }

        .card-body ul li {
            list-style: none;
            display: inline-block;
            padding: 6px;
        }

        .card-body ul li a {
            color: #000000;
            font-weight: 300;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            text-decoration: none;
            transition: all 0.4s ease-in-out;
        }

        .card-body ul li a:hover {
            color: #ffffff;
            background-color: #000000;
        }
        .card-img-top {
    max-height: 250px; /* You can adjust this value based on your desired height */
    height: 250px; /* Set a fixed height */
    object-fit: cover; /* Ensures that the image scales properly without distortion */
    border-radius: 20px; /* Keep the border radius for rounded corners */
}

<<<<<<< HEAD
=======
/* animations  */



>>>>>>> parent of f1a3993 (phase 3)
    </style>
</head>

<body>

    @include('template.layouts.home')

    <div class="super_container">
        @include('template.layouts.navbar')
        <br><br><br><br><br>

        <div class="row mt-2">
            <div class="col">
                <div class="section_title text-center">
                    <h1>MEET OUR TEAM</h1>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12 col-sm-12 image-container">
                    <img src="{{ asset('team/Arooba_Gillani.png') }}" class="img-fluid" alt="CEO Image"
                        style="box-shadow: 0 0 6px red; border:3px solid orange;">
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 text-container">
                    <p class="text-dark collapsed" id="text">
                        <b style="color: #085590; font-size: 16px;">A commitment</b> to quality faculty and students has
                        fueled NUST’s impressive rise in rankings and the success of our international alumni network.
                        As Director Advancement, I am privileged to steer a self-sustaining system that supports <b
                            style="color: #085590; font-size: 16px;">Pakistan’s leading science and technology
                            university.</b> Our aim is to become the driving force of Pakistan’s knowledge economy, with
                        the <b style="color: #085590; font-size: 16px;">dream of making NUST a need-blind
                            university.</b>
                        Many deserving students face significant financial challenges, with <b
                            style="color: #085590; font-size: 16px;">nearly half of our undergraduates requiring
                            scholarships. Despite our best efforts, a gap remains, affecting 150 to 250 students</b>
                        annually. Our <b style="color: #085590; font-size: 16px;">NEED Initiative Campaign</b> aims to
                        bridge this gap, ensuring all talented students can afford higher education.
                        <br>
                        Your support is crucial to this campaign, dedicated to making need-blind admissions a reality
                        and empowering our youth. <b style="color: #085590; font-size: 16px;">Join us in sponsoring
                            dreams and lighting the way for an equitable future.</b>
                    </p>
                    <span class="show-more" id="showMoreBtn">Show More</span>
                    <div class="author text-end">
                        Arooba Gillani,<br>
                        Director<br>
                        University Advancement Office
                    </div>
                </div>
            </div>
        </div>


        <br>

        <div class="container">
            <div class="row">
                @foreach ($teams as $item)
                    <div class="col-md-3 col-lg-3 mb-3">
                        <div class="card text-center member" onclick="showMemberModal({{ json_encode($item) }})">
                            <img class="card-img-top" src="{{ asset('team/' . $item->image) }}" 
                                 alt="Card image cap" style="max-height: 350px; border-radius: 20px;">
                            <div class="card-body">
                                <h3 class="card-title text-dark">{{ $item->name }}</h3>
                                <p class="card-text text-primary">{{ $item->designation }}</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        @if ($item->social_media)
                                            <a href="{{ $item->social_media }}" target="_blank">
                                                {{-- <i class="fa-brands fa-linkedin" style="font-size: 30px; color:#0A66C2;"></i> --}}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="teamMemberModal" tabindex="-1" aria-labelledby="teamMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="teamMemberModalLabel">Team Member Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="modalImage" src="" class="img-fluid rounded" alt="Member Image">
                            </div>
                            <div class="col-md-8">
<<<<<<< HEAD
                                <h3 id="modalName"></h3>
                                <p id="modalDesignation" class="text-primary"></p>
                                <p id="modalIntroduction"></p>
                                <p id="modalemail" class="text-secondary"></p>
                                <p id="modalContact"></p>
                                <!-- Social Media LinkedIn Icon -->
                                <a id="modalSocialMedia" href="#" target="_blank" style="display: none;">
=======
                                <h3 id="modalName" class="text-dark"></h3>
                                <p id="modalDesignation" class="text-primary"></p>
                                <p id="modalIntroduction" class="text-dark"></p>
                                <p id="modalemail"  class="text-dark"></p>
                                <p id="modalContact" class="text-dark"></p>
                                <!-- Social Media LinkedIn Icon -->
                                <a id="modalSocialMedia" href="#" target="_blank" style="display: none;" class="text-center">
>>>>>>> parent of f1a3993 (phase 3)
                                    <i class="fa-brands fa-linkedin" style="font-size: 30px; color:#0A66C2;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- Additional close button -->
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        


        @include('template.layouts.event')
        @include('template.layouts.footer')
    </div>

   <!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
    // Add event listeners to all images with the class "preview-image"
    document.querySelectorAll('.preview-image').forEach(image => {
        image.addEventListener('click', function () {
            const modalImage = document.getElementById('previewImage');
            modalImage.src = this.src; // Set the source of the modal image
            const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            modal.show(); // Show the modal
        });
    });
</script>

</body>

</html>
<script>
 function showMemberModal(item) {
    // Set image, name, and other details
    document.getElementById('modalImage').src = '/team/' + item.image;  // Adjust path if needed
    document.getElementById('modalName').innerText = item.name;
    document.getElementById('modalDesignation').innerText = item.designation;
    document.getElementById('modalIntroduction').innerText = item.introduction;
    document.getElementById('modalemail').innerText = item.email;
    document.getElementById('modalContact').innerText = item.phone;

    // Check if social media exists and set the link, otherwise hide it
    const socialMediaLink = document.getElementById('modalSocialMedia');
    
    if (item.social_media) {
        socialMediaLink.style.display = 'inline-block'; // Show the icon
        socialMediaLink.href = item.social_media; // Set the link
    } else {
        socialMediaLink.style.display = 'none'; // Hide the icon if no social media link
    }

    // Show the modal (Bootstrap 5)
    var myModal = new bootstrap.Modal(document.getElementById('teamMemberModal'));
    myModal.show();
}


</script>
