$(document).ready(function () {
    // Fetch subjects and populate the subject dropdown
    $.ajax({
        url: 'get_subjects.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var subjectSelect = $('#subjectSelect');
            subjectSelect.empty();

            if (data.length > 0) {
                $.each(data, function (index, subject) {
                    subjectSelect.append($('<option></option>').attr('value', subject.Subject_ID).text(subject.Subject_Name));
                });

                // Trigger change event to load CLO options based on selected subject
                subjectSelect.trigger('change');
            } else {
                subjectSelect.append($('<option></option>').attr('value', '').text('No subjects available'));
            }
        },
        error: function () {
            alert('Error occurred while fetching subjects');
        }
    });

    // Handle subject change event
    $('#subjectSelect').on('change', function () {
        var selectedSubject = $(this).val();
        var cloSelect = $('#cloSelect');

        if (selectedSubject !== '') {
            // Fetch CLOs for the selected subject
            $.ajax({
                url: 'get_clos.php',
                type: 'GET',
                dataType: 'json',
                data: { subject: selectedSubject },
                success: function (data) {
                    cloSelect.empty();

                    if (data.length > 0) {
                        $.each(data, function (
                            index, clo) {
                            cloSelect.append($('<option></option>').attr('value', clo.CLO_ID).text(clo.CLO_Title));
                        });
                    } else {
                        cloSelect.append($('<option></option>').attr('value', '').text('No CLOs available'));
                    }
                },
                error: function () {
                    alert('Error occurred while fetching CLOs');
                }
            });
        } else {
            cloSelect.empty();
        }
    });

    // Handle form submission
    $('#assignForm').on('submit', function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        // Submit the form to assign subject to teacher
        $.ajax({
            url: 'assign_subject.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                alert(response);
                // Reset the form
                $('#assignForm')[0].reset();
            },
            error: function () {
                alert('Error occurred while assigning subject');
            }
        });
    });

    // Fetch CLO details based on selected subject and populate the table
    $('#subjectSelect').on('change', function () {
        var selectedSubject = $(this).val();

        if (selectedSubject !== '') {
            $.ajax({
                url: 'get_clo_details.php',
                type: 'GET',
                dataType: 'json',
                data: { subject: selectedSubject },
                success: function (data) {
                    var cloDetails = $('#cloDetails');
                    cloDetails.empty();

                    if (data.length > 0) {
                        $.each(data, function (index, clo) {
                            var row = '<tr>' +
                                '<td>' + clo.Subject_Name + '</td>' +
                                '<td>' + clo.CLO_Title + '</td>' +
                                '<td>' + clo.Subject_Counter + '</td>' +
                                '<td>' + clo.Content_Details + '</td>' +
                                '</tr>';
                            cloDetails.append(row);
                        });
                    } else {
                        var emptyRow = '<tr><td colspan="4">No CLO details available</td></tr>';
                        cloDetails.append(emptyRow);
                    }
                },
                error: function () {
                    alert('Error occurred while fetching CLO details');
                }
            });
        } else {
            var cloDetails = $('#cloDetails');
            cloDetails.empty();
            var emptyRow = '<tr><td colspan="4">Please select a subject</td></tr>';
            cloDetails.append(emptyRow);
        }
    });
});

