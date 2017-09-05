<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย โดย www.itangmo.com</title>
        <meta name="description" content="ไอ้แตงโมดอทคอม แจกแอพฟรีประจำวัน สอนทำเว็บไซต์ ด้วย php,ajax,jquery,css,css3,HTML5 แบบง่ายสุดๆ"/>
        <meta name="keywords" content="app ฟรีประจำวัน,สอนทำเว็บไซต์ฟรี,สอนทำเว็บ,สอนทำเว็บไซต์,php,html5,css,css3,jquery,ajax,สอนทำเว็บไซต์ด้วย php,Drop Down menu เลือกจังหวัด"/>
    </head>
    <script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {
             var req = Inint_AJAX();
             req.onreadystatechange = function () { 
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       } 
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);     
    </script>
    <body>
        <h3>Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย</h3>
        <p>โดย <a href="http://www.itangmo.com" title="Drop Down menu เลือกจังหวัด, อำเภอ, ตำบล ของประเทศไทย">www.itangmo.com</a></p>
        <form name="form" method="post" action="get_form.php">
            <p>
                จังหวัด : 
                <span id="province">
                    <select>
                        <option value="0">- เลือกจังหวัด -</option>
                    </select>
                </span>
            </p>
            <p>
                อำเภอ : 
                <span id="amphur">
                    <select>
                        <option value='0'>- เลือกอำเภอ -</option>
                    </select>
                </span>
            </p>
            <p>
                ตำบล : 
                <span id="district">
                    <select>
                        <option value='0'>- เลือกตำบล -</option>
                    </select>
                </span>
            </p>
            <input type="submit" name="Submit" value="ตกลง"> <INPUT type="reset" value="ยกเลิก">
        </form>
    </body>
</html>
