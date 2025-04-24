<style>
    .card_img {
        position: relative; /* Ensure the container is positioned relative for absolute positioning of the stamp */
    }

    .card-img-top {
        width: 100%; /* Ensure the image covers the full width of its container */
        height: 200px; /* Set a fixed height for all images */
        object-fit: cover; /* Ensure the image covers the area without distortion */
        filter: blur(10px); /* Apply blur effect to all images */
    }

    .stamp {
        position: absolute; /* Position the stamp absolutely within the card_img container */
        top: 0; /* Align it to the top */
        left: 0; /* Align it to the left */
        width: 100%; /* Cover the same width as the image */
        height: 100%; /* Cover the same height as the image */
        object-fit: cover; /* Ensure the stamp covers the area without distortion */
        opacity: 0.7; /* Adjust opacity if needed */
        pointer-events: none; /* Ensure the stamp does not interfere with user interaction */
    }

    .disabled-link {
        pointer-events: none; /* Disable clicks */
        cursor: not-allowed; /* Show disabled cursor */
        opacity: 0.5; /* Make it look disabled */
    }
</style>

@php
    // Filter students to only show those with make_pledge = 1 or payment_approved = 1
    $filteredStudents = $students->filter(function($item) {
        return $item->make_pledge == 1 || $item->payment_approved == 1;
    });
@endphp

@foreach ($filteredStudents as $item)
<div class="col-lg-3 teacher" data-gender="{{ $item->gender }}">
    <div class="card">
        <div class="card_img" onclick="handleCardClick({{ $item->make_pledge }}, {{ $item->payment_approved }})">
            @php
                $studentImage = public_path('templates/students_images/' . $item->images);
                $imagePath = (file_exists($studentImage) && !empty($item->images)) 
                             ? asset('templates/students_images/' . $item->images) 
                             : asset('templates/students_images/dummy.png');
            @endphp
            <img class="card-img-top trans_200" src="{{ $imagePath }}" alt="Student Image">

            <div class="card_plus trans_200 text-center">
                <a href="{{ url('student_stories_indiviual', ['id' => $item->id]) }}">+</a>
            </div>
        </div>

        <div class="card-body text-center mt-4">
            <div class="card-text text-dark mb-2">
                @if($item->gender == 'male')
                    Male from {{ $item->province }}
                @else
                    A Student from {{ $item->province }}
                @endif
            </div>
            <div class="card-text text-dark mb-2">{{ $item->discipline }}</div>
            <div class="card-text text-dark mb-2">{{ $item->gender }}</div>

            {{-- Show Hostel Button Only If hostel_status != 0 --}}
            @if($item->hostel_status != 0)
                <a href="{{ route('students.hostel', ['id' => $item->id]) }}" class="btn btn-success mt-2">
                    Support for Hostel
                </a>
            @else
                {{-- Disabled button --}}
                <a href="#" class="btn btn-secondary mt-2 disabled-link">Supported Hostel</a>
            @endif
        </div>
    </div>
</div>
@endforeach

<script>
    function handleCardClick(makePledge, paymentApproved) {
        // Only show an alert if both make_pledge and payment_approved are 0
        if (makePledge === 0 && paymentApproved === 0) {
            alert('This student is already adopted.');
        }
    }
</script>
