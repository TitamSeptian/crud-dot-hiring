$(".close-alert").click(function (e) {
    $(this).parent().fadeOut();
});
$(document).ready(function () {
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let target = event.dataset.target;
            console.log(target);
            let preview = document.getElementById(target);
            preview.src = src;
            preview.classList.remove("hidden");
        }
    }
});
// $.ajaxSetup({
//     headers: {
//         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//     },
// });
// $("body").on("click", ".btn-delete", function (e) {
//     e.preventDefault();
//     var url = $(this).attr("href");
//     if (confirm("tag akan dihapus secara permanen, apakah anda yakin?")) {
//         $.ajax({
//             url: url,
//             type: "POST",
//             data: {
//                 _method: "DELETE",
//             },
//             success: function (data) {
//                 alert(data.message);
//             },
//         });
//     }
// });
