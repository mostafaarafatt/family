$((function (e) {
    (a = $("#example").DataTable({
        lengthChange: !0,
        buttons: ["copy",
            "excel",
            "pdf",
            "colvis"],
        language: {
            searchPlaceholder: "Search...",
            scrollX: "100%",
            sSearch: "",
            lengthMenu: "_MENU_ "
        }
    })).buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)"),
        $("#example1").DataTable({
            language: {
                searchPlaceholder: "Search...",
                scrollX: "100%",
                sSearch: "",
                lengthMenu: "_MENU_"
            }
        }),
        $("#example2").DataTable({
            language: {
                searchPlaceholder: "Search...",
                scrollX: "100%",
                sSearch: "",
                lengthMenu: "_MENU_"
            }
        }),
        $("#Invoicedatatable").DataTable({
            language: {
                searchPlaceholder: "Search...",
                scrollX: "100%",
                sSearch: "",
                lengthMenu: "_MENU_"
            }
        }); var a = $("#delete-datatable").DataTable({
            language: {
                searchPlaceholder: "Search...",
                sSearch: ""
            }
        }); $("#delete-datatable tbody").on("click",
            "tr",
            (function () {
                $(this).hasClass("selected") ? $(this).removeClass("selected") : (a.$("tr.selected").removeClass("selected"),
                    $(this).addClass("selected"))
            })),
            $("#button").click((function () {
                a.row(".selected").remove().draw(!1)
            })),
            $("#example-1").DataTable({
                language: {
                    sProcessing: "جارٍ التحميل...",
                    sLengthMenu: "أظهر _MENU_ مدخلات",
                    sZeroRecords: "لم يعثر على أية سجلات",
                    sInfo: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    sInfoEmpty: "يعرض 0 إلى 0 من أصل 0 سجل",
                    sInfoFiltered: "(منتقاة من مجموع _MAX_ مُدخل)",
                    sInfoPostFix: "",
                    sSearch: "ابحث:",
                    sUrl: "",
                    oPaginate : {
                        sFirst: "الأول",
                        sPrevious: "السابق",
                        sNext: "التالي",
                        sLast: "الأخير"
                    }
                }
            })
}));