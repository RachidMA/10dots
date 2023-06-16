// import "./bootstrap";

//RACHID: ADD API TO FETCH CITIES OF A SPECIFIC COUNTRY
// const fetch = require("node-fetch");
//TO FETCH ALL CITIES OF A COUNTRY WE NEED COUNTRY CCA2 CODE
async function getCountryCode(countryName) {
    const countriesUrl = "https://restcountries.com/v3.1/name/";
    const response = await fetch(countriesUrl + countryName);
    const data = await response.json();

    if (data && Array.isArray(data) && data.length > 0) {
        return data[0].cca2;
    } else {
        throw new Error("Country not found");
    }
}

//AND WE NEED THAT CODE TO FETCH CITIES
async function get_cities(countryName) {
    const countryCode = await getCountryCode(countryName);

    const overpass_url = "http://overpass-api.de/api/interpreter";
    const overpass_query = `
    [out:json];
    area["ISO3166-1"="${countryCode}"]->.country;
    node["place"="city"](area.country);
    out;
  `;
    const params = new URLSearchParams({ data: overpass_query });
    const response = await fetch(overpass_url + "?" + params.toString());

    const data = await response.json();
    //display message if the is no result for a country
    if (data.elements.length == 0) {
        console.log("No cities found for the country: ", countryName);
    } else {
        const cities = [];
        for (const element of data["elements"]) {
            if ("tags" in element) {
                const name = element["tags"]["name"];
                if (name) {
                    cities.push(name);
                }
            }
        }
        return cities;
    }
}

//LET GET THE COUNTRIES CITIES TAG ELEMENT
const country = document.querySelector("#country");
const city = document.querySelector("#city");

//ADD ONCHANE EVENT LISTNER ON COUNTRY OPTIONS
if (country) {
    country.addEventListener("change", async () => {
        //FETCH ALL CITIES FOR THE SELECTED COUNTRY
        const selected_country = country.value;

        //FETCH ONLY IF THERE IS COUNTRY NAME AS VALUE (PROVENT ERROR IF USER CLICKS ON THIS TAG: <option value="">Select Country</option>)
        if (!selected_country == "") {
            // const selected_country = "United States Of America";
            const cities = await get_cities(selected_country);
            // Sort cities alphabetically
            cities.sort();

            // Sort cities alphabetically

            // Now cities are sorted alphabetically
            console.log(cities);
            if (!cities) {
                city.innerHTML = "No cities found";
            }
            //this line will make sure to set the option to default message
            ////and clear the previous entry
            // TODO: ORDER THE CITIES LIST alphabetically
            $("#city").html('<option value="">select city</option>');
            //Diplay the results comming from API REQUEST
            $.each(cities, function (key, city) {
                $("#city").append(
                    '<option value="' + city + '">' + city + "</option>"
                );
            });
        }
    });
}
// =============FETCHING CITIES API END===================
//======================RACHID:PRICE SLIDER
document.addEventListener("DOMContentLoaded", function () {
    const rangeInput = document.querySelectorAll(".range-input input");
    const priceInput = document.querySelectorAll(".price-input input");
    const range = document.querySelector(".slider .progress");
    const priceGap = 20;

    priceInput.forEach(function (input) {
        input.addEventListener("input", function (e) {
            let minPrice = parseInt(priceInput[0].value);
            let maxPrice = parseInt(priceInput[1].value);

            if (
                maxPrice - minPrice >= priceGap &&
                maxPrice <= rangeInput[1].max
            ) {
                if (e.target.classList.contains("input-min")) {
                    rangeInput[0].value = minPrice;
                    range.style.left =
                        (minPrice / rangeInput[0].max) * 100 + "%";
                } else {
                    rangeInput[1].value = maxPrice;
                    range.style.right =
                        100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                }
            }
            // Update the input values
            document.querySelector(".input-min").value = minPrice;
            document.querySelector(".input-max").value = maxPrice;
        });
    });

    rangeInput.forEach(function (input) {
        input.addEventListener("input", function (e) {
            let minVal = parseInt(rangeInput[0].value);
            let maxVal = parseInt(rangeInput[1].value);

            if (maxVal - minVal < priceGap) {
                if (e.target.classList.contains("range-min")) {
                    rangeInput[0].value = maxVal - priceGap;
                } else {
                    rangeInput[1].value = minVal + priceGap;
                }
            } else {
                priceInput[0].value = minVal;
                priceInput[1].value = maxVal;
                range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                range.style.right =
                    100 - (maxVal / rangeInput[1].max) * 100 + "%";
            }
            // Update the input values
            document.querySelector(".input-min").value = minVal;
            document.querySelector(".input-max").value = maxVal;
        });
    });
});

// #submit display block when the image is uploaded
const submitButton = document.querySelector("#submit");
const inputFile = document.querySelector("#file-upload");

//RACHID:I HAD TO ADD THIS CONDITION HERE FOR OTHERS. BECAUSE OTHER PAGES
//DO NOT HAVE THESE ELEMENTS AND IT RAISES ERROR
if (inputFile) {
    inputFile.addEventListener("change", () => {
        submitButton.classList.toggle("show");
    });
}

// ADA: SCRIPT FOR REVIEW FORM TO POP IN MIDDLE ///

// Get the reviewButton element
var reviewButton = document.querySelector(".reviewButton");

// Get the reviewFormContainer element
var reviewFormContainer = document.getElementById("reviewFormContainer");

// RACHID:ADD CLOSE BUTTON WHEN CLICKED IT CLOSES LEAVE REVIEW FORM
const closeButton = document.querySelector(".close-button");

if (closeButton) {
    closeButton.addEventListener("click", () => {
        reviewFormContainer.style.display = "none";
    });
}

if (reviewButton) {
    // Add event listener to the reviewButton
    reviewButton.addEventListener("click", function () {
        // Display the review form
        reviewFormContainer.style.display = "block";

        // Center the form on the screen
        centerReviewForm();
    });
}

// Function to center the review form on the screen
function centerReviewForm() {
    // Calculate the top and left positions to center the form
    var windowHeight = window.innerHeight;
    var windowWidth = window.innerWidth;
    var formHeight = reviewFormContainer.offsetHeight;
    var formWidth = reviewFormContainer.offsetWidth;
    var topPosition = (windowHeight - formHeight) / 2;
    var leftPosition = (windowWidth - formWidth) / 2;

    // Apply the calculated positions to the form
    reviewFormContainer.style.top = topPosition + "px";
    reviewFormContainer.style.left = leftPosition + "px";
}

// ADA: END SCRIPT FOR REVIEW FORM TO POP IN MIDDLE ///
// RACHID:SPAM BOX AND BUTTONS
// Get the modal element
var modal = document.getElementById("reportModal");

// Get the button that opens the modal
var reportButton = document.getElementById("reportButton");

// Get the <span> element that closes the modal
var closeModal = document.getElementById("closeModal");

// Get the cancel button inside the modal
var cancelButton = document.getElementById("cancelButton");

// Get the confirm button inside the modal
var confirmButton = document.getElementById("confirmButton");

if (reportButton) {
    // When the user clicks on the button, open the modal
    reportButton.addEventListener("click", function () {
        modal.style.display = "block";
    });
}

if (closeModal) {
    // When the user clicks on <span> (x), close the modal
    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });
}

if (cancelButton) {
    // When the user clicks on the cancel button, close the modal
    cancelButton.addEventListener("click", function () {
        modal.style.display = "none";
    });
}

if (confirmButton) {
    // When the user clicks on the confirm button, perform the action
    confirmButton.addEventListener("click", function () {
        // Perform the action here (e.g., submit form or make AJAX request)
        // You can add your logic to add one to spams table

        modal.style.display = "none";
    });
}

// =============================
// RACHID:ADD FUNCTION TO CLOSE ERROR AND SUCCESS MESSAGE WINDOW

var successMessage = document.querySelector("#successMessage");
var errorMessage = document.querySelector("#errorMessage");

var successButton = document.querySelector(".close-success");
var errorButton = document.querySelector(".close-error");

if (successButton) {
    successButton.addEventListener("click", () => {
        successMessage.style.display = "none";
    });
}

if (errorButton) {
    errorButton.addEventListener("click", () => {
        errorMessage.style.display = "none";
    });
}

function closeMessage(element) {
    element.style.display = "none";
}

//SUCCESS MESSAGE BOX
const alert_box = document.querySelector("#alert-message");
const ok_button = document.querySelector(".success-ok");

ok_button.addEventListener("click", () => {
    alert_box.classList.add("hide");
});
