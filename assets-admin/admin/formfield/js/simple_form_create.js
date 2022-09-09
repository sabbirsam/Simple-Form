jQuery(document).ready(function($) {
    "use strict";
    var $fbPages = $(document.getElementById("form-builder-pages"));
    var addPageTab = document.getElementById("add-page-tab");
    var fbInstances = [];

    $fbPages.tabs({
        beforeActivate: function(event, ui) {
            if (ui.newPanel.selector === "#new-page") {
                return false;
            }
        }
    });
    addPageTab.addEventListener(
        "click",
        (click) => {
            const tabCount = document.getElementById("tabs").children.length;
            const tabId = "page-" + tabCount.toString();
            const $newPageTemplate = document.getElementById("new-page");
            const $newTabTemplate = document.getElementById("add-page-tab");
            const $newPage = $newPageTemplate.cloneNode(true);
            $newPage.setAttribute("id", tabId);
            $newPage.classList.add("fb-editor");
            const $newTab = $newTabTemplate.cloneNode(true);
            $newTab.removeAttribute("id");
            const $tabLink = $newTab.querySelector("a");
            $tabLink.setAttribute("href", "#" + tabId);
            $tabLink.innerText = "Page " + tabCount;

            $newPageTemplate.parentElement.insertBefore($newPage, $newPageTemplate);
            $newTabTemplate.parentElement.insertBefore($newTab, $newTabTemplate);
            $fbPages.tabs("refresh");
            $fbPages.tabs("option", "active", tabCount - 1);
            fbInstances.push($($newPage).formBuilder());
        },
        false
    );
    fbInstances.push($(".fb-editor").formBuilder()); // this one for create new one

    document.getElementById("saveData").addEventListener("click", () => {
        Swal.fire({
            text: "Please confirm below!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save!'
        }).then((result) => {
            if (result.isConfirmed) {

                const allData = fbInstances.map((fb) => {
                    var result = fb.actions.getData();
                    return result;
                });
                var data = {
                    result: allData,
                    action: "simple_message_form_submission",
                    form_field: $("#form_name").val(),
                };
                $.ajax({
                    url: simple_message_form_submission.ajaxurl, 
                    // url: qbf.ajaxurl, 
                    data: data,
                    type: "post",
                    success: function() {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your Form has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        location.href ='admin.php?page=form_data';

                    }
                })
            }
        });

    });

});

