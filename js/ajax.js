jQuery(document).ready(function ($) {
    const article = document.querySelector("article.card");
    if (article) {
        const articleDrawer = document.createElement("div");
        const contentWrapper = document.getElementById("et-main-area");

        articleDrawer.classList.add("drawer");
        articleDrawer.classList.add("closed");
        contentWrapper.appendChild(articleDrawer);
    }
    body = document.body;

    $("article.card").on("click", function (e) {
        $(".old-title").text($("title").text());
        $(".old-url").attr("data-link", window.location.href);
        e.preventDefault();

        var postId = $(this).attr("data-id");
        var url = $(this).find("a").attr("href");

        var ajaxDataa = {
            action: "load_post_content",
            post_id: postId,
        };
        $(".newsPost-content").html(
            '<span class="popup_content-loading"></span>'
        );
        $(".newsPost.modal").show();
        body.classList.add("noscroll", false);

        $.ajax({
            url: ajaxData.ajaxurl,
            type: "POST",
            data: ajaxDataa,

            // On success, display the drawer
            success: function (response) {
                const parser = new DOMParser();
                const doc = parser.parseFromString(response, "text/html");
                $(".newsPost-content").html(response);
                window.history.pushState(null, null, url);
                document.title = $(doc).find(".single-post__title").text();

                hideEmptyParagraphs(".single-post__content p");
            },

            // On error, log the response
            error: function (response) {
                console.log(response);
            },
        });
    });

    $(".modal-content .single-post__close-icon").on("click", function (e) {
        $(".newsPost.modal").hide();

        $("title").text($(".old-title").text());
        window.history.pushState(null, null, $(".old-url").attr("data-link"));
        body.classList.remove("noscroll", false);
    });
});
