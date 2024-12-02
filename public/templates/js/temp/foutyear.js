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



document.addEventListener('DOMContentLoaded', function() {
    const pgProveField = document.getElementById('pgProveField');
    const paymentStatusRadios = document.querySelectorAll('input[name="payments_status"]');

    paymentStatusRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            pgProveField.style.display = document.getElementById('pg_paynow').checked ? 'block' : 'none';
        });
    });

    // Initial check in case the page is loaded with "Paynow" selected
    pgProveField.style.display = document.getElementById('pg_paynow').checked ? 'block' : 'none';
});



document.addEventListener('DOMContentLoaded', function() {
    const proveField = document.querySelector('.prove-field');
    const paymentStatusRadios = document.querySelectorAll('input[name="payments_status"]');

    function toggleProveField() {
        proveField.style.display = document.getElementById('ug_paynow').checked ? 'block' : 'none';
    }

    paymentStatusRadios.forEach(radio => {
        radio.addEventListener('change', toggleProveField);
    });

    // Initial check in case the page is loaded with "Pay Now" selected
    toggleProveField();
});


document.addEventListener('DOMContentLoaded', function() {
    const ugDegreeSelect = document.getElementById('ugDegree');
    const ugAdditionalFieldContainer = document.getElementById('ugAdditionalFieldContainer');
    const ugAdditionalExpensesCheckbox = document.getElementById('ugAdditionalExpenses');
    const ugQuantityInput = document.getElementById('ugQuantity');
    const ugTotalAmountInput = document.getElementById('ugTotalAmount');
    const ugSelectedDegreeInput = document.getElementById('ugSelectedDegree');

    function calculateUgTotal() {
        let ugTotal = (parseFloat(ugDegreeSelect.value) || 0) * parseFloat(ugQuantityInput.value);
        if (ugAdditionalExpensesCheckbox.checked) {
            ugTotal += parseFloat(ugAdditionalExpensesCheckbox.value) * parseFloat(ugQuantityInput.value);
        }
        ugTotalAmountInput.value = ugTotal.toFixed(2) + ' PKR';
    }

    function toggleUgAdditionalField() {
        if (ugDegreeSelect.value) {
            ugAdditionalFieldContainer.style.display = 'block';
            ugSelectedDegreeInput.value = ugDegreeSelect.options[ugDegreeSelect.selectedIndex].dataset.degreeName;
        } else {
            ugAdditionalFieldContainer.style.display = 'none';
            ugSelectedDegreeInput.value = '';
        }
    }

    ugDegreeSelect.addEventListener('change', function() {
        calculateUgTotal();
        toggleUgAdditionalField();
    });
    ugAdditionalExpensesCheckbox.addEventListener('change', calculateUgTotal);
    ugQuantityInput.addEventListener('input', calculateUgTotal);

    // Initialize calculation and field visibility
    calculateUgTotal();
    toggleUgAdditionalField();
});


document.addEventListener('DOMContentLoaded', function() {
    const pgDegreeSelect = document.getElementById('pgDegree');
    const pgAdditionalExpensesCheckbox = document.getElementById('pgAdditionalExpenses');
    const pgQuantityInput = document.getElementById('pgQuantity');
    const pgTotalAmountInput = document.getElementById('pgTotalAmount');
    const pgSelectedDegreeInput = document.getElementById('pgSelectedDegree');

    function calculatePgTotal() {
        let pgTotal = (parseFloat(pgDegreeSelect.value) || 0) * parseFloat(pgQuantityInput.value);
        if (pgAdditionalExpensesCheckbox.checked) {
            pgTotal += parseFloat(pgAdditionalExpensesCheckbox.value) * parseFloat(pgQuantityInput.value);
        }
        pgTotalAmountInput.value = pgTotal.toFixed(2) + ' PKR';
    }

    function updatePgSelectedDegree() {
        const selectedDegree = pgDegreeSelect.options[pgDegreeSelect.selectedIndex];
        const degreeName = selectedDegree.dataset.degreeName;
        pgSelectedDegreeInput.value = degreeName || '';
    }

    pgDegreeSelect.addEventListener('change', function() {
        calculatePgTotal();
        updatePgSelectedDegree();
    });

    pgAdditionalExpensesCheckbox.addEventListener('change', calculatePgTotal);
    pgQuantityInput.addEventListener('input', calculatePgTotal);

    calculatePgTotal();
    updatePgSelectedDegree();
});



    $(document).ready(function(){
        $('.paynow-radio').change(function() {
            $('#bankDetails').show();
        });
        $('.pledge-radio').change(function() {
            $('#bankDetails').hide();
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
        toggleAlumniSection('alumni_select_pg-neng', 'alumni_pg-neng');
        toggleAlumniSection('alumni_select_neng', 'alumni-neng');
        toggleAlumniSection('alumni_select_cpackage', 'alumni-cpackage');
        toggleAlumniSection('alumni_select_cpackage_pg', 'alumni-cpackage_pg');
        toggleAlumniSection('alumni_select_eng_pg', 'alumni-eng_pg');
    });
