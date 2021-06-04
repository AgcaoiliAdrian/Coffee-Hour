<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='login.php';
	</script>
	<?php
}
?>  
<section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row reserve">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6">RESERVATION</h2>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <form id="reserve-form" action="#" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" id="name" name="name" placeholder="Your Full Name*">
                                        <input type="email" id="email" name="email" placeholder="Email*">
										<input type="email" id="mobile" name="mobile" placeholder="Mobile*" min="11">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <input type="date" id="date" name="date">
										<input type="time" id="time" name="time">
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="button" onclick="send_reserve()" class="fv-btn">Submit</button>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>

<?php require('footer.php')?>