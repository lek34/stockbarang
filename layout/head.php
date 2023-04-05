<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="assets/img/favicon.png" rel="icon" crossorigin="anonymous" />
        <title>IMS</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/5475682f31.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <script type="text/javascript">
            var ctx = document.getElementById("bargraph").getContext("2d");
            var mychart = new Chart (ctx,{
                type : 'bar',
                data : {
                    labels:<?php echo json_encode($barangkeluar);?>,
                    datasets: [{
                        backgroundcolor : [
                            "#5969ff",
                            "#5945fd",
                            "#25d5f2",
                            "#2ec551",
                            "#ff044e",
                        ],
                        data : <?php echo json_encode($totalkeluar);?>
                    }]
                },
                options : {
                    legend: {
                        display : true,
                        position: 'bottom',
                        labels : {
                            fontColor: '#71748d',
                            fontFamily : 'Circular Std Bold',
                            fontSize: 14,
                        }
                    },
                }
            });
        </script>
</head>