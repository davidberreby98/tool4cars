function getCookie(name) {
    let value = `; ${document.cookie}`;
    let parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
    return null;
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + d.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function loadModule(client, module, script = "ajax", params = {}) {
    const urlParams = new URLSearchParams(params).toString();
    const fullUrl = `customs/${client}/modules/${module}/${script}.php${urlParams ? '?' + urlParams : ''}`;

    $(".dynamic-div").data("module", module).data("script", script);

    $.ajax({
        url: fullUrl,
        success: function (response) {
            $(".dynamic-div").html(response);
        },
        error: function () {
            $(".dynamic-div").html("<p>Erreur lors du chargement.</p>");
        }
    });
}

function handleClientView(client) {
    if (client === "clientb") {
        $("#clientb-controls").show();
        $(".dynamic-div").empty(); 
    } else {
        $("#clientb-controls").hide();
        loadModule(client, "cars");
    }
}

$(document).ready(function () {
    const currentClient = getCookie("client");
    if (currentClient) {
        $("#client-selector").val(currentClient);
        handleClientView(currentClient);
    }

    $("#client-selector").on("change", function () {
        const selectedClient = $(this).val();
        setCookie("client", selectedClient, 7);
        handleClientView(selectedClient);
    });

    $("#btn-voir-voitures").on("click", function () {
        const client = getCookie("client");
        loadModule(client, "cars");
    });

    $("#btn-voir-garages").on("click", function () {
        const client = getCookie("client");
        loadModule(client, "garages");
    });
});

$(document).on("click", ".car-row", function () {
    const carId = $(this).data("car-id");
    const client = getCookie("client");
console.log("voiture");
    if (!client || !carId) return;

    loadModule(client, "cars", "edit", { id: carId });
});

$(document).on("click", ".garage-row", function () {
    const garageId = $(this).data("garage-id");
    const client = getCookie("client");

    if (!client || !garageId) return;
    console.log("garage");

    loadModule(client, "garages", "edit", { id: garageId });
});

$(document).on("click", "#backToList", function () {
    const client = getCookie("client");
    const module = $(".dynamic-div").data("module");

    if (!client || !module) return;

    loadModule(client, module);
});
