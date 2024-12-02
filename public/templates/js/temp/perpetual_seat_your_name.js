
document.addEventListener('DOMContentLoaded', function () {
    const ugEngPaynowRadio = document.getElementById('ug_eng_paynow');
    const ugEngMakeAPledgeRadio = document.getElementById('ug_eng_make_a_pledge');
    const ugEngDonationContainer = document.getElementById('ug_eng_donationContainer');

    const ugNonEngPaynowRadio = document.getElementById('ug_non_eng_paynow');
    const ugNonEngMakeAPledgeRadio = document.getElementById('ug_non_eng_make_a_pledge');
    const ugNonEngDonationContainer = document.getElementById('ug_non_eng_donationContainer');

    ugEngPaynowRadio.addEventListener('change', function () {
        if (this.checked) {
            ugEngDonationContainer.style.display = 'block';
        }
    });

    ugEngMakeAPledgeRadio.addEventListener('change', function () {
        if (this.checked) {
            ugEngDonationContainer.style.display = 'none';
        }
    });

    ugNonEngPaynowRadio.addEventListener('change', function () {
        if (this.checked) {
            ugNonEngDonationContainer.style.display = 'block';
        }
    });

    ugNonEngMakeAPledgeRadio.addEventListener('change', function () {
        if (this.checked) {
            ugNonEngDonationContainer.style.display = 'none';
        }
    });
});



document.addEventListener('DOMContentLoaded', function () {
    const pgEngPaynowRadio = document.getElementById('pg_eng_paynow');
    const pgEngMakeAPledgeRadio = document.getElementById('pg_eng_make_a_pledge');
    const pgEngDonationContainer = document.getElementById('pg_eng_donationContainer');

    const pgNonEngPaynowRadio = document.getElementById('pg_non_eng_paynow');
    const pgNonEngMakeAPledgeRadio = document.getElementById('pg_non_eng_make_a_pledge');
    const pgNonEngDonationContainer = document.getElementById('pg_non_eng_donationContainer');

    pgEngPaynowRadio.addEventListener('change', function () {
        if (this.checked) {
            pgEngDonationContainer.style.display = 'block';
        }
    });

    pgEngMakeAPledgeRadio.addEventListener('change', function () {
        if (this.checked) {
            pgEngDonationContainer.style.display = 'none';
        }
    });

    pgNonEngPaynowRadio.addEventListener('change', function () {
        if (this.checked) {
            pgNonEngDonationContainer.style.display = 'block';
        }
    });

    pgNonEngMakeAPledgeRadio.addEventListener('change', function () {
        if (this.checked) {
            pgNonEngDonationContainer.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const degreeSelect = document.getElementById('degree');
    const degreeNameInput = document.getElementById('degree_name');
    const noOfSeatInput = document.getElementById('no_of_seat');
    const totalAmountInput = document.getElementById('totalAmount');
    const additionalExpensesCheckbox = document.getElementById('additionalExpenses');

    function calculateTotalAmount() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeFee = parseFloat(selectedOption.value) || 0;
        const noOfSeats = parseInt(noOfSeatInput.value) || 1;
        const additionalExpenses = additionalExpensesCheckbox.checked ? 1100000 * noOfSeats : 0;
        const totalAmount = (degreeFee * noOfSeats) + additionalExpenses;
        totalAmountInput.value = totalAmount.toFixed(2) + ' PKR';
    }

    degreeSelect.addEventListener('change', function() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeName = selectedOption.dataset.degreeName || '';
        degreeNameInput.value = degreeName;
        calculateTotalAmount();
    });

    noOfSeatInput.addEventListener('input', calculateTotalAmount);
    additionalExpensesCheckbox.addEventListener('change', calculateTotalAmount);

    calculateTotalAmount(); // Calculate total amount on initial load
});

// singular custom js packages 



// circilar custom js packages start 

document.addEventListener('DOMContentLoaded', function() {
    const degreeSelect = document.getElementById('circular_ugDegree');
    const degreeNameInput = document.getElementById('circular_ugDegreeName');
    const noOfSeatInput = document.getElementById('circular_ugNoOfSeat');
    const totalAmountInput = document.getElementById('circular_ugTotalAmount');
    const additionalExpensesCheckbox = document.getElementById('circular_ugAdditionalExpenses');

    function calculateTotalAmount() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeFee = parseFloat(selectedOption.value) || 0;
        const noOfSeats = parseInt(noOfSeatInput.value) || 1;
        const additionalExpenses = additionalExpensesCheckbox.checked ? 1100000 * noOfSeats : 0;
        const totalAmount = (degreeFee * noOfSeats) + additionalExpenses;
        totalAmountInput.value = totalAmount.toFixed(2) + ' PKR';
    }

    degreeSelect.addEventListener('change', function() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeName = selectedOption.dataset.degreeName || '';
        degreeNameInput.value = degreeName;
        calculateTotalAmount();
    });

    noOfSeatInput.addEventListener('input', calculateTotalAmount);
    additionalExpensesCheckbox.addEventListener('change', calculateTotalAmount);

    calculateTotalAmount(); // Calculate total amount on initial load
});

// circilar custom js packages end

// singular custom js packages pg start
document.addEventListener('DOMContentLoaded', function() {
    const degreeSelect = document.getElementById('single_pgDegree');
    const degreeNameInput = document.getElementById('single_pgDegreeName');
    const noOfSeatInput = document.getElementById('single_pgNoOfSeat');
    const totalAmountInput = document.getElementById('single_pgTotalAmount');
    const additionalExpensesCheckbox = document.getElementById('single_pgAdditionalExpenses');

    function calculateTotalAmount() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeFee = parseFloat(selectedOption.value) || 0;
        const noOfSeats = parseInt(noOfSeatInput.value) || 1;
        const additionalExpenses = additionalExpensesCheckbox.checked ? 1100000 * noOfSeats : 0;
        const totalAmount = (degreeFee * noOfSeats) + additionalExpenses;
        totalAmountInput.value = totalAmount.toFixed(2) + ' PKR';
    }

    degreeSelect.addEventListener('change', function() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeName = selectedOption.dataset.degreeName || '';
        degreeNameInput.value = degreeName;
        calculateTotalAmount();
    });

    noOfSeatInput.addEventListener('input', calculateTotalAmount);
    additionalExpensesCheckbox.addEventListener('change', calculateTotalAmount);

    calculateTotalAmount(); // Calculate total amount on initial load
});

// singular custom js packages pg end

// circular custom js packages pg start
document.addEventListener('DOMContentLoaded', function() {
    const degreeSelect = document.getElementById('circular_pgDegree');
    const degreeNameInput = document.getElementById('circular_pgDegreeName');
    const noOfSeatInput = document.getElementById('circular_pgNoOfSeat');
    const totalAmountInput = document.getElementById('circular_pgTotalAmount');
    const additionalExpensesCheckbox = document.getElementById('circular_pgAdditionalExpenses');

    function calculateTotalAmount() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeFee = parseFloat(selectedOption.value) || 0;
        const noOfSeats = parseInt(noOfSeatInput.value) || 1;
        const additionalExpenses = additionalExpensesCheckbox.checked ? 1100000 * noOfSeats : 0;
        const totalAmount = (degreeFee * noOfSeats) + additionalExpenses;
        totalAmountInput.value = totalAmount.toFixed(2) + ' PKR';
    }

    degreeSelect.addEventListener('change', function() {
        const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
        const degreeName = selectedOption.dataset.degreeName || '';
        degreeNameInput.value = degreeName;
        calculateTotalAmount();
    });

    noOfSeatInput.addEventListener('input', calculateTotalAmount);
    additionalExpensesCheckbox.addEventListener('change', calculateTotalAmount);

    calculateTotalAmount(); // Calculate total amount on initial load
});

// circular custom js packages pg end



document.addEventListener('DOMContentLoaded', function() {
    // Function to toggle prove field for each instance
    function toggleProveField(proveFieldClass) {
        const proveField = document.querySelector(proveFieldClass);
        const paymentStatusRadios = document.querySelectorAll('input[name="payments_status"]');

        function updateProveFieldVisibility() {
            proveField.style.display = document.querySelector('input[name="payments_status"]:checked').value === 'Paynow' ? 'block' : 'none';
        }

        paymentStatusRadios.forEach(radio => {
            radio.addEventListener('change', updateProveFieldVisibility);
        });

        // Initial check in case the page is loaded with "Pay Now" selected
        updateProveFieldVisibility();
    }

    // Call toggleProveField function for each instance
    toggleProveField('.prove-field');
    toggleProveField('.prove-field2');
    toggleProveField('.prove-field3');
    toggleProveField('.prove-field4');
});



$(document).ready(function() {
    $('input[name="payments_status"]').on('change', function() {
        var engContainer = $('#eng_donationContainer');
        var nonEngContainer = $('#non_eng_donationContainer');

        if ($('#eng_paynow').is(':checked')) {
            engContainer.show();
        } else {
            engContainer.hide();
        }

        if ($('#non_eng_paynow').is(':checked')) {
            nonEngContainer.show();
        } else {
            nonEngContainer.hide();
        }
    });

    $('.mess_checkbox').on('change', function() {
        var baseAmount = parseFloat($(this).closest('form').find('.total_amount').val());
        var messAmount = parseFloat($(this).val());

        if (this.checked) {
            baseAmount += messAmount;
        } else {
            baseAmount -= messAmount;
        }

        $(this).closest('form').find('.total_amount').val(baseAmount);
    });
});


// single endowment for engeering student

document.addEventListener('DOMContentLoaded', function () {
    const paynowRadio = document.getElementById('eng_paynow');
    const makeAPledgeRadio = document.getElementById('eng_make_a_pledge');
    const donationContainer = document.getElementById('eng_donationContainer');

    paynowRadio.addEventListener('change', function () {
        if (this.checked) {
            donationContainer.style.display = 'block';
        }
    });

    makeAPledgeRadio.addEventListener('change', function () {
        if (this.checked) {
            donationContainer.style.display = 'none';
        }
    });
});


// non engeering single endowment
document.addEventListener('DOMContentLoaded', function () {
    const nonEngPaynowRadio = document.getElementById('non_eng_paynow');
    const nonEngMakeAPledgeRadio = document.getElementById('non_eng_make_a_pledge');
    const nonEngDonationContainer = document.getElementById('non_eng_donationContainer');

    nonEngPaynowRadio.addEventListener('change', function () {
        if (this.checked) {
            nonEngDonationContainer.style.display = 'block';
        }
    });

    nonEngMakeAPledgeRadio.addEventListener('change', function () {
        if (this.checked) {
            nonEngDonationContainer.style.display = 'none';
        }
    });
});



document.addEventListener('DOMContentLoaded', function () {
    function toggleAlumniSection(selectId, sectionId) {
        const selectElement = document.getElementById(selectId);
        const sectionElement = document.getElementById(sectionId);

        selectElement.addEventListener('change', function () {
            if (this.value === 'Alumni') {
                sectionElement.classList.remove('d-none');
            } else {
                sectionElement.classList.add('d-none');
            }
        });
    }

    toggleAlumniSection('alumni_select', 'alumni');
    toggleAlumniSection('select-single-endwment-ug-eng', 'single-endwment-ug-eng');
    toggleAlumniSection('select-custom-endwment-ug-eng', 'custom-endwment-ug-eng');


    toggleAlumniSection('select-circular-endwment-ug-eng', 'circular-endwment-ug-eng');
    toggleAlumniSection('select-circular-endwment-ug-neng', 'circular-endwment-ug-neng');
    toggleAlumniSection('select-custom-circular-endwment-ug-eng', 'custom-circular-endwment-ug-eng');


 //    toggleAlumniSection('alumni_select', 'alumni');
    toggleAlumniSection('select-single-endwment-pg-eng', 'single-endwment-pg-eng');
    toggleAlumniSection('select-single-endwment-pg-neng', 'single-endwment-pg-neng');
    toggleAlumniSection('select-single-custom-endwment-pg', 'single-custom-endwment-pg');


    toggleAlumniSection('select-circular-endwment-pg-eng', 'circular-endwment-pg-eng');
    toggleAlumniSection('select-circular-endwment-pg-neng', 'circular-endwment-pg-neng');
    toggleAlumniSection('select-circular-custom-endwment-pg', 'circular-custom-endwment-pg');

});



$(document).ready(function(){
    $('.paynow-radio').change(function() {
        $('#bankDetails').show();
    });
    $('.pledge-radio').change(function() {
        $('#bankDetails').hide();
    });
});
