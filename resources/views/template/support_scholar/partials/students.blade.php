<style>
    .card_img {
        position: relative; /* Ensure the container is positioned relative for absolute positioning of the stamp */
    }

    .card-img-top {
        width: 100%; /* Ensure the image covers the full width of its container */
        height: 200px; /* Set a fixed height for all images */
        object-fit: cover; /* Ensure the image covers the area without distortion */
    }

    .blurred {
        filter: blur(20px); /* Apply blur effect to the image */
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
        color: white;
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
        <div class="card_img">
            @php
                // Determine the image path based on the condition
                $imagePath = ($item->make_pledge == 0 && $item->payment_approved == 0)
                             ? asset('templates/logo/Adopted Stamp.png')
                             : asset('templates/students_images/' . $item->images);
                $imageClass = ($item->make_pledge == 0 && $item->payment_approved == 0) ? 'blurred' : '';
            @endphp
            <img class="card-img-top trans_200 {{ $imageClass }}" src="{{ $imagePath }}" alt="Student Image" style="filter: blur(10px)">

            @if($item->make_pledge == 0 && $item->payment_approved == 0)
                <img class="stamp" src="{{ asset('templates/logo/Adopted Stamp.png') }}" alt="Stamp" style="color: white;">
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
            {{-- <div class="card-text text-dark mb-2">{{ $item->monthly_income }}</div> --}}
        </div>
    </div>
</div>
@endforeach
