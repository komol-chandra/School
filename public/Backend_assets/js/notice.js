$(document).ready(function() {
    $(document).on("submit", "#notice_save", function(e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);

        $.ajax({
            url: "/admin/notice/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Notice added successfully", "Success!");
                $("#addModal").modal("hide");
                refreshNoticeCalendar();
                $("#notice_save").trigger("reset");
            },
            error: function(error) {
                console.log(error);
            }
        });
    });

    refreshNoticeCalendar();
});

function showAllNotices() {
    var url = "/admin/notice/create";
    $.ajax({
        type: "GET",
        url: url,
        success: function(response) {
            $(".noticeboard_content").html(response);
            refreshNoticeCalendar();
        }
    });
}

function refreshNoticeCalendar() {
    var url = "/admin/notice/show";

    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function(response) {
            var notice_calendar = [];
            for (let i = 0; i < response.length; i++) {
                let obj;

                obj = {
                    id: response[i].notice_id,
                    title: response[i].notice_title

                    // start: response[i].date,
                    // end: response[i].date
                };
                notice_calendar.push(obj);
            }
            var noticeCalender = [];
            for (let i = 0; i < response.length; i++) {
                let array;
                array = {
                    title: response[i].notice_title
                };
            }
            console.log("blah blah", notice_calendar);
            console.log(response);
            // $("#calendar").fullCalendar({
            //     disableDragging: true,
            //     events: notice_calendar,
            //     displayEventTime: false,
            //     eventClick: function(info) {
            //         rightModal(
            //             "http://ekattor-school-erp.com/demo/v7/modal/popup/noticeboard/edit/" +
            //                 info.id,
            //             "Edit Notice"
            //         );
            //     },
            //     dayClick: function(date) {
            //         addModal("Add New Notice");
            //     }
            // });
        }
    });
}
