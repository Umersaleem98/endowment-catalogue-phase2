document.addEventListener("DOMContentLoaded", function () {
    const paynowRadio = document.getElementById("eng_paynow");
    const donationContainer = document.getElementById("eng_donationContainer");

    paynowRadio.addEventListener("change", function () {
        if (paynowRadio.checked) {
            donationContainer.style.display = "block";
        }
    });

    const pledgeRadio = document.getElementById("eng_make_a_pledge");
    pledgeRadio.addEventListener("change", function () {
        if (pledgeRadio.checked) {
            donationContainer.style.display = "none";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const nonEngPaynowRadio = document.getElementById("non_eng_paynow");
    const nonEngDonationContainer = document.getElementById(
        "non_eng_donationContainer"
    );

    nonEngPaynowRadio.addEventListener("change", function () {
        if (nonEngPaynowRadio.checked) {
            nonEngDonationContainer.style.display = "block";
        }
    });

    const nonEngPledgeRadio = document.getElementById("non_eng_make_a_pledge");
    nonEngPledgeRadio.addEventListener("change", function () {
        if (nonEngPledgeRadio.checked) {
            nonEngDonationContainer.style.display = "none";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const pgePaynowRadio = document.getElementById("pge_paynow");
    const pgeDonationContainer = document.getElementById(
        "pge_donationContainer"
    );

    pgePaynowRadio.addEventListener("change", function () {
        if (pgePaynowRadio.checked) {
            pgeDonationContainer.style.display = "block";
        }
    });

    const pgePledgeRadio = document.getElementById("pge_make_a_pledge");
    pgePledgeRadio.addEventListener("change", function () {
        if (pgePledgeRadio.checked) {
            pgeDonationContainer.style.display = "none";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const pgePaynowRadio = document.getElementById("pge_paynow");
    const pgeDonationContainer = document.getElementById(
        "pge_donationContainer"
    );
    const pgnePaynowRadio = document.getElementById("pgne_paynow");
    const pgneDonationContainer = document.getElementById(
        "pgne_donationContainer"
    );

    pgePaynowRadio.addEventListener("change", function () {
        if (pgePaynowRadio.checked) {
            pgeDonationContainer.style.display = "block";
        }
    });

    const pgePledgeRadio = document.getElementById("pge_make_a_pledge");
    pgePledgeRadio.addEventListener("change", function () {
        if (pgePledgeRadio.checked) {
            pgeDonationContainer.style.display = "none";
        }
    });

    pgnePaynowRadio.addEventListener("change", function () {
        if (pgnePaynowRadio.checked) {
            pgneDonationContainer.style.display = "block";
        }
    });

    const pgnePledgeRadio = document.getElementById("pgne_make_a_pledge");
    pgnePledgeRadio.addEventListener("change", function () {
        if (pgnePledgeRadio.checked) {
            pgneDonationContainer.style.display = "none";
        }
    });
});

$(".mess_checkbox").on("change", function () {
    var baseAmount = parseFloat(
        $(this).closest("form").find(".total_amount").val()
    );
    var messAmount = parseFloat($(this).val());

    if (this.checked) {
        baseAmount += messAmount;
    } else {
        baseAmount -= messAmount;
    }

    $(this).closest("form").find(".total_amount").val(baseAmount);
});

document.addEventListener("DOMContentLoaded", function () {
    const degreeSelect = document.getElementById("degree");
    const additionalFieldContainer = document.getElementById(
        "additionalFieldContainer"
    );
    const additionalExpensesCheckbox =
        document.getElementById("additionalExpenses");
    const quantityInput = document.getElementById("no_of_seat");
    const totalAmountInput = document.getElementById("totalAmount");
    const selectedDegreeInput = document.getElementById("selectedDegree");

    function calculateTotal() {
        let total =
            (parseFloat(degreeSelect.value) || 0) *
            parseFloat(quantityInput.value);
        if (additionalExpensesCheckbox.checked) {
            total +=
                parseFloat(additionalExpensesCheckbox.value) *
                parseFloat(quantityInput.value);
        }
        totalAmountInput.value = total.toFixed(2) + " PKR";
    }

    function toggleAdditionalField() {
        if (degreeSelect.value) {
            additionalFieldContainer.style.display = "block";
            selectedDegreeInput.value =
                degreeSelect.options[
                    degreeSelect.selectedIndex
                ].dataset.degreeName;
        } else {
            additionalFieldContainer.style.display = "none";
            selectedDegreeInput.value = "";
        }
    }

    degreeSelect.addEventListener("change", function () {
        calculateTotal();
        toggleAdditionalField();
    });
    additionalExpensesCheckbox.addEventListener("change", calculateTotal);
    quantityInput.addEventListener("input", calculateTotal);

    // Initialize calculation and field visibility
    calculateTotal();
    toggleAdditionalField();
});

document.addEventListener("DOMContentLoaded", function () {
    const pgDegreeSelect = document.getElementById("pgDegree");
    const pgAdditionalFieldContainer = document.getElementById(
        "pgAdditionalFieldContainer"
    );
    const pgAdditionalExpensesCheckbox = document.getElementById(
        "pgAdditionalExpenses"
    );
    const pgQuantityInput = document.getElementById("pgQuantity");
    const pgTotalAmountInput = document.getElementById("pgTotalAmount");
    const pgSelectedDegreeInput = document.getElementById("pgSelectedDegree");

    function calculatePgTotal() {
        let pgTotal =
            (parseFloat(pgDegreeSelect.value) || 0) *
            parseFloat(pgQuantityInput.value);
        if (pgAdditionalExpensesCheckbox.checked) {
            pgTotal +=
                parseFloat(pgAdditionalExpensesCheckbox.value) *
                parseFloat(pgQuantityInput.value);
        }
        pgTotalAmountInput.value = pgTotal.toFixed(2) + " PKR";
    }

    function togglePgAdditionalField() {
        if (pgDegreeSelect.value) {
            pgAdditionalFieldContainer.style.display = "block";
            pgSelectedDegreeInput.value =
                pgDegreeSelect.options[
                    pgDegreeSelect.selectedIndex
                ].dataset.degreeName;
        } else {
            pgAdditionalFieldContainer.style.display = "none";
            pgSelectedDegreeInput.value = "";
        }
    }

    pgDegreeSelect.addEventListener("change", function () {
        calculatePgTotal();
        togglePgAdditionalField();
    });
    pgAdditionalExpensesCheckbox.addEventListener("change", calculatePgTotal);
    pgQuantityInput.addEventListener("input", calculatePgTotal);

    // Initialize calculation and field visibility
    calculatePgTotal();
    togglePgAdditionalField();
});

document.addEventListener("DOMContentLoaded", function () {
    // Function to toggle prove field for undergraduate form
    const proveField = document.querySelector(".prove-field");
    const paymentStatusRadios = document.querySelectorAll(
        'input[name="payments_status"]'
    );

    function toggleProveField() {
        proveField.style.display = document.getElementById("paynow").checked
            ? "block"
            : "none";
    }

    paymentStatusRadios.forEach((radio) => {
        radio.addEventListener("change", toggleProveField);
    });

    // Initial check in case the page is loaded with "Pay Now" selected for undergraduate form
    toggleProveField();

    // Function to toggle prove field for postgraduate form
    const pgProveField = document.querySelector(".prove-field1"); // Correctly target the prove field container
    const pgPayNowRadio = document.getElementById("pg_paynow"); // Correctly target the Pay Now radio button

    function togglePgProveField() {
        pgProveField.style.display = pgPayNowRadio.checked ? "block" : "none"; // Display prove field if Pay Now is checked
    }

    // Add change event listener to the Pay Now radio button for postgraduate form
    pgPayNowRadio.addEventListener("change", togglePgProveField);

    // Initial check in case the page is loaded with "Pay Now" selected for postgraduate form
    togglePgProveField();
});

