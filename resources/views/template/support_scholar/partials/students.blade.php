<style>
    .card_img {
        position: relative;
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
        filter: blur(10px);
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

@foreach ($students as $item)
    {{-- Hide card if make_pledge, payment_approved, and hostel_status are all 0 --}}
    @if (!($item->make_pledge == 1 && $item->payment_approved == 1 && $item->hostel_status == 1))
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 teacher" data-gender="{{ $item->gender }}">
            <div class="card h-100">
                <div class="card_img" onclick="handleCardClick({{ $item->make_pledge }}, {{ $item->payment_approved }})">
                    @php
                        $studentImage = public_path('templates/students_images/' . $item->images);
                        $imagePath =
                            file_exists($studentImage) && !empty($item->images)
                                ? asset('templates/students_images/' . $item->images)
                                : asset('templates/students_images/dummy.png');
                    @endphp
                    <img class="card-img-top trans_200" src="{{ $imagePath }}" alt="Student Image"
                        oncontextmenu="return false" draggable="false">

                    <div class="card_plus trans_200 text-center">
                        <a href="{{ route('student.stories.indiviual', ['id' => $item->id]) }}">+</a>
                    </div>
                </div>

                <div class="card-body text-center mt-3">
                    <div class="card-text text-dark mb-2">
                        @if ($item->gender == 'male')
                            Male from {{ $item->province }}
                        @else
                            A Student from {{ $item->province }}
                        @endif
                    </div>
                    <div class="card-text text-dark mb-2">{{ $item->discipline }}</div>
                    <div class="card-text text-dark mb-2">{{ ucfirst($item->gender) }}</div>

                    @if ($item->hostel_status != 1)
                        <a href="{{ route('students.hostel', ['id' => $item->id]) }}" class="btn btn-success mt-2">
                            Support for Hostel
                        </a>
                    @else
                        <a href="#" class="btn btn-secondary mt-2 disabled-link">Supported Hostel</a>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endforeach

<script>
    function handleCardClick(makePledge, paymentApproved) {
        if (makePledge === 1 && paymentApproved === 1) {
            alert('This student is already adopted.');
        }
    }

    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    document.querySelectorAll('img').forEach(img => {
        img.setAttribute('draggable', 'false');
    });
</script>
