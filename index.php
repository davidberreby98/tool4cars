

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tool4cars</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: start;
    min-height: 100vh;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding-top: 40px;
}

label, select {
    font-size: 1.1em;
    margin-bottom: 20px;
}

.dynamic-div {
    width: 90%;
    max-width: 1000px;
    background-color: white;
    padding: 20px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
    border-radius: 10px;
    margin-bottom: 40px;
        display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: start;
}


    tr.car-row {
        cursor: pointer;
    }

    tr.car-row:hover {
        background-color: #f0f0f0;
    }

    .car-details {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        max-width: 400px;
        background-color: #fdfdfd;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .car-details h2 {
        margin-top: 0;
        font-size: 1.4em;
        color: #333;
    }

    .car-details ul {
        list-style: none;
        padding: 0;
    }

    .car-details li {
        padding: 4px 0;
        border-bottom: 1px solid #eee;
    }

    .car-details li:last-child {
        border-bottom: none;
    }

    .back-button {
        margin-top: 16px;
        display: inline-block;
        background-color: #007BFF;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        text-decoration: none;
        cursor: pointer;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
    .older-than-4 {
        background-color: #ffe5e5 !important;
    }

    .younger-than-4 {
        background-color: #e5ffe5 !important;
    }

    button, .back-button {
    background-color: #007BFF;
    border: none;
    color: white;
    padding: 10px 18px;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.2s ease;
    margin: 5px;
}

button:hover, .back-button:hover {
    background-color: #0056b3;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

th {
    background-color: #f2f2f2;
}


</style>
</head>
<body>
 <h1 style="margin-bottom: 10px;">Bienvenue sur Tool4Cars</h1>

    <label for="client-selector">Choisissez un client :</label>
    <select id="client-selector">
        <option value="clienta">Client A</option>
        <option value="clientb">Client B</option>
        <option value="clientc">Client C</option>
    </select>

    <div id="clientb-controls" style="display:none; margin-top: 10px;">
        <button id="btn-voir-voitures">Voir mes voitures</button>
        <button id="btn-voir-garages">Voir mes garages</button>
            <br><br><br>
    </div>

    <div class="dynamic-div" data-module="cars" data-script="ajax"></div>

    <script src="script.js"></script>

</body>
</html>


