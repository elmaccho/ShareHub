var headers = new Headers();
headers.append("X-CSCAPI-KEY", "TldQQTZuVTc0MndEcnA4N2dPT01hbjRSdDNTeUFzMFVmcGI5T1JkUg==");

var requestOptions = {
   method: 'GET',
   headers: headers,
   redirect: 'follow'
};



fetch("https://api.countrystatecity.in/v1/countries", requestOptions)
.then(response => response.json())
.then(countries => {
    const countryList = document.getElementById('countryList');
    countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country.iso2;
        option.textContent = country.name;
        countryList.appendChild(option);
    });
    
})
.catch(error => console.log('error', error));

const countryList = document.getElementById('countryList');
const stateList = document.getElementById('stateList');
const cityList = document.getElementById('cityList');

countryList.addEventListener('change', function () {
    const selectedCountry = this.value;

    // Clear existing options in state and city dropdowns
    stateList.innerHTML = '<option value="">---</option>';
    cityList.innerHTML = '<option value="">---</option>';

    // If a country is selected, fetch its states
    if (selectedCountry) {
        fetch(`https://api.countrystatecity.in/v1/countries/${selectedCountry}/states`, requestOptions)
            .then(response => response.json())
            .then(states => {
                states.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.iso2; // Use 'name' instead of 'iso2'
                    option.textContent = state.name;
                    stateList.appendChild(option);
                });
            })
            .catch(error => console.log('error', error));
    }
});

stateList.addEventListener('change', function () {
    const selectedState = this.value;

    // Clear existing options in city dropdown
    cityList.innerHTML = '<option value="">---</option>';

    // If a state is selected, fetch its cities
    if (selectedState) {
        fetch(`https://api.countrystatecity.in/v1/countries/${countryList.value}/states/${selectedState}/cities`, requestOptions)
            .then(response => response.json())
            .then(cities => {
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.name; // Use 'name' instead of 'iso2'
                    option.textContent = city.name;
                    cityList.appendChild(option);
                });
            })
            .catch(error => console.log('error', error));
    }
});