<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use miloschuman\highcharts\Highcharts;
use yii\helpers\ArrayHelper;
use fedemotta\datatables\DataTables;

$this->title = 'HRD';

$username = '';
if (!Yii::$app->user->isGuest) {
    $username = '<u>' . Html::encode(Yii::$app->user->identity->username) . '</u>';
}
?>

<?php echo Yii::$app->db->open(); ?>
<div class="index">
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="?r=site/index">ระบบบุคลากร</a-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="?r=site/index">หน้าแรก</a>
                    </li>
                    <li>
                        <a href="?r=person/index">เพิ่มบุคลากรใหม่</a>
                    </li>
                    <li>
                        <a href="?r=training/index">ทะเบียนฝึกอบรม</a>
                    </li>
                    <li>
                        <a href="?r=report/index">รายงาน</a>
                    </li>
                    <!--li>
                        <a href="?r=leave/index">ทะเบียนการลา</a>
                    </li-->
                    <li>
                        <a href="?r=site/about">เกี่ยวกับเรา</a>
                    </li>
                    <li>
                        <a href="?r=site/contact">ติดต่อเรา</a>
                    </li>
                    <li>
                        <?=
                        Nav::widget(
                                [
                                    'encodeLabels' => false,
                                    'options' => ['class' => 'sidebar-menu'],
                                    'items' => [
                                        [
                                            'label' => '<center><i class="glyphicon glyphicon-lock"></i><br /><span> เข้าสู่ระบบ</span></center>',
                                            'url' => ['/site/login'],
                                            'visible' => Yii::$app->user->isGuest,
                                        ],
                                        [
                                            'label' => '<center><i class="glyphicon glyphicon-log-in"></i><br /><span> ออกจากระบบ</span></center>',
                                            'url' => ['/site/logout'],
                                            'visible' => !Yii::$app->user->isGuest,
                                            'linkOptions' => ['data-method' => 'post']
                                        ],
                                    ],
                                ]
                        );
                        ?><!--?php echo $username; ?-->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/add-person.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h2><br /></h2>
                        <hr class="small">
                        <span class="subheading1"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- chart1 -->
    <div class="panel-body">
        <div class="col-lg-12"
             <div style="display: none">
                     <?php
                     echo Highcharts::widget([
                         'scripts' => [
                             'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                             'modules/exporting', // adds Exporting button/menu to chart
                         //'themes/grid', // applies global 'grid' theme to all charts
                         //'highcharts-3d',
                         //'modules/drilldown'
                         ]
                     ]);
                     ?>
            </div>
            <div id="chart1">
            </div>

            <?php
            $this->registerJs("$(function () { 
                    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                    },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        });
    
                        $('#chart1').highcharts({
                            chart: {
                            backgroundColor: {
                            linearGradient: [0, 0, 500, 500],
                            stops: [
                                [0, 'rgb(255, 255, 255)'],
                                [1, 'rgb(240, 240, 255)']
                                ]
                            },
                            type: 'column',
                            margin: 75,
                            /*options3d: {   
                                enabled: true,
                                alpha: 10,
                                beta: 15,
                                depth: 70
                            }*/
                            },
                            title: {
                                text: '<b>ตำแหน่ง/จำนวน (ตั้งแต่ 2559)</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    depth: 35,
                                    dataLabels: {
                                        enabled: true,
                                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                        style: {
                                            color:'black'                     
                                        },
                                        connectorColor: 'silver'
                                    }
                                }
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: '<b>จำนวน</b>'
                                },
                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [
                            {
                                name: '<b>ตำแหน่ง</b>',
                                colorByPoint: true,
                                data:$main
                            }
                            ],
                        });
                    });");
            ?>   
        </div>

        <br /><br /><br />


        <div class="col-md-6">
            <!-- pie chart -->
            <div style="display: none">
                <?php
                echo Highcharts::widget([
                    'scripts' => [
                        'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                        'modules/exporting', // adds Exporting button/menu to chart
                    //'themes/grid', // applies global 'grid' theme to all charts
                    //'highcharts-3d',
                    //'modules/drilldown'
                    ]
                ]);
                ?>
            </div>
            <div id="chart6">
            </div>
            <?php
            $title = "<b>ระดับการศึกษา</b>";
            $type1 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'ปริญญาเอก%' AND p.person_status_now = '1'")->queryScalar();
            $type2 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'ปริญญาโท%' AND p.person_status_now = '1'")->queryScalar();
            $type3 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'ปริญญาตรี%' AND p.person_status_now = '1'")->queryScalar();
            $type4 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'อนุปริญญา%' AND p.person_status_now = '1'")->queryScalar();
            $type5 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'มัธยมศึกษาตอนปลาย%' AND p.person_status_now = '1'")->queryScalar();
            $type6 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'มัธยมศึกษาตอนต้น%' AND p.person_status_now = '1'")->queryScalar();
            $type7 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'ปวส%' AND p.person_status_now = '1'")->queryScalar();
            $type8 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'ปวช%' AND p.person_status_now = '1'")->queryScalar();
            $type9 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'กศน%' AND p.person_status_now = '1'")->queryScalar();
            $type10 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'ประถมศึกษา%' AND p.person_status_now = '1'")->queryScalar();
            $type11 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education LIKE 'อื่นๆ%' AND p.person_status_now = '1'")->queryScalar();

            $this->registerJs("$(function () {
                                    $('#chart6').highcharts({
                                        chart: {
                                        backgroundColor: {
                            linearGradient: [0, 0, 500, 500],
                            stops: [
                                [0, 'rgb(255, 255, 255)'],
                                [1, 'rgb(240, 240, 255)']
                                ]
                            },
                                            plotBackgroundColor: null,
                                            plotBorderWidth: null,
                                            plotShadow: false,
                                            type: 'pie'
                                        },
                                        title: {
                                            text: '$title'
                                        },
                                        tooltip: {
                                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                        },
                                        plotOptions: {
                                            pie: {
                                                allowPointSelect: true,
                                                cursor: 'pointer',
                                                depth: 35,
                                                dataLabels: {
                                                    enabled: true,
                                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                                    style: {
                                                        color:'black'                     
                                                    },
                                                    connectorColor: 'silver'
                                                }
                                            }
                                        },
                                        series: [{
                                            type: 'pie',
                                            name: 'ร้อยละ',
                                            data: [
                                            ['ปริญญาเอก',   $type1],
                                            ['ปริญญาโท',   $type2],
                                            ['ปริญญาตรี',   $type3],
                                            ['อนุปริญญา',   $type4],
                                            ['มัธยมศึกษาตอนปลาย',   $type5],
                                            ['มัธยมศึกษาตอนต้น',   $type6],
                                            ['ปวส',   $type7],
                                            ['ปวช',   $type8],
                                            ['กศน',   $type9],
                                            ['ประถมศึกษา',   $type10],
                                            ['อื่นๆ',   $type11],
                                            ]
                                        }]
                                    });
                                });
                                ");
            ?>

        </div>
        <!--- end ---->

        <!-- donut chart -->
        <div class="col-md-6">
            <div style="display: none">
                <?php
                echo Highcharts::widget([
                    'scripts' => [
                        'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                        'modules/exporting', // adds Exporting button/menu to chart
                    //'themes/grid', // applies global 'grid' theme to all charts
                    //'highcharts-3d'
                    //'modules/drilldown'
                    ]
                ]);
                ?>
            </div>
            <div id="pie-donut11">
            </div>
            <?php
            $title = "<b>เชี่ยวชาญเฉพาะด้าน</b>";
            $level1 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'ปริญญาโทการปริหารการพยาบาล' AND p.person_status_now = '1'")->queryScalar();
            $level2 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'ปริญญาโทการพยาบาลครอบครัว' AND p.person_status_now = '1'")->queryScalar();
            $level3 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'ปริญญาโท NIDA บริหารรัฐกิจ' AND p.person_status_now = '1'")->queryScalar();
            $level4 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'ปริญญาโทสาธารณสุขศาสตร์' AND p.person_status_now = '1'")->queryScalar();
            $level5 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'พยาบาลเวชปฏิบัติ' AND p.person_status_now = '1'")->queryScalar();
            $level6 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'IC' AND p.person_status_now = '1'")->queryScalar();
            $level7 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'HD' AND p.person_status_now = '1'")->queryScalar();
            $level8 = Yii::$app->db->createCommand("SELECT COUNT(p.id) as total from person p WHERE p.person_education_professional LIKE 'จิตเวช' AND p.person_status_now = '1'")->queryScalar();

            $this->registerJs("$(function () {

                    $('#pie-donut11').highcharts({
                        chart: {
                        backgroundColor: {
                            linearGradient: [0, 0, 500, 500],
                            stops: [
                                [0, 'rgb(255, 255, 255)'],
                                [1, 'rgb(240, 240, 255)']
                                ]
                            },
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        title: {
                            text: '$title'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                         plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                depth: 35,
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',    //  แสดง %
                                    style: {
                                        color:'black'                     
                                    },
                                    connectorColor: 'silver'
                                },
                                        startAngle: -90,
                                        endAngle: 90,
                                        center: ['50%', '75%']
                            }
                        },
                        /*plotOptions: {
                            pie: {
                                    dataLabels: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        depth: 35,
                                        style: {
                                        color:'black',                 
                                                },
                                            connectorColor: 'silver'
                                            },
                                        startAngle: -90,
                                        endAngle: 90,
                                        center: ['50%', '75%']
                                    }
                            },*/
                            legend: {
                                enabled: true
                            },
                        series: [{
                            type: 'pie',
                            name: 'ร้อยละ',
                             innerSize: '50%',
                            data: [
                                    ['ปริญญาโทการปริหารการพยาบาล',   $level1],
                                    ['ปริญญาโทการพยาบาลครอบครัว',   $level2],
                                        ['ปริญญาโท NIDA บริหารรัฐกิจ',   $level3],
                                            ['ปริญญาโทสาธารณสุขศาสตร์',   $level4],
                                                ['พยาบาลเวชปฏิบัติ',   $level5],
                                                    ['IC',   $level6],
                                                        ['HD',   $level7],
                                                            ['จิตเวช',   $level8],
                            ]
                        }]
                    });
                });
                ");
            ?>
        </div>
        <br /><br /><br />
        <!-- end donut -->


        <!-- chart2 -->
        <div class="col-md-6"> <br /><br /><br /> <br /><br />
            <div style="display: none">
                <?php
                echo Highcharts::widget([
                    'scripts' => [
                        'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                        'modules/exporting', // adds Exporting button/menu to chart
                        //'themes/grid', // applies global 'grid' theme to all charts
                        'highcharts-3d',
                    //'modules/drilldown'
                    ]
                ]);
                ?>
            </div>
            <div id="chart2"></div>

            <?php
            $this->registerJs("$(function () { 
                    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                    },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        });
    
                        $('#chart2').highcharts({
                            colors: [
                                '#8B658B', 
                                //'#50B432', 
                                //'#ED561B', 
                                //'#DDDF00', 
                                //'#24CBE5',
                                ],
                            chart: {
                            backgroundColor: {
                            linearGradient: [0, 0, 500, 500],
                            stops: [
                                [0, 'rgb(255, 255, 255)'],
                                [1, 'rgb(240, 240, 255)']
                                ]
                            },
                            type: 'column',
                            margin: 75,
                            options3d: {   
                                enabled: true,
                                alpha: 10,
                                beta: 15,
                                depth: 70
                            }
                            },
                            title: {
                                style: {
                                    color: '#000',
                                },
                                text: '<b>ประเภท/จำนวน (ตั้งแต่ 2559)</b>'
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: '<b>จำนวน</b>'
                                },
                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [
                            {
                                name: '<b>ประเภท</b>',
                                colorByPoint: true,
                                data:$main2

                            }
                            ],
                        });
                    });");
            ?>   
        </div>
        <!-- end chart2 -->
        <br />



        <!-- chart3 -->
        <div class="col-md-6">
            <br /><br /><br /><br /> <br />
            <div style="display: none">
                <?php
                echo Highcharts::widget([
                    'scripts' => [
                        'highcharts-more', // enables supplementary chart types (gauge, arearange, columnrange, etc.)
                        'modules/exporting', // adds Exporting button/menu to chart
                        //'themes/grid', // applies global 'grid' theme to all charts
                        'highcharts-3d',
                    //'modules/drilldown'
                    ]
                ]);
                ?>
            </div>
            <div id="chart3"></div>

            <?php
            $this->registerJs("$(function () { 
                    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                                return {
                                radialGradient: {
                                    cx: 0.5,
                                    cy: 0.3,
                                    r: 0.7
                                    },
                                stops: [
                                    [0, color],
                                    [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                                ]
                            };
                        });
    
                        $('#chart3').highcharts({
                            colors: [
                                '#FF3030', 
                                //'#50B432', 
                                //'#ED561B', 
                                //'#DDDF00', 
                                //'#24CBE5',
                                ],
                            chart: {
                            backgroundColor: {
                            linearGradient: [0, 0, 500, 500],
                            stops: [
                                [0, 'rgb(255, 255, 255)'],
                                [1, 'rgb(240, 240, 255)']
                                ]
                            },
                            type: 'column',
                            margin: 75,
                            options3d: {   
                                enabled: true,
                                alpha: 10,
                                beta: 15,
                                depth: 70
                            }
                            },
                            title: {
                                style: {
                                    color: '#000',
                                },
                                text: '<b>สถานะ/จำนวน (ตั้งแต่ 2559)</b>'
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: '<b>จำนวน</b>'
                                },
                            },
                            legend: {
                                enabled: true
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },
                            series: [
                            {
                                name: '<b>สถานะ</b>',
                                colorByPoint: true,
                                data:$main3

                            }
                            ],
                        });
                    });");
            ?>   
        </div>

    </div>
    <!-- end chart3 -->





