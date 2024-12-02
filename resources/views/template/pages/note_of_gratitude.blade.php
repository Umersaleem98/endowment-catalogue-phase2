
<style>
.cookie-card {
    width: 100%;
    padding: 2rem;
    background-color: rgba(255, 255, 255, 0.9);
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
    height: 100%;
    border-radius: 10px;
}

.description {
    font-weight: 400;
    font-family: 'Open Sans', sans-serif;
    text-align: justify;
    font-size: 1rem; /* Adjust base font size for mobile */
    line-height: 1.5; /* Adjust line height */
    margin-bottom: 1rem; /* Add margin-bottom for spacing between paragraphs */
}

@media (min-width: 576px) {
    .description {
        font-size: 1.125rem; /* Slightly larger text on small devices */
    }
}

@media (min-width: 768px) {
    .description {
        font-size: 1.25rem; /* Larger text for medium devices */
    }
}

@media (min-width: 992px) {
    .description {
        font-size: 1.375rem; /* Even larger text for large devices */
    }
}

.bg-image {
    background-image: url('templates/images/abc.jpg'); /* Replace with your image URL */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    opacity: 0.9;
    padding: 2rem;
    border-radius: 10px;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
}

/* Additional styling to ensure better text spacing on mobile */
@media (max-width: 767.98px) {
    .description {
        line-height: 1.4; /* Reduce line height for better readability */
        word-spacing: normal; /* Reset word spacing */
    }

    .description ul, .description ol {
        padding-left: 1.5rem; /* Adjust padding for lists on mobile */
    }
}

</style>


<div class="popular page_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>A Note of Gratitude</h1> <!-- Bootstrap's display class for large headings -->
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-stretch">
            <div class="col-lg-12">
                <div class="cookie-card d-flex flex-column">
                    <div class="description p-5 bg-image">
                        <ul class="mb-3">
                            <li>
                                While there is no means that we can pay back your kindness, in return, this contribution will offer substantial brand exposure and leave goodwill associated with your name.
                            </li>
                        </ul>
                        <h2>NUST PLEDGE AND DONOR BILL OF RIGHTS</h2>
                        <ol>
                            <li>Assure that the gift will be used for the purposes for which it is given</li>
                            <li>Keep the Donor informed of all the details regarding the outstanding dues</li>
                            <li>NUST shall provide the provision to donor to established scholarship under the name of choice</li>
                            <li>Awardee will be selected by the Need-based Scholarship Award Committee</li>
                            <li>NUST will forward the student details and will transfer the proceeds from the fund to NUST Finance Office for adjustment in the student account No money will be given directly to the student in any form (cash or cheque)</li>
                            <li>NUST will share students’ progress reports with donors, annually</li>
                            <li>NUST shall offer marketing mileage to the donor on its social media and web handles as a partner</li>
                            <li>NUST shall offer marketing mileage to scholarship established under donor name of choice on social media, donor wall, an invitation to annual donor recognition events, and shoutout on the official website</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
