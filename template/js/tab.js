// script for tab steps
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var href = $(e.target).attr('href');
        var $curr = $(".process-model  a[href='" + href + "']").parent();

        $('.process-model li').removeClass();

        $curr.addClass("active");
        $curr.prevAll().addClass("visited");
    });

var appendStep = ['<div id="step-2">\n' +
        '                    <h5 class="mt-3">Allocation Settings</h5>\n' +
        '\n' +
        '                    <div class="row clearfix">\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="level">Level</label>\n' +
        '                                <select class="form-control" id="level" name="level" required>\n' +
        '                                    <option selected disabled value="">Select Level</option>\n' +
        '                                    <option value="School">School</option>\n' +
        '                                    <option value="College">College</option>\n' +
        '                                </select>\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="exam_year">Standard</label>\n' +
        '                                <select class="form-control" id="exam_year" name="exam_year" required>\n' +
        '                                    <option selected disabled value="">Select Level First</option>\n' +
        '\n' +
        '                                </select>\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="medium">Medium</label>\n' +
        '                                <select class="form-control" id="medium" name="medium" required>\n' +
        '                                    <option selected disabled value="">Select Level</option>\n' +
        '                                    <option value="english">English</option>\n' +
        '                                    <option value="marathi">Marathi</option>\n' +
        '                                </select>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                    <div class="row clearfix">\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="concerned_faculty">Concerned Faculty</label>\n' +
        '                                <select class="form-control" id="concerned_faculty"\n' +
        '                                        name="concerned_faculty" required>\n' +
        '                                    <option value="" selected disabled>Select Faculty</option>\n' +
        '                                    \n' +
        '                                </select>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>',

      '<div id="step-3">\n' +
        '                    <h5 class="mt-3">Exam Structure</h5>\n' +
        '\n' +
        '                    <div class="row clearfix">\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="exam_subject">Select Subject</label>\n' +
        '                                <select class="form-control" id="exam_subject" name="exam_subject" required>\n' +
        '                                    <option selected disabled value="">Select Standard First</option>\n' +
        '\n' +
        '                                </select>\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="exam_complexity">Standard</label>\n' +
        '                                <select class="form-control" id="exam_complexity" name="exam_complexity" required>\n' +
        '                                    <option selected disabled value="">Select Complexity</option>\n' +
        '                                    <option value="1">Easy</option>\n' +
        '                                    <option value="2">Moderate</option>\n' +
        '                                    <option value="3">Difficult</option>\n' +
        '                                    <option value="4">All</option>\n' +
        '\n' +
        '\n' +
        '                                </select>\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="medium">Medium</label>\n' +
        '                                <select class="form-control" id="medium" name="medium" required>\n' +
        '                                    <option selected disabled value="">Select Level</option>\n' +
        '                                    <option value="english">English</option>\n' +
        '                                    <option value="marathi">Marathi</option>\n' +
        '                                </select>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '\n' +
        '                </div>',


     '<div id="step-4">\n' +
        '                    <h5 class="mt-3">Exam Scheduling</h5>\n' +
        '                    <div class="row clearfix">\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="exam_date">Date</label>\n' +
        '                                <input autocomplete="off" type="text" class="form-control"\n' +
        '                                       id="exam_date" autocomplete="off" placeholder="Exam Date" name="exam_date"\n' +
        '                                       required>\n' +
        '\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <label for="start_time">Exam Time</label>\n' +
        '\n' +
        '                            <div class="form-group form-inline">\n' +
        '\n' +
        '                                <input type="text" autocomplete="off" placeholder="Start Time"\n' +
        '                                       class="form-control datetimepicker-input" id="start_time" name="start_time"\n' +
        '                                       data-toggle="datetimepicker" data-target="#start_time">\n' +
        '\n' +
        '                                <input type="text" autocomplete="off" placeholder="End Time"\n' +
        '                                       class="form-control datetimepicker-input mt-1 mt-xl-0" id="end_time"\n' +
        '                                       name="end_time" data-toggle="datetimepicker" data-target="#end_time">\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '\n' +
        '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
        '                            <div class="form-group">\n' +
        '                                <label for="exam_duration">Duration</label>\n' +
        '                                <input type="text" class="form-control" id="exam_duration" name="exam_duration"\n' +
        '                                       placeholder="Duration in Mins." readonly>\n' +
        '\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>'];

var nextBtn = '\n' +
    '                    <div class="mt-3 row clearfix" id="next-btn">\n' +
    '                        <div class="col-lg-3 col-md-6 col-sm-12">\n' +
    '                            <div class="form-group">\n' +
    '                                <button type="submit" id="next-step" class="mt-2 btn btn-success"><i\n' +
    '                                            class="ik ik-arrow-right"></i>Next\n' +
    '                                </button>\n' +
    '\n' +
    '                            </div>\n' +
    '                        </div>\n' +
    '                    </div>';