<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css.php">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">$('div').hide();</script>
  <script>
    $("#bmi").show();
    
    $(document).ready(function(){
      $("#cases").change(function(){
        var value = this.value;
        document.getElementById('result').innerHTML = "";
        document.getElementById('result1').innerHTML = "";
        document.getElementById('result2').innerHTML = "";
        document.getElementById('result3').innerHTML = "";
        $('div').hide();
        $('#' + this.value).show();});
      $("#show").click(function(){
        $("p").show();

      });
    });
  </script>

  <?php 

  ?>

  </head>
<body>
  <form action="test5.php" method="POST">
    <select name="cases" id="cases">
        <option value="bmi">BMI</option>
        <option value="bmr">BMR</option>
        <option value="tri">Triglyceride</option>
    </select><br>
    
  <div class="bmi" id="bmi" style="display: none;">
        ส่วนสูง(cm) :<input type="number" name="height" min="1">
        น้ำหนัก(kg) :<input type="number" name="weight" min="1">
        </select><br>
    </div>

    <div class="bmr" id="bmr" style="display: none;">
        เพศ :<input type="radio" name="gender" value="Male" checked="checked">Male
        <input type="radio" name="gender" value="Female">Female<br><br>
        ส่วนสูง(cm) :<input type="number" name="height1" min="1"><br>
        น้ำหนัก(kg) :<input type="number" name="weight1" min="1"><br>
        อายุ(ปี) :<input type="number" name="old" min="1"><br>
        กิจกรรม :<select name="activity" id="activity-type">
            <option value="topic1">ไม่ออกกำลังกายหรืออกกำลังกายน้อยมาก</option>
            <option value="topic2">ออกกำลังกายอย่างน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</option>
            <option value="topic3">ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</option>
            <option value="topic4">ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</option>
            <option value="topic5">ออกกำลังกายหนักมากเป็นนักกีฬา</option>
        </select><br><br>       
    </div>

    <div class="tri" id="tri" style="display: none;">
        LDL(มิลลิกรัม/เดซิลิตร) :<input type="number" name="ldl" min="0"><br>
        HDL(มิลลิกรัม/เดซิลิตร) :<input type="number" name="hdl" min="0"><br>
        TRI(มิลลิกรัม/เดซิลิตร) :<input type="number" name="trii" min="0"><br>
        
    </div>
    <br><br>
    <?php 
          $msg1="";
          $msg="";
          $msg2="";
          $msg3="";
          $arrayValue = array("topic1" => "1.2",
            "topic2" => "1.375",
            "topic3" => "1.55",
            "topic4" => "1.725",
            "topic5" => "1.9");
    ?>
    
    <?php
    if(isset($_POST['formSubmit'])) {
      $varType = $_POST['cases'];
      switch ($varType) {
        case 'bmi':

          $var1 = $_POST['height']; 
          $var2 = $_POST['weight']; 
          $var3 = $var2/(pow(($var1/100), 2));
          $msg = "ดัชนีมวลกาย = {$var3}";
                if ($var3>=40){
                  $msg1 = "ค่า BMI อยู่ในช่วง - 40 หรือมากกว่านี้ : โรคอ้วนขั้นสูงสุด";
                }
                else if ($var3<40 && $var3>=35){
                  $msg1 = "ค่า BMI อยู่ในช่วง - 35.0 - 39.9: โรคอ้วนระดับ2 คุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน หากคุณมีเส้นรอบเอวมากกว่าเกณฑ์ปกติคุณจะเสี่ยงต่อการเกิดโรคสูง คุณต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง";
                }
                else if ($var3<35 && $var3>=28.5){
                  $msg1 = "ค่า BMI อยู่ในช่วง - 28.5 - 34.9: โรคอ้วนระดับ1 และหากคุณมีเส้นรอบเอวมากกว่า 90 ซม.(ชาย) 80 ซม.(หญิง) คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย";
                }
                else if($var3<28.5 && $var3>=23.5){
                  $msg1 = "ค่า BMI อยู่ในช่วง - 23.5 - 28.4: น้ำหนักเกิน หากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23";
                }
                else if($var3<23.5 && $var3>=18.5){
                  $msg1 = "ค่า BMI อยู่ในช่วง - 18.5 - 23.4: น้ำหนักปกติ และมีปริมาณไขมันอยู่ในเกณฑ์ปกติ มักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้";
                }
                else{
                  $msg1 = "ค่า BMI อยู่ในช่วง - น้อยกว่า 18.5: น้ำหนักน้อยเกินไป ซึ่งอาจจะเกิดจากนักกีฬาที่ออกกำลังกายมาก และได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ และออกกำลังกายอย่างเหมาะสม";
                }
          break;
        case 'bmr':  // if ANY of the options was checked 
            $hei = $_POST['height1']; 
            $wei = $_POST['weight1']; 
            $o = $_POST['old']; 
            $gender = $_POST['gender'];
            $var3="0";
            
            
            if ($gender=="Female") {
              $var1 = 665+(9.6*$wei);
              $var2 = (1.8*$hei)-(4.7*$o);
              $var3 = $var1+$var2;
              $msg = "BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิต {round($var3)} กิโลแคลอรี่";
            }else{
              $var1 = 66+(13.7*$wei);
              $var2 = (5*$hei)-(6.8*$o);
              $var3 = $var1+$var2;
              $msg = "BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิต {round($var3)} กิโลแคลอรี่";
            }
            $var4 = ($var3 * $arrayValue[$_POST['activity']]);
            $msg1 = "TDEE (Total Daily Energy Expenditure) พลังงานที่คุณใช้ในแต่ละวัน {round($var4)} กิโลแคลอรี่";

          break;
        
        case 'tri':
            $ldl =$_POST['ldl']; 
            if ($ldl<100){
              $msg ="ระดับไขมันแอลดีแอล - ดีมาก/ไขมันแอลดีแอลต่ำ";
            }
            else if ($ldl>=100 && $ldl<=129){
              $msg ="ระดับไขมันแอลดีแอล - ดี/ไขมันแอลดีแอลสูงเล็กน้อย";
            }
            else if ($ldl>=130 && $ldl<=159){
              $msg ="ระดับไขมันแอลดีแอล - พอใช้/ไขมันแอลดีแอลค่อนข้างสูง";
            }
            else if ($ldl>=160 && $ldl<=189){
              $msg ="ระดับไขมันแอลดีแอล - ไม่ดี/ไขมันแอลดีแอลสูง";
            }
            else {
              $msg ="ระดับไขมันแอลดีแอล - ไม่ดีมาก/ไขมันแอลดีแอลสูงมาก";
            }
            $hdl =$_POST['hdl']; 
            if ($hdl>=60){
              $msg1 ="ระดับไขมันเอชดีแอล - ดีมาก";
            }
            else if ($hdl>=41 && $hdl<=59){
              $msg1 ="ระดับไขมันเอชดีแอล - ค่อนข้างเสี่ยงที่จะเป็นโรคหัวใจ";
            }
            else {
              $msg1 ="ระดับไขมันเอชดีแอล - มีความเสี่ยงสูงที่จะเป็นโรคหัวใจ";
            }
            $triglyceride = $_POST['trii']; 
            if ($triglyceride<150){
              $msg2 ="ค่าไตรกลีเซอไรด์ - ดีมาก";
            }
            else if ($triglyceride>=150 && $triglyceride<=199){
              $msg2 ="ค่าไตรกลีเซอไรด์ - สูงเล็กน้อย";
            }
            else if ($triglyceride>=200 && $triglyceride<=499){
              $msg2 ="ค่าไตรกลีเซอไรด์ - สูง";
            }
            else {
              $msg2 ="ค่าไตรกลีเซอไรด์ - สูงมาก";
            }
            $var1 = ($ldl+$hdl);
            $var2 = ($triglyceride/5);
            $var3 = $var1+$var2;
            $msg3 = "ค่าคอเลสเตอรอลรวม = {$var3}";

            
        break;

      }

    }
    ?>
    <p id="result" name="result"  ><?php echo $msg; ?> </p>
    <p id ="result1" name="result1" ><?php echo $msg1; ?> </p>
    <p id ="result2" name="result2" ><?php echo $msg2; ?> </p>
    <p id ="result3" name="result3" ><?php echo $msg3; ?> </p>
    <input type="submit" name="formSubmit" value="Submit" />
        
      
  </form>
    



</body>
</html>
