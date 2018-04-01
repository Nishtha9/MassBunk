 <script>
        var d=new Date();
    var t=d.toString().split(" ");
    var tm=[t];
    var time=t[4];
    document.cookie="time = "+time;
    </script>
    <?php
        $time=$_COOKIE['time'];
        $Deadline='10:00';
        if ($time<$Deadline)
        {
            echo 'not over';
        }
        else
        {
            echo 'over';
        }
        ?>