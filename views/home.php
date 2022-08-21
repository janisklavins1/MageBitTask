<div class="LandingPage">
    <div class="LandingPage-Panel">
        <div class="LandingPage-Panel-TopBar">
            <div class="LandingPage-Panel-TopBar-Left">
                <div><img width="25" height="40" src="img/Pineapple.png" alt="Logo"></div>
                <div><img width="78" height="16" src="img/name.png" alt="Pineapple"></div>
            </div>
            <div class="LandingPage-Panel-TopBar-Right">
                <span>About</span>
                <span>How it works</span>
                <span>Contact</span>
            </div>
        </div>

        <div class="LandingPage-Panel-TextArea">
            <div>
                <div class="LandingPage-Panel-TextArea-Heading">Subscribe to newsletter</div>
                <div class="LandingPage-Panel-TextArea-Content">Subscribe to our newsletter and get 10% discount on pineapple glasses.</div>
            </div>
        </div>
        <form class="LandingPage-Panel-Input-Container" action="" method="post">

            <div class="LandingPage-Panel-Input-Container-Inner">
                <div class="LandingPage-Panel-Input-Box1"></div>
                <div class="LandingPage-Panel-Input-Box">

                    <input placeholder="Type your email address here…" type="email" name="email" class="LandingPage-Panel-Input-Field Form<?php echo $model->hasError('email') ? 'invalid' : '' ?>">
                    <button class="LandingPage-Panel-Input-Submit" type="submit">
                        <i class="fa-solid fa-arrow-right-long"></i>
                    </button>

                </div>
            </div>

            <div><?php echo $model->getFirstError('email') ?></div>
            <div>
                <input type="checkbox" name="checkBox">
                <span>Agree with Terms</span>
                <span><?php echo $model->getFirstError('checkBox') ?></span>
            </div>


        </form>
    </div>

</div>