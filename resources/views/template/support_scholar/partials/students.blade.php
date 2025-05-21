<style>
    .card_img {
        position: relative;
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
        filter: blur(10px); /* Blur for privacy */
        pointer-events: none;
        user-select: none;
    }

    .stamp {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0.7;
        pointer-events: none;
    }

    .disabled-link {
        pointer-events: none;
        cursor: not-allowed;
        opacity: 0.5;
    }
</style>

@php
    // Filter students to only show those with make_pledge = 0 or payment_approved = 0
    $filteredStudents = $students->filter(function($item) {
        return $item->make_pledge == 0 || $item->payment_approved == 0;
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
            <img class="card-img-top trans_200"
                 src="{{ $imagePath }}"
                 alt="Student Image"
                 oncontextmenu="return false"
                 draggable="false">

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

            @if($item->hostel_status != 1)
                <a href="{{ route('students.hostel', ['id' => $item->id]) }}" class="btn btn-success mt-2">
                    Support for Hostel
                </a>
            @else
                <a href="#" class="btn btn-secondary mt-2 disabled-link">Supported Hostel</a>
            @endif
        </div>
    </div>
</div>
@endforeach

<script>
    function handleCardClick(makePledge, paymentApproved) {
        if (makePledge === 1 && paymentApproved === 1) {
            alert('This student is already adopted.');
        }
    }

    // Disable right-click globally
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    // Disable drag on all images
    document.querySelectorAll('img').forEach(img => {
        img.setAttribute('draggable', 'false');
    });
</script>
