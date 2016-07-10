<div class="travelo-box contact-box">
    <h4>Need {{$settings->site_name}} Help?</h4>
    <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
    <address class="contact-details">
        <?php $phone_numbers = explode(',', $settings->phone_no) ?>
        <span class="contact-phone"><i class="soap-icon-phone"></i>{{$phone_numbers[0]}} </span><br/>
        <br>
        <a class="contact-email" href="#">{{$settings->admin_email}}</a>
    </address>
</div>
