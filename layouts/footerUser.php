        <!-- Begin :  Footer -->
        <footer class="footer">
            <div class="sub-banner">
                <img src="./assets/image/sub-banner.png" alt="Sub Banner">
            </div>
            <div class="infoFooter">
                <div class="contact-phone">
                    <h4>CALL TO PURCHASE ( 08:30-22:00 )</h4>
                    <div class="infoContent">
                        <span class="iconFooter">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="titleHotline">
                            0982022969
                        </span>
                        <span class="moreInfoFooter">
                            Every day of the week
                        </span>
                    </div>
                </div>
                <!-- end phone 1 -->
                <div class="contact-phone">
                    <h4>COMMENTS, COMPLAINTS ( 08:30-22:00 )</h4>
                    <div class="infoContent">
                        <span class="iconFooter">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span class="titleHotline">
                            0915988888
                        </span>
                        <span class="moreInfoFooter">
                            Every day of the week
                        </span>
                    </div>
                </div>
                <!-- end phone 2 -->
                <div class="form-email">
                    <h4>SIGN UP FOR NEW INFORMATION</h4>
                    <div class="register">
                        <input type="text" class="input_regBot" placeholder="Enter your email here...">
                        <button class="btn__register" type="button">REGISTER</button>
                    </div>
                </div>
                <!-- form-email -->
                <div class="follow-us">
                    <h4>FOLLOW US</h4>
                    <div class="icon-social">
                        <ul class="navbar-social">
                            <li class="social">
                                <a href="https://www.facebook.com/Krik.vn/" class="navbar-icon__links"><span><i class="fa-brands fa-facebook"></i></span></i></a>
                            </li>
                            <li class="social">
                                <a href="https://www.instagram.com/krik_vn/" class="navbar-icon__links"><span><i
                                            class="fab fa-instagram"></i></span></i></a>
                            </li>
                            <li class="social">
                                <a href="https://shopee.vn/krik.vn?utm_campaign=&utm_content=sellervn-200790122&utm_medium=affiliates&utm_source=an_17171860000" class="navbar-icon__links"><span><i class="fa-brands fa-shopify"></i></span></i></a>
                            </li>
                            <li class="social">
                                <a href="#" class="navbar-icon__links"><span><i
                                            class="fab fa-twitter"></i></span></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end follow us -->
            </div>
            <!-- Contact -->
            <!-- Begin : footerBottom  -->
            <div class="footerBottom">
                <div class="policies">
                    <h5>POLICIES & REGULATIONS</h5>
                    <ul class="policise-item">
                        <li><a href="#">How to order</a></li>
                        <li><a href="#">Membership Policy</a></li>
                        <li><a href="#">Delivery policy</a></li>
                        <li><a href="#">Terms of return</a></li>
                        <li><a href="#">Payments</a></li>
                        <li><a href="#">Complaint handling policy</a></li>
                    </ul>
                </div>
                <!-- end policies -->
                <div class="system">
                    <h5>SHOP SYSTEM</h5>
                    <ul class="system">
                        <p>►344 Cau Giay</p>
                        <p>►23 Chua Boc, Dong Da</p>
                        <p>►338 Nguyen Trai, Ha Dong</p>
                        <p>►209 Bach Mai</p>
                        <p>►189 Pho Nhon</p>
                        <p>►183 Tran Cung</p>
                    </ul>
                </div>
                <!-- end system -->
                <div class="about-us">
                    <h5>ABOUT US</h5>
                    <p>
                        <strong>LIMITED LIABILITY COMPANY TIME MAN</strong>
                    </p>
                    <p>
                        <strong>Address:</strong>
                        344 Cau Giay Street, Dich Vong Ward, <br>
                        Cau Giay District, Hanoi City
                    </p>
                    <p>
                        <strong>
                            Business code:
                        </strong>
                        0108901419 issued by Hanoi Department of Planning and Investment
                        on September 17, 2019
                    </p>
                    <p>
                        <strong>Phone:</strong>
                        0982.022.969
                    </p>
                    <p>
                        <strong>Email:</strong>
                        timeman.vn@gmail.com
                    </p>
                    <p>
                        <a href="http://online.gov.vn/Home/WebDetails/69075"><img src="./assets/image/boCongThuong.png"
                                alt="boCongThuong" height="57px"></a>
                    </p>
                </div>
                <!-- end about us -->
                <div class="our_fanpage">
                    <h5>SCHOOL FANPAGE</h5>
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffpt.poly&tabs=timeline&width=340&height=271&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                        width="340" height="271" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
            </div>
            <div class="bottomBar">
                <marquee width="100%" behavior="alternate">
                    Copyright By Cong Dinh - FPT Polytechnic
                </marquee>
            </div>
        </footer>
        <!-- End : footer -->
        <div class="bttop" id="bttop">
            <span class="text-bttop">Back to top</span>
            <i class="fa fa-arrow-right-long"></i>
        </div>
    </div>
    <script>
        $(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()){
            $('#bttop').fadeIn();
        }else{
            $('#bttop').fadeOut();
        }
    });
    $("#bttop").click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 0);
    });
})
    </script>
    <script language="javascript" src="../javascript/backtop.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>