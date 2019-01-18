<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>دایرکتوری تشخیص ها</title>

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
    
    <section class="directory">
        <div class="container ganjname-font blue-color">

            <section>
                <div class="row">
                    <div class="col-md-2 float-right logo text-center">
                        <img src="<?php echo $base; ?>assets/image/logo.png" class="img-fluid" alt="تشخیص چهره" title="تشخیص چهره" />
                        <a href="<?php echo $base; ?>" class="btn btn-primary back">بازگشت</a>
                    </div>
                    <div class="col-md-10 float-left text-right content">
                        <h2>دایرکتوری تشخیص ها</h2>
                        <hr />
                            <?php 
                                if($faces===false)
                                    echo "<p class='alert alert-danger'>هیچ چهره ای در سیستم موجود نیست.</p>";
                                else
                                {
                                    $result = "";
                                    foreach ($faces as $face) {
                                        $result = $result . "<div class='face-item float-right d-block'>";
                                        $result = $result . "<div class='face-image'><img width='100' class='img-fluid' src='" . $base . "upload/" . $face['file'] . "' title='چهره ی " . $face['face_id'] . "' alt='چهره ی " . $face['face_id'] . "' /></div>";
                                        $result = $result . "<div class='face-info ganjname-font'>";

                                        if($face['gender']=="male")
                                            $result = $result . "<div class='face-gender'> <span class='fas fa-lg fa-mars'></span> مرد</div>";
                                        elseif($face['gender']=="female")
                                            $result = $result . "<div class='face-gender'> <span class='fas fa-lg fa-venus'></span> زن</div>";
                                        else
                                            $result = $result . "<div class='face-gender'> <span class='fas fa-lg fa-genderless'></span> نامعلوم</div>";

                                        $result = $result . "<div class='face-age'>" . $face['age'] . " سال</div>";
                                        $result = $result . "</div></div>";
                                    }
                                    echo $result . "<div class='clearfix'></div>";
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