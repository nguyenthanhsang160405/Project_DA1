<?php
print_r($data); 
    if(isset($data) && !empty($data)){
        if(isset($data['ifm']) && !empty($data['ifm'])){
            $ifm = $data['ifm'];
        }
        if(isset($data['err']) && !empty($data['err'])){
            $err = $data['err'];
        }
        if(isset($data[' notification']) && !empty($data[' notification'])){
            $notification = $data[' notification'];
        }
       
    }
?>
<div class="img-title">
        <div class="overlay"></div>
        <h2>LIÊN HỆ</h2>
    </div>
    
    <div class="contact-container">
        <div class="contact-info">
            <h2>LIÊN HỆ</h2>
            <p><i class="fa-solid fa-phone"></i> Hotline: 0363599809</p>
            <p>🏠 Số 81A Phố Huế, Ngô Thì Nhậm, Hai Bà Trưng, Hà Nội</p>
            <p>✉️ nghithps40419@gmail.com</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.444162391639!2d106.62348197480605!3d10.853782889299708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b6c59ba4c97%3A0x535e784068f1558b!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1731060532397!5m2!1svi!2s" 
            width="400" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          
        </div>
        <div class="gird-form">
            <form action="index.php?page=contact" method="post" class="contact-form">
                <label for="name">Họ và Tên:</label><span><?php if(isset($err['err_name']) && !empty($err['err_name'])) echo $err['err_name']?></span>
                <input type="text" id="name" name="name" value="<?php if(isset($ifm['name']) && !empty($ifm['name'])) echo $ifm['name']?>" placeholder="Họ và Tên*" required>

                <label for="email">Gmail:</label><span><?php if(isset($err['err_email']) && !empty($err['err_email'])) echo $err['err_email']?></span>
                <input type="email" id="email" name="email" value="<?php if(isset($ifm['email']) && !empty($ifm['email'])) echo $ifm['email']?>" placeholder="Email*" required>

                <label for="phone">Số Điện Thoại:</label><span><?php if(isset($err['err_phone']) && !empty($err['err_phone'])) echo $err['err_phone']?></span>
                <input type="tel" id="phone" value="<?php if(isset($ifm['phone']) && !empty($ifm['phone'])) echo $ifm['phone']?>" name="phone" placeholder="Số điện thoại*" required>

                <label for="message">Nội Dung:</label><span><?php if(isset($err['err_content']) && !empty($err['err_content'])) echo $err['err_content']?></span>
                <textarea id="message" name="message"  placeholder="Nội dung*" required><?php if(isset($ifm['content']) && !empty($ifm['content'])) echo $ifm['content']?></textarea>

                <input type="submit" name="submit-btn" class="submit-btn" value="Gửi">
                <span><?php if(isset($notification) && !empty($notification)) echo $notification  ?></span>
            </form>
           
        </div>
    </div>