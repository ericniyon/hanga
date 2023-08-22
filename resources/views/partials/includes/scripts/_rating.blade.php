<script>
    let rating = 0;


    function buildRating() {
        let iconsDiv = $(".rating-icons");
        iconsDiv.empty();

        $("#rating-button").prop("disabled", rating <= 0);
        $("[name=rating]").val(rating);
        [1, 2, 3, 4, 5].forEach(function (v) {
            let icon = document.createElement("span");
            icon.className = rating >= v ? "bi bi-star-fill text-primary mr-3" : "bi bi-star mr-3";
            icon.style.fontSize = "30px";
            icon.style.cursor = "pointer";
            icon.onclick = function () {
                rating = v;
                buildRating();
            }
            iconsDiv.append(icon);
        })
    };

    $(document).on('click', '.btn-open-rating', function (e) {
        rating = $(this).data('rating');
        $("#post-rating-form").attr("action", $(this).data('url')).find("#comment").val($(this).data('comment'));
        $("#ratingModal").modal('show');


    });

    $('#ratingModal').on('show.bs.modal', function (event) {

        buildRating();
    });

</script>
