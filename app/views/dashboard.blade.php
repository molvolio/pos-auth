<div class='alert-box alert' style='text-align: center;'>
    Sikeresen bejelentkezett<br/><br/>

    <label for="country">ország</label><br/>
    <input type="text" name="country" id="country" /><br/><br/>
    <button id="getcur">pénznem lekérdezése</button><br/><br/>
    <div id="curres"></div>
</div>

<script>
    $("#getcur").click(function () {
        $.ajax({
            url: "{{ URL::to('/webservice'); }}",
            type: "post",
            data: {"country": $("#country").val() },
            success: function (data) {
                $("#curres").html(data);
                $("#country").val("");
                $("#country").focus();
            }
        });
    });
</script>