<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>آمار</title>

    <!-- StyleSheet Files -->
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/layout.css">
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/ganjname.css">
    <link rel="stylesheet" href="<?php echo $base; ?>assets/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $base; ?>assets/lib/bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="<?php echo $base; ?>assets/lib/fontawesome/css/fontawesome-all.css">

    <!-- JavaScript Files -->
    <script src="<?php echo $base; ?>assets/lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $base; ?>assets/lib/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo $base; ?>assets/lib/bootstrap/js/bootstrap.bundle.js"></script>

</head>

<body>
    
    <section class="statictics">
        <div class="container ganjname-font blue-color">

            <section>
                <div class="row">
                    <div class="col-md-2 float-right logo text-center">
                        <img src="<?php echo $base; ?>assets/image/logo.png" class="img-fluid" alt="تشخیص چهره" title="تشخیص چهره" />
                        <a href="<?php echo $base; ?>" class="btn btn-primary back">بازگشت</a>
                    </div>
                    <div class="col-md-10 float-left text-right content">
                        <h2>آمار</h2>
                        <hr />
                            <?php 
                                if($faces===false)
                                    echo "<p class='alert alert-danger'>هیچ چهره ای در سیستم موجود نیست.</p>";
                                else
                                {

                                     
                                    $min_age = 0;
                                    $max_age = 0;
                                    $avg_age = 0;
                                    $age_count = 0;
                                    $male_count =0;
                                    $female_count=0;
                                    $other_count=0;
                                    foreach ($faces as $face) {

                                        if($age_count==0)
                                        {
                                            $min_age = $face['age'];
                                            $max_age = $face['age'];
                                            $avg_age = $face['age'];
                                            $age_count++;
                                        }
                                        else
                                        {
                                            if($face['age']> $max_age)
                                            $max_age = $face['age'];

                                            if($face['age']< $min_age)
                                                $min_age = $face['age'];

                                            $avg_age += $face['age'];
                                            $age_count++;
                                        }

                                        if($face['gender']=="male")
                                            $male_count++;
                                        elseif($face['gender']=="female")
                                            $female_count++;
                                        else
                                            $other_count++;
                                    }

                                    $avg_age /= $age_count;
                                    $avg_age = round($avg_age);

                                    # Age Table
                                    echo "<br /><h3>جدول سن</h3><br /><table class='statictics_table' width='100%'> <tr><td>کمترین سن</td><td>" . $min_age . "</td></tr> <tr><td>بیشترین سن</td><td>" . $max_age . "</td></tr> <tr><td>میانگین سنی</td><td>" . $avg_age . "</td></tr> </table><br /><br /><br />";

                                    #Age Chart
                                    echo "<h3>نمودار سن</h3><br />" . $this->chart->draw_chart($min_age, $max_age, $avg_age, "کمترین سن", "بیشترین سن", "میانگین سنی");

                                    # Gender Table
                                    echo "<br /><br /><br /><h3>جدول جنسیت</h3><br /><table class='statictics_table' width='100%'> <tr><td>تعداد مردها</td><td>" . $male_count . "</td></tr> <tr><td>تعداد زن ها</td><td>" . $female_count . "</td></tr> <tr><td>تعداد ناشناس</td><td>" . $other_count . "</td></tr> </table><br /><br /><br />";

                                    #gender Chart
                                    echo "<h3>نمودار جنسیت</h3><br />" . $this->chart->draw_chart($male_count, $female_count, $other_count, "مردها", "زن ها", "متفرقه");
                                    
                                }
                            ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </section>

            <section>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </section>

        </div>
    </section>

</body>

</html>