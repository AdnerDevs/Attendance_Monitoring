$(document).ready(function () {
    const scrollers = document.querySelectorAll(".scroller");
    let employeeAttendanceId = localStorage.getItem('employee_attendance_id');
    let endAttendance = localStorage.getItem('endAttendance');
    let ActivityEmployeeAttendanceId = localStorage.getItem('activity_employee_attendance_id');
    let StoreActivityType = localStorage.getItem('activity_hidden_activity_type');
    let back2 = localStorage.getItem('back2');
    // Set values to the corresponding inputs
    $('#hidden_employee_attendance_id_attendance').val(employeeAttendanceId);
    $('#endAttendance').val(endAttendance);
    $("#hidden_activity_type").val(StoreActivityType);
    $('#hidden_employee_attendance_id').val(ActivityEmployeeAttendanceId);
    $('#back2').val(back2);

    if (!window.matchMedia("(prefers-redueced-motion: reduce)").matches) {
        addAnimation();
    }

    function addAnimation() {
        scrollers.forEach((scroller) => {
            scroller.setAttribute('data-animated', true);

            const scrollerInner = scroller.querySelector('.scroller__inner');

            const scrollerContent = Array.from(scrollerInner.children);

            scrollerContent.forEach(item => {
                const duplicatedItem = item.cloneNode(true);
                duplicatedItem.setAttribute('aria-hidden', true);
                scrollerInner.appendChild(duplicatedItem);

            })
        });
    }

    $("#showHistory").click(function () {

        $('.fa-arrow-up').toggleClass('rotate90');
        getEmployeeData();
    });

    let session_employee_id = $('#session_employee_id').val();
    let session_employee_name = $('#session_employee_name').val();
    let session_department_id = $('#session_department_id').val();
    let session_credential_id = $('#session_credential_id').val();
    // let activity__type;
    let activityy__description;
    let timer;

    let start_time;
    let hidden_employee_attendance_id;

    function startTimer() {

        activity__type = "1";
        activityy__description = "Attendance";
        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                employee_name: session_employee_name,
                department_id: session_department_id,
                credential_id: session_credential_id,
                activity_type: activity__type,
                activity_description: activityy__description
            },
            dataType: 'json',
            success: function (result) {

                if (result.status === 'success') {

                    let dateTimeString1 = result.data.start_time;

                    let date1 = new Date(dateTimeString1);
                    let options = {
                        timeZone: 'Asia/Manila'
                    };
                    let asiaManilaTimeString = date1.toLocaleString('en-US', options);
                    // Save values to localStorage
                    localStorage.setItem('employee_attendance_id', result.data.employee_attendance_id);
                    localStorage.setItem('endAttendance', asiaManilaTimeString);    
                    $('#hidden_employee_attendance_id_attendance').val(result.data.employee_attendance_id);
                    $('#endAttendance').val(asiaManilaTimeString);
                    getEmployeeData();
                } else {
                    alert('Failed to start Attendance');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });


    }

    function startTimerActivity() {
      
        activity__type = $('#activity_type').val();
        activityy__description = $('#activity_description').val();


        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                employee_name: session_employee_name,
                department_id: session_department_id,
                credential_id: session_credential_id,
                activity_type: activity__type,
                activity_description: activityy__description

            },
            dataType: 'json',
            success: function (result) {

                if (result.status === 'success') {

                    let dateTimeString1 = result.data.start_time;

                    let date1 = new Date(dateTimeString1);
                    let options = {
                        timeZone: 'Asia/Manila'
                    };


                    let asiaManilaTimeString = date1.toLocaleString('en-US', options);

                    // Save values to localStorage
                    localStorage.setItem('activity_employee_attendance_id', result.data.employee_attendance_id);
                    localStorage.setItem('activity_hidden_activity_type', result.data.activity_type);
                    localStorage.setItem('back2', asiaManilaTimeString);
                    $("#hidden_activity_type").val(result.data.activity_type);
                    $('#hidden_employee_attendance_id').val(result.data.employee_attendance_id);

                    $('#back2').val(asiaManilaTimeString);
                    getEmployeeData();

                } else {
                    alert('Failed to start Attendance');
                }
             

            },
            error: function (error) {
                console.log(error);
            }
        });

    }

    function getSeconds() {
        start_time = $("#endAttendance").val();
        activity__type = "1";
        hidden_employee_attendance_id = $("#hidden_employee_attendance_id_attendance").val();

        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                total_seconds: start_time,
                activity_type: activity__type,
                employee_attendance_id: hidden_employee_attendance_id
            },
            dataType: 'json',
            success: function (result) {
                if (result.status === 'success') {
                    // alert('Ended Attendance');
                    getEmployeeData();
                } else {
                    alert('Failed to end Attendance');
                }
               
            },
            error: function (error) {
                console.log(error);
            }
        });
        seconds = 0;
        clearInterval(timer);


    }

    function getSecondsAct() {
        start_time = $("#back2").val();
        activity__type = $("#hidden_activity_type").val();
        hidden_employee_attendance_id = $("#hidden_employee_attendance_id").val();

        $.ajax({
            type: 'POST',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id,
                total_seconds: start_time,
                activity_type: activity__type,
                employee_attendance_id: hidden_employee_attendance_id
            },
            dataType: 'json',
            success: function (result) {
                if (result.status === 'success') {
                    $('#activity_description').val('');
                    getEmployeeData();
                } else {
                    alert('Failed to end Attendance');
                }

              
            },
            error: function (error) {
                console.log(error);
            }
        });
        secondsAct = 0;
        clearInterval(timer);

    }

 
    let isActionRunning = false;

    if (localStorage.getItem('isCardFlipped') === 'true') {

        $('.flip-box').addClass('hover');
        $('.box-item').addClass('active');
        $('.box-item1').addClass('active');

    }

    if (localStorage.getItem('isCardFlipped2') === 'true') {

        $('.flip-box2').addClass('hover');
        $('.box-item1').addClass('hover');
        $('.box-item').addClass('click');

    }

    $("#switch").click(function () {
        isActionRunning = true;
        startTimer();
        $('.flip-box').toggleClass('hover');
        $('.header').toggleClass('hover');
        $('.box-item').addClass('active');
        $('.box-item1').addClass('active');
        localStorage.setItem('isCardFlipped', $('.flip-box').hasClass('hover'));

    });


    $("#endAttendance").click(function () {
        isActionRunning = false;
        getSeconds();
        $('.flip-box').removeClass('hover');
        $('.header').removeClass('hover');
        $('.box-item1').removeClass('active');
        $('.box-item').removeClass('active');
        localStorage.setItem('isCardFlipped', $('.flip-box').hasClass('hover'));

    });


    $("#switch2").click(function () {
        isActionRunning = true;

        $('.flip-box2').addClass('hover');
        $('.header').addClass('hover');
        $('.box-item1').addClass('hover');
        $('.box-item').addClass('click');
        localStorage.setItem('isCardFlipped2', $('.flip-box2').hasClass('hover'), $('box-item1').hasClass('hover'));

        startTimerActivity();
  
    });
    $("#back2").click(function () {
        isActionRunning = false;
        $('.flip-box2').removeClass('hover');
        $('.header').removeClass('hover');
        $('.box-item1').removeClass('hover');
        $('.box-item').removeClass('click');
        localStorage.setItem('isCardFlipped2', $('.flip-box2').hasClass('hover'));


        getSecondsAct();
    
    });


    $(window).on('beforeunload', function () {
        if (isActionRunning) {
            return 'You have an action currently running on this page. Are you sure you want to leave?';
        }
    });

    getEmployeeData();

    function getEmployeeData() {
        $.ajax({
            type: 'GET',
            url: 'Controller/AttendanceController.php',
            data: {
                employee_id: session_employee_id
            },
            success: function (result) {
        

                let container = $('#table_body_container_dashboard');
                container.empty();
             
                let num = 1;
                if(result && result.data && result.data.length > 0){

                    for (let i = 0; i < result.data.length; i++) {
                        let row = $("<tr>");
                        let s = moment(result.data[i].end_time).format('YYYY-MM-DD h:mm:ss A');
                        if (result.data[i].end_time === null) {
                            s = 'ongoing';
                        }
                        var formattedDuration = 'ongoing';
                        let totaltime = moment.duration(result.data[i].total_time, 'seconds');

                        if (result.data[i].total_time !== '' && result.data[i].total_time !== null) {
                            // Get days, hours, minutes, and seconds
                            var days = totaltime.days();
                            var hours = totaltime.hours();
                            var minutes = totaltime.minutes();
                            var seconds = totaltime.seconds();
                            formattedDuration = days + " days, " + hours + " hours, " + minutes + " minutes, " + seconds + " seconds";
                        }



                        let startTime = moment(result.data[i].start_time).format('YYYY-MM-DD h:mm:ss A');
                        // displayData(result);
                        let d0 = $("<td>").text(num);
                        let d1 = $("<td>").addClass("display_name").text(result.data[i].employee_name);
                        let d2 = $("<td>").addClass('display_activity_type').text(result.data[i].activity_type);
                        let d3 = $("<td>").addClass('display_start_time').text(startTime);
                        let d4 = $("<td>").addClass('display_start_end_time').text(s);
                        let d5 = $("<td>").addClass('display_start_end_time').text(formattedDuration);

                        row.append(d0);
                        row.append(d1);
                        row.append(d2);
                        row.append(d3);
                        row.append(d4);
                        row.append(d5);
                        container.append(row);
                        num++;
                    }
                }

            },
            erro: function (error) {
                console.log(error);
            }
        });
    }


});