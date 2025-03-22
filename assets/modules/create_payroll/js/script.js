$(document).ready(function () {
    // Generate dynamic month options
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const monthSelect = $('#monthSelect');
    months.forEach((month, index) => {
        monthSelect.append(`<option value="${index + 1}">${month}</option>`);
    });

    $('#monthSelect, #yearInput').change(function () {
        updateWeekOptions();
    });

    function updateWeekOptions() {
        const month = $('#monthSelect').val();
        const year = $('#yearInput').val();
        if (month === '' || year === '') {
            return; // Do not update if month or year is not selected
        }

        const daysInMonth = new Date(year, month, 0).getDate();

        let optionsHTML = '<option value="">Select Week</option>';
        for (let i = 1; i <= daysInMonth; i++) {
            if (i <= 15) {
                optionsHTML += `<option value="${i}-15">${i}-15</option>`;
            } else {
                optionsHTML += `<option value="16-${daysInMonth}">16-${daysInMonth}</option>`;
                break; // Stop adding options after 15th and last day of the month
            }
        }
        $('#weekSelect').html(optionsHTML);
    }

    // Initialize week options based on initial month and year values
    updateWeekOptions();

    $('#numberOfClients').change(function () {
        const numberOfClients = parseInt($(this).val());
        if (isNaN(numberOfClients) || numberOfClients <= 0) {
            $('#clientInputsContainer').empty(); // Clear client inputs if invalid or zero clients
            return;
        }

        $('#clientInputsContainer').empty(); // Clear previous client inputs
        for (let i = 1; i <= numberOfClients; i++) {
            $('#clientInputsContainer').append(`
            <label for="clientName${i}" class="form-label">Client Name</label>
                <div class="input-group mb-3">
                <span class="input-group-text">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 1 0-6 3 3 0 0 1 0 6zM1.5 14c0-1.625 3.75-2.5 6.5-2.5s6.5.875 6.5 2.5v1c0 .25-.25.5-.5.5h-12c-.25 0-.5-.25-.5-.5v-1z" />
                   </svg>
                </span>
                    <input type="text" class="form-control" id="clientName${i}" name="clientName${i}" placeholder="Client Name" required>
                </div>
                <div class="mb-3">
                    <label for="clientCommission${i}" class="form-label">Onlineinsure Commission</label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" id="clientCommission${i}" name="clientCommission${i}" placeholder="Commission Amount" required>
                    </div>
                </div>
            `);
        }
    });

});