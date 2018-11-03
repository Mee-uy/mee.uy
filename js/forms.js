$(document).ready(function() {

    // Regular login
    $("#login_regular").submit(function(e) {

        var form = $(this);
        var url = form.attr("action");

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var obj = JSON.parse(data);

                // Reload page if OK, otherwise show error
                if (obj.status == 0)
                {
                    location.reload();
                }
                else
                {
                    // alerta acá
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        e.preventDefault();
    });

    // Mobile login
    $("#login_mobile").submit(function(e) {

        var form = $(this);
        var url = form.attr("action");

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var obj = JSON.parse(data);

                // Reload page if OK, otherwise show error
                if (obj.status == 0)
                {
                    location.reload();
                }
                else
                {
                    // alerta acá
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

        e.preventDefault();
    });

});