<!-- <?php
    $query = ";";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error on Retrieve Question Analytic Data: " . mysqli_error($connection));}
    $count = mysqli_affected_rows($connection);
    if ($count > 0) {
        echo "Print bar here";
    } else {
        echo "Error Error Error Error Error";
    }

?> -->


<!-- Get question
SELECT question_ID AS quesID, question AS ques FROM questionBank WHERE course_ID = "";

Get correct answer
SELECT * FROM questionCorrectAnswer WHERE question_ID ="";

Get option answer
SELECT * FROM questionOptionList WHERE question_ID ="";

Get correct response
SELECT COUNT(response_ID) FROM studentQuestionResponse WHERE question_ID ="" AND answer ="correct answer";

Get option1 response
SELECT COUNT(response_ID) FROM studentQuestionResponse WHERE question_ID ="" AND answer ="option ans";

Get option2 response
SELECT COUNT(response_ID) FROM studentQuestionResponse WHERE question_ID ="" AND answer ="option ans";

Get option3 response
SELECT COUNT(response_ID) FROM studentQuestionResponse WHERE question_ID ="" AND answer ="option ans";

Get option4 response
SELECT COUNT(response_ID) FROM studentQuestionResponse WHERE question_ID ="" AND answer ="option ans"; -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Analytics</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        #viewAnalytic {
            margin: auto;
            width: 1000px;
        }
        #analyticPage {
            margin: auto;
        }
        .barAnalytic {
            /* margin: auto; */
            box-shadow: 0px 5px 10px grey;
            padding: 20px;
            /* margin: 10px; */
            border-radius: 10px;
        }
        .barChart {
            width:100%;
            max-width:800px;
            height:200px;
            margin:0 auto;
        }
        .quizQ {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div id="viewAnalytic">
        <h2>Question Analytics</h2>
        <h3>Quiz Name</h3>
        <hr>
        <div id="analyticPage">
            <div class="quizQ">
                <h4>Question Number</h4>
                <div class="barAnalytic">
                    <canvas id="barChart" style="width:100%;max-width:800px;height:200px;margin:0 auto;"></canvas>
                    <script>
                        var options = ["Option 1", "Option 2", "Option 3", "Option 4"];
                        var attempts = [8, 5, 2, 0];
                        var barColors = ["rgb(3, 225, 20)", "red","red","red"];
                        new Chart("barChart", {
                            type: "bar",
                            data: {
                                labels: options,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: attempts
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "10 Attempts"
                                },
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            display: false
                                        }
                                    }],
                                    yAxes: [{
                                        gridLines: {
                                            display: false
                                        },
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="quizQ">
                <h4>Question Number</h4>
                <div class="barAnalytic">
                    <canvas id="barChart2" style="width:100%;max-width:800px;height:200px;margin:0 auto;"></canvas>
                    <script>
                        var options = ["Option 1", "Option 2", "Option 3", "Option 4"];
                        var attempts = [4, 8, 3, 2];
                        var barColors = ["red", "rgb(3, 225, 20)","red","red"];
                        new Chart("barChart2", {
                            type: "bar",
                            data: {
                                labels: options,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: attempts
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "10 Attempts"
                                },
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            display: false
                                        }
                                    }],
                                    yAxes: [{
                                        gridLines: {
                                            display: false
                                        },
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="quizQ">
                <h4>Question Number</h4>
                <div class="barAnalytic">
                    <canvas id="barChart3" style="width:100%;max-width:800px;height:200px;margin:0 auto;"></canvas>
                    <script>
                        var options = ["Option 1", "Option 2", "Option 3", "Option 4"];
                        var attempts = [4, 8, 3, 2];
                        var barColors = ["red", "rgb(3, 225, 20)","red","red"];
                        new Chart("barChart3", {
                            type: "bar",
                            data: {
                                labels: options,
                                datasets: [{
                                    backgroundColor: barColors,
                                    data: attempts
                                }]
                            },
                            options: {
                                legend: {display: false},
                                title: {
                                    display: true,
                                    text: "10 Attempts"
                                },
                                scales: {
                                    xAxes: [{
                                        gridLines: {
                                            display: false
                                        }
                                    }],
                                    yAxes: [{
                                        gridLines: {
                                            display: false
                                        },
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>