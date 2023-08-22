<script>
    $(document).on('click', ".btn-connect", function () {
        $('#connect-services').select2({
            placeholder: "Select service"
        });
        let url = $(this).data("url")
        let services = $(this).data("services")
        let element = $("#connect-services");
        element.empty();
        element.append(' <option value=""> --Choose--</option>');
        $.each(services, function (index, value) {
            element.append(' <option value="' + value.id + '">' + value.name + '</option>');
        });
        $('#request-connection-form').attr("action", url);
    });

</script>
