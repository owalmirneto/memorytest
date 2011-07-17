<?php $base = Mapper::base(); ?>
<label><b><em>Digite seu nome</em></b></label>
<div style="text-align: center; margin-bottom: 15px">
    <input id="user" value="" />
    <div id="message"></div>
</div>
<script type="text/javascript">
    $(document).ready( function () {
        $("#user").live("change", function () {
            $("input").val($(this).val())
        });
        $(".submit").live("click", function () {
            
            var nome_usuario = $(this).siblings().val();
            
            if (nome_usuario == "") {
                $("#message").html("Por favor digite um nome");
                return false;
            } else {
                $("#message").html("");
            }            
            link = $(this).attr("href");
            $.post("<?php echo $base; ?>/home/savename/", { nome: nome_usuario }, function (data) {
                $(".piro_overlay").click();
                setTimeout( function (){
                    window.location = link;
                },10)
            });
            return false;
        });
    });
</script>