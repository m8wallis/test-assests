<!--  Header  -->
<?php include 'header.php';?>

<!--  Top Copy  -->
<div class="row section-top">
  <div class="col-xs-12 col-sm-10 col-md-9 col-lg-7">
    <h2>Are you ready for your next adventureWQE?<br/>
    We’re always looking for top talent to join our team in sunny San Diego.</h2>
  </div>
</div>

<!--  Green BG Email Sign  -->
<div class="row section-email-signup">
  <div class="col-xs-12 col-md-10 col-lg-8">
    <div class="small-line"></div>
    <h6>Is Grizzly Right for You?</h6>
    <h4>If you'd like to be considered for a position here at Grizzly,<br/> please send us an email using the form below. </h4>
    <form action="action_page.php" class="contact-form">
      <input type="email" name="email" placeholder="email@example.com">
      <input type="image" src="/wp-content/themes/wpbootstrap/bootstrap/img/rt-arrow.png" alt="SUBMIT">
    </form>
  </div>
</div>

<!--  Instagram Carousel  -->
<div class="section-insta">
  <section class="variable slider">
  <?php
    $access_token="2293327.1677ed0.8cd0ed45202d48409213d160eb3d40bd";
    $photo_count=9;
         
    $json_link="https://api.instagram.com/v1/users/self/media/recent/?";
    $json_link.="access_token={$access_token}&count={$photo_count}";

    $json = file_get_contents($json_link);
    $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

    $json = file_get_contents($json_link);
    $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);

    foreach ($obj['data'] as $post) {
         
        $pic_text=$post['caption']['text'];
        $pic_link=$post['link'];
        $pic_like_count=$post['likes']['count'];
        $pic_comment_count=$post['comments']['count'];
        $pic_src=str_replace("http://", "https://", $post['images']['standard_resolution']['url']);
        $pic_created_time=date("F j, Y", $post['caption']['created_time']);
        $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));
         
        echo "<div class='col-md-4 col-sm-6 col-xs-12 item_box'>";        
            echo "<a href='{$pic_link}' target='_blank'>";
                echo "<img class='img-responsive photo-thumb' src='{$pic_src}' alt='{$pic_text}'>";
            echo "</a>";
         
        echo "</div>";
    }
    ?>
  </section>
</div>


<!--  Footer  -->
<?php include 'footer.php';?>
