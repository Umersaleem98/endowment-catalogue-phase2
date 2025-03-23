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
        pointer-events: none;
        cursor: default;
        color: grey; /* or any other style you prefer */
    }
</style>

@foreach ($students as $item)
<div class="col-lg-3 teacher" data-gender="{{ $item->gender }}">
    <div class="card">
        <div class="card_img" 
             onclick="handleCardClick({{ $item->make_pledge }}, {{ $item->payment_approved }})">
            @php
                // Determine the image path
                $studentImage = public_path('templates/students_images/' . $item->images);

                // Use dummy.png if the file does not exist or if the images attribute is empty
                $imagePath = ($item->make_pledge == 0 && $item->payment_approved == 0)
                             ? asset('templates/logo/Adopted Stamp.png')
                             : (file_exists($studentImage) && !empty($item->images) 
                                ? asset('templates/students_images/' . $item->images) 
                                : asset('templates/students_images/dummy.png'));
            @endphp
            <img 
                class="card-img-top trans_200" 
                src="{{ $imagePath }}" 
                alt="Student Image"
            >

            @if($item->make_pledge == 0 && $item->payment_approved == 0)
                <img class="stamp" src="{{ asset('templates/logo/Adopted Stamp.png') }}" alt="Stamp">
                <div class="card_plus trans_200 text-center">
                    <a href="#" class="disabled-link">+</a>
                </div>
            @else
                <div class="card_plus trans_200 text-center">
                    <a href="{{ url('student_stories_indiviual', ['id' => $item->id]) }}">+</a>
                </div>
            @endif
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
            <a href="{{ url('student_stories_hostel_ndiviual', ['id' => $item->id]) }}" class="btn btn-success mt-2">View Hostel</a>
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
