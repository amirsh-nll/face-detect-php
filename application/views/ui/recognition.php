<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>تشخیص چهره جدید</title>

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
    
    <section class="recognition">
        <div class="container ganjname-font blue-color">

            <section>
                <div class="row">
                    <div class="col-md-2 float-right logo text-center">
                        <img src="<?php echo $base; ?>assets/image/logo.png" class="img-fluid" alt="تشخیص چهره" title="تشخیص چهره" />
                        <a href="<?php echo $base; ?>" class="btn btn-primary back">بازگشت</a>
                    </div>
                    <div class="col-md-10 float-left text-right content">
                        <h2>تشخیص چهره جدید</h2>
                        <hr />
                        <?php echo form_open_multipart($base . 'uploading', 'method="post"'); ?>
                            <br />
                            <p>ابتدا یک تصویر را برای شروع عملیات انتخاب کنید:</p>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" />
                                <br />
                                <?php 
                                    echo form_submit(
                                        array(
                                            "name"      =>  "submit",
                                            "value"     =>  "تشخیص چهره",
                                            "class"     =>  "btn btn-primary float-left"
                                        )
                                    );
                                ?>
                                <div class="clearfix"></div>
                            </div>

                            <?php
                            if($recognition==0)
                                echo "<p class='alert alert-danger'>مشکلی در عملیات آپلود رخ داده است.</p>";
                            elseif ($recognition==1)
                                echo "<p class='alert alert-danger'>مشکلی در عملیات تشخیص رخ داده است.</p>";
                            elseif ($recognition==2)
                                echo "<p class='alert alert-danger'>پاسخ مناسبی برای تشخیص این چهره دریافت نشد.</p>";
                            elseif ($recognition==3)
                                echo "<p class='alert alert-danger'>چهره ای یافت نشد.</p>";
                            elseif ($recognition==7)
                                echo "<p class='alert alert-success'>عملیات با موفقیت انجام شد.</p>";

                            if($success_face!==-1)
                            {
                                if($success_face['gender']=="male")
                                    $success_face['gender']="مرد";
                                elseif($success_face['gender']=="female")
                                    $success_face['gender']="زن";
                                else
                                    $success_face['gender']="نامشخص";

                                echo "<p class='alert alert-success'>جنسیت : " . $success_face['gender'] . " - سن : " . $success_face['age'] . "</p>";
                            }

                            
                            ?>
                        <?php echo form_close(); ?>
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