// Fetch subjects and teachers from the database
fetchDropdownOptions();

function fetchDropdownOptions() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                populateDropdownOptions(response);
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    xhr.open("GET", "fetch_dropdown_options.php", true);
    xhr.send();
}

function populateDropdownOptions(response) {
    var subjectDropdown = document.getElementById("subject");
    var teacherDropdown = document.getElementById("teacher");

    // Clear previous options
    subjectDropdown.innerHTML = "<option value=''>Select a Subject</option>";
    teacherDropdown.innerHTML = "<option value=''>Select a Teacher</option>";

    if (response) {
        // Populate subject options
        for (var i = 0; i < response.subjects.length; i++) {
            var subjectOption = document.createElement("option");
            subjectOption.value = response.subjects[i].Subject_ID;
            subjectOption.textContent = response.subjects[i].Subject_Name;
            subjectDropdown.appendChild(subjectOption);
        }

        // Populate teacher options
        for (var i = 0; i < response.teachers.length; i++) {
            var teacherOption = document.createElement("option");
            teacherOption.value = response.teachers[i].id;
            teacherOption.textContent = response.teachers[i].name;
            teacherDropdown.appendChild(teacherOption);
        }
    }
}

function fetchSubjectData() {
    var subjectID = document.getElementById("subject").value;
    var teacherID = document.getElementById("teacher").value;

    // Make an AJAX request to fetch the data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                displayData(response);
            } else {
                console.log("Error: " + xhr.status);
            }
        }
    };

    xhr.open("GET", "fetch_data.php?subjectID=" + subjectID + "&teacherID=" + teacherID, true);
    xhr.send();
}

function displayData(response) {
    var tableContainer = document.getElementById("tableContainer");

    // Clear previous table
    tableContainer.innerHTML = "";

    if (response) {
        var table = document.createElement("table");
        table.className = "table";

        var thead = document.createElement("thead");
        var headerRow = document.createElement("tr");

        // Create table headers
        var headers = ["Subject Name", "CLO Title", "Subject Counter", "Content Details"];
        for (var i = 0; i < headers.length; i++) {
            var th = document.createElement("th");
            th.textContent = headers[i];
            headerRow.appendChild(th);
        }

        thead.appendChild(headerRow);
        table.appendChild(thead);

        var tbody = document.createElement("tbody");

        // Create table rows with data
        if (response.length > 0) {
            for (var i = 0; i < response.length; i++) {
                var rowData = response[i];

                var row = document.createElement("tr");

                var subjectNameCell = document.createElement("td");
                subjectNameCell.textContent = rowData.Subject_Name;
                row.appendChild(subjectNameCell);

                var cloTitleCell = document.createElement("td");
                cloTitleCell.textContent = rowData.CLO_Title;
                row.appendChild(cloTitleCell);

                var subjectCounterCell = document.createElement("td");
                subjectCounterCell.textContent = rowData.Subject_Counter;
                row.appendChild(subjectCounterCell);

                var contentDetailsCell = document.createElement("td");
                contentDetailsCell.textContent = rowData.Content_Details;
                row.appendChild(contentDetailsCell);

                tbody.appendChild(row);
            }
        } else {
            var emptyRow = document.createElement("tr");
            var emptyCell = document.createElement("td");
            emptyCell.colSpan = 4;
            emptyCell.textContent = "No data found.";
            emptyRow.appendChild(emptyCell);
            tbody.appendChild(emptyRow);
        }

        table.appendChild(tbody);
        tableContainer.appendChild(table);
    }
}
