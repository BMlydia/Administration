<form id="my-form" action="test2.php" method="post">
  <input name="account">
  <input name="account2">
  <input id="submit-btn" type="submit">
</form>

<script>
    document.getElementById("my-form").addEventListener("submit",function(e){
        e.preventDefault();
        console.log(e);
    });

    window.addEventListener("load",function(){
        document.getElementById("submit-btn").click();   
    });

</script>