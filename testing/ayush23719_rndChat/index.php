<?php
session_start();
if(isset($_GET['logout'])){    
    $logout_message = "User <b>". $_SESSION['name'] ."</b> has left the chat session.<br>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
    session_destroy();
    header("Location: index.php"); 
}
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span>Please type in a name</span>';
    }
}
?>
<html lang="en">
    <head>
    </head>
    <body>
    <?php
    if(!isset($_SESSION['name'])){
        header("location:index.html");
    }
    else {
    ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            </div>
 
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>   
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html);
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
                            }   
                        }
                    });
                }
                setInterval (loadLog, 200);
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.html?logout=true";
                    }
                });
            });
        </script>
    </body>
</html>
<?php
}
?>