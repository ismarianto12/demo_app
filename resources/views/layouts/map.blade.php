<section class="cta-area section-padding pb-125 fix">
    <br /><br /> <br />
    <h1 class="heading-1"><span>LOKASI KAMI</span></h2>
        <br /><br />
        <div class="row">
            <div class="col-xl-6" data-wow-duration="1s" data-wow-delay=".5s">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253840.48788413787!2d106.68943122671529!3d-6.2297280260012275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1638012470920!5m2!1sen!2sid"
                    width="650" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-xl-6" data-wow-duration="1s" data-wow-delay=".5s">
                <div class="widget-body">
                    <ul class="useful-link">
                        @foreach (Properti_app::alamat() as $produk)
                            <li><a href="{{ url($produk) }}"><i
                                        class="fa fa-map-marker"></i>&nbsp;&nbsp;{{ strtoupper($produk) }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                </ul>
            </div>
        </div>

</section>
