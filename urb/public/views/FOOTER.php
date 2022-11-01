<footer id="footer">
    <div class="footer-title">
        <a href="#">
            <img class="logo_selo_horizontal" src="http://redeplanejamento.pmf.sc.gov.br/public/images/Logo_IPUF-branco.svg" alt="">
        </a>
        <a href="#">
            <img class="logo_selo_horizontal" src="http://redeplanejamento.pmf.sc.gov.br/public/images/Logo_REP-branco.svg" alt="">
        </a>
        <a href="#">
            <!-- <img class="logo_selo_horizontal" src="http://redeplanejamento.pmf.sc.gov.br/public/images/Logo_REMOB-branco.svg" style="max-width: 250px;width: 100%;" alt=""> -->
            <img class="logo_selo_horizontal" src="http://redeplanejamento.pmf.sc.gov.br/public/images/Logo_REMOB-branco.svg" alt="">
        </a>
    </div>
    <!--  <div class="footertext">
        <strong>SMPU | Secretaria Municipal de Mobildiade e Planejamento Urbano
            <br>IPUF | Instituto de Planejamento Urbano de Florianópolis
            <br>SMDU | Secretaria Municipal de Desenvolvimento Urbano</strong>

    </div> -->
    <div class="vl"></div>
    <div class="footer-txt">
        <ul style="padding:0">
            <div class="footertext">
                <strong>
                    SMPU | Secretaria Municipal de Mobildiade e Planejamento Urbano<br>
                    Av. Pref. Osmar Cunha, 77 - Centro<br>
                    CEP: 88015-100<br>
                </strong>
            </div>
        </ul>

    </div>
</footer>
<script>
    $(document).ready(function() {

        var docHeight = $(document).height();
        var footerHeight = $('#footer').outerHeight();
        var footerTop = $('#footer').position().top + footerHeight;
        console.log(footerTop, docHeight)
        if (footerTop < docHeight) {
            $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
        }
    });
</script>