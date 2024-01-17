$(document).ready(function () {
    $('form').each(function () {
        var form = $(this);

        form.find('[name="country"]').change(function () {
            var countryId = $(this).val();
            var stateList = form.find('[name="state"]');
            var cityList = form.find('[name="city"]');

            // Pozostała część skryptu pozostaje taka sama

            // Ajax: Pobierz stany dla danego kraju
            $.ajax({
                url: '/admin/get-states',
                type: 'GET',
                data: { country_id: countryId },
                success: function (data) {
                    stateList.empty().append('<option value="">Select State</option>');
                    $.each(data.states, function (key, value) {
                        stateList.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        form.find('[name="state"]').change(function () {
            var stateId = $(this).val();
            var cityList = form.find('[name="city"]');

            // Pozostała część skryptu pozostaje taka sama

            // Ajax: Pobierz miasta dla danego stanu
            $.ajax({
                url: '/admin/get-cities',
                type: 'GET',
                data: { state_id: stateId },
                success: function (data) {
                    cityList.empty().append('<option value="">Select City</option>');
                    $.each(data.cities, function (key, value) {
                        cityList.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
});
