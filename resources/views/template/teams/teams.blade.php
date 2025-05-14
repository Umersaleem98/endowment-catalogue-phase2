<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teams</title>
    @include('template.layouts.head')

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        b {
            font-size: 1.25rem;
        }

        .image-container img {
            width: 100%;
            height: auto;
            max-height: 500px;
        }

        .text-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            position: relative;
            padding: 1rem;
        }

        .text-container p {
            font-size: 1rem;
            text-align: left;
            overflow: hidden;
            margin: 0;
        }

        @media (max-width: 768px) {
            .text-container p.collapsed {
                max-height: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .show-more {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .text-container p {
                max-height: none;
            }

            .show-more {
                display: none;
            }
        }

        .show-more {
            color: blue;
            cursor: pointer;
            font-weight: bold;
            margin-top: 1rem;
            display: none;
        }

        .author {
            font-size: 1.1rem;
            color: black;
            font-weight: bold;
            margin-top: 1rem;
            text-align: left;
        }

        .members {
            padding: 30px 0;
        }

        .members .member {
            background-color: #f2f2f2;
        }

        .card-body {
            padding: 10px;
            transition: 0.5s;
            cursor: pointer;
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
            height: 250px;
            object-fit: cover;
            border-radius: 20px;
        }
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
                <h1 class="animate__animated animate__fadeInDown">MEET OUR TEAM</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 image-container animate__animated animate__fadeInLeft">
                <img src="{{ asset('team/Arooba_Gillani.png') }}" class="img-fluid"
                     style="box-shadow: 0 0 6px red; border:3px solid orange;">
            </div>
            <div class="col-lg-8 text-container animate__animated animate__fadeInRight">
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
                <div class="col-md-3 col-lg-3 mb-3 animate__animated animate__fadeInUp">
                    <div class="card text-center member" onclick="showMemberModal({{ json_encode($item) }})">
                        <img class="card-img-top" src="{{ asset('team/' . $item->image) }}" alt="Card image">
                        <div class="card-body">
                            <h3 class="card-title text-dark">{{ $item->name }}</h3>
                            <p class="card-text text-primary">{{ $item->designation }}</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    @if ($item->social_media)
                                        <a href="{{ $item->social_media }}" target="_blank">
                                            {{-- LinkedIn icon goes here --}}
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
        <div class="modal-dialog modal-lg animate__animated animate__zoomIn">
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
                            <h3 id="modalName" class="text-dark"></h3>
                            <p id="modalDesignation" class="text-primary"></p>
                            <p id="modalIntroduction" class="text-dark"></p>
                            <p id="modalemail" class="text-dark"></p>
                            <p id="modalContact" class="text-dark"></p>
                            <a id="modalSocialMedia" href="#" target="_blank" style="display: none;">
                                <i class="fa-brands fa-linkedin" style="font-size: 30px; color:#0A66C2;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @include('template.layouts.event')
    @include('template.layouts.footer')
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script>
    function showMemberModal(item) {
        document.getElementById('modalImage').src = '/team/' + item.image;
        document.getElementById('modalName').innerText = item.name;
        document.getElementById('modalDesignation').innerText = item.designation;
        document.getElementById('modalIntroduction').innerText = item.introduction;
        document.getElementById('modalemail').innerText = item.email;
        document.getElementById('modalContact').innerText = item.phone;

        const socialMediaLink = document.getElementById('modalSocialMedia');
        if (item.social_media) {
            socialMediaLink.style.display = 'inline-block';
            socialMediaLink.href = item.social_media;
        } else {
            socialMediaLink.style.display = 'none';
        }

        var myModal = new bootstrap.Modal(document.getElementById('teamMemberModal'));
        myModal.show();
    }
</script>

</body>
</html>
