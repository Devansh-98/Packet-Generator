<html>
  <head>
    <title>Traffic Generator</title>
  </head>
  <body>
    <a href = "http://localhost/networkanalyzer/IPv4.php">IPv4 Packet Generator</a>
    <center>
      <!-- Form for taking input-->
    <form method="get" style="width: 40%;height: 90%">
      <table border='4'font-size: 24px; style="width: 100%; ">
        <caption style="width: 100%;height:50px; color: #00ff00; background-color: #222; font-size: 40px">IPv6 packet generator</caption>
        <tr style="width:100%; height:50px"><th style="width:40%;">Source IPv6 Address</th><th style="width:60%;"><input name="s_ip" value ="fe80::a3:a444:d4cf:363f%4" style="width:100%; height:90%; border-radius: 5px ;border-width:3px "></th></tr>
        <tr style="width:100%; height:50px"><th style="width:40%;">Destination IPv6 Address</th><th style="width:60%;"><input name="d_ip" value ="fe80::ea41:9b01:fc6b:b61e" style="width:100%; height:90%; border-radius: 5px;border-width:3px"></th></tr>
        <tr style="width:100%; height:50px"><th style="width:40%;">Protocol</th>
          <th style="width:60%;">
            <select name ="protocol" id = "pro" onchange="disable_ports('pro','ICMP')" style="width:50%; height:80%; background-color: border-radius: 10px">
              <option>TCP</option>
              <option>UDP</option>
              <option>ICMP</option>
            </select>
          </th>
        </tr>
        <tr style="width:50%; height:70px"><th style="width:40%;">Application(Source)</th>
          <th style="width:60%;">
            <select name ="sport" id = "spo1" onchange=" changetextbox('spo1','spo','Enter no.')" style="width:50%; height:50%; background-color: border-radius: 10px">
              <option>Enter no.</option>
              <option>FTP</option>
              <option>HTTP</option>
              <option>HTTPS</option>
              <option>SSH</option>
              <option>Telnet</option>
            </select><br>
            <input name="s_p" value="80" id ="spo" style="width:50%; height:50%; border-radius: 5px ;border-width:3px ">
          </th>
        </tr>
        <tr style="width:50%; height:70px"><th style="width:40%;">Application(Destination)</th>
          <th style="width:60%;">
            <select name ="dport" id = "dpo1" onchange=" changetextbox('dpo1','dpo','Enter no.')" style="width:50%; height:50%; background-color: border-radius: 10px">
              <option>Enter no.</option>
              <option>FTP</option>
              <option>HTTP</option>
              <option>HTTPS</option>
              <option>SSH</option>
              <option>Telnet</option>
            </select><br>
            <input name="d_p" value="5060" id ="dpo" style="width:50%; height:50%; border-radius: 5px ;border-width:3px ">
          </th>
        </tr>
        <tr style="width:50%; height:70px"><th style="width:40%;">No. of Packets</th>
          <th style="width:60%;">
            <select name ="sendtype" id="id_sendtype" onchange=" changetextbox('id_sendtype','id_nopack','Non-Continuous')" style="width:50%; height:50%; background-color: border-radius: 10px">
              <option>Non-Continuous</option>
              <option>Continuous</option>
            </select><br>
            <input name="nopack" value="1" id ="id_nopack" style="width:50%; height:50%; border-radius: 5px ;border-width:3px ">
          </th>
        </tr>
        <tr style="width:50%; height:70px"><th style="width:40%;">Payload length for packet</th>
          <th style="width:60%;">
            <input name="Packetlength" value="8"style="width:50%; height:50%; border-radius: 5px ;border-width:3px ">
          </th>
        </tr>
        <tr style="width:100%; height:50px"><th style="width:40%;">InterPacket Gap </th><th style="width:60%;"><input name="timegap" value = 0 style="width:50%; height:90%; border-radius: 5px ;border-width:3px ">Microsec default(none)</th></tr>
        <tr style="width:100%; height:300px"><th style="width:40%;">Payload option</th>
          <th style="width:60%;">
            <input type="radio" name="payloadtype" onclick="disable_textbox()" value="Random" ><label for="Random">Random bytes</label></input>
            <input type="radio" name="payloadtype" onclick="document.getElementById('id_Text').disabled=''" value="User_define" checked="checked"><label for="User_define">Define my own</label></input><br><br>
            <input name="Text" value = "Text" id="id_Text"style="width:80%; height:60%; border-radius: 5px ;border-width:3px "></th></tr>
      </table>
      <button type="submit" name="start"  style="height:20px; width:80px">Start</button>
      <button type="submit" name="stop"  style="height:20px; width:80px">Stop</button><br>
      <input type="reset" value="Reset"  style="height:20px; width:80px">
    </form>
  <script type="text/javascript">
  // Function for hiding elements.
  function changetextbox($sel,$inp,$val)
  {
    if (document.getElementById($sel).value === $val) {
      document.getElementById($inp).style.display='';
    } else {
      document.getElementById($inp).style.display='none';
    }
  }
  // Function for disabling elements.
  function disable_ports($id,$val)
  {
    if (document.getElementById($id).value === $val) {
      document.getElementById('spo').value = "Unvalid";
      document.getElementById('spo').disabled = "True";
      document.getElementById('spo').style.display='';
      document.getElementById('spo1').style.display='none';
      document.getElementById('dpo').value = "Unvalid";
      document.getElementById('dpo').disabled = "True";
      document.getElementById('dpo').style.display='';
      document.getElementById('dpo1').style.display='none';
    } else {
      document.getElementById('spo').value='0';
      document.getElementById('spo').disabled='';
      document.getElementById('spo1').style.display='';
      document.getElementById('spo1').value = "Enter no.";
      document.getElementById('dpo').value='0';
      document.getElementById('dpo').disabled='';
      document.getElementById('dpo1').style.display='';
      document.getElementById('dpo1').value = "Enter no.";
    }
  }
  // Function for disabling text box.
  function disable_textbox()
  {
    document.getElementById('id_Text').value="Random Bytes";
    document.getElementById('id_Text').disabled="True";
  }
  </script>
  <?php
  // Storing all parameters in variables.
  $time=$_GET['timegap'];
  $count=$_GET['nopack'];
  $sip=$_GET['s_ip'];
  $dip=$_GET['d_ip'];
  $size=$_GET['Packetlength'];
  //Generating shell command according to input provided by client.
  switch ($_GET['payloadtype']) {

    case 'User_define':
      $N=" -d ".
      $_GET['Text'];
      break;
  }
  switch ($_GET['dport']) {
    case 'FTP':
      $dp=21;
      break;
    case 'SSH':
      $dp=22;
      break;
    case 'Telnet':
      $dp=23;
      break;
    case 'HTTP':
      $dp=80;
      break;
    case 'HTTPS':
      $dp=443;
      break;
    default:
      $dp=$_GET['d_p'];
      break;
  }
  switch ($_GET['sport']) {
    case 'FTP':
      $sp=21;
      break;
    case 'SSH':
      $sp=22;
      break;
    case 'Telnet':
      $sp=23;
      break;
    case 'HTTP':
      $sp=80;
      break;
    case 'HTTPS':
      $sp=443;
      break;
    default:
      $sp=$_GET['s_p'];
      break;
  }
  switch ($_GET['protocol']) {
    case 'TCP':
      $pro="tcp -ts ".$sp." -td ".$dp;
      break;
    case 'UDP':
      $pro="udp -us ".$sp." -ud ".$dp;
      break;
    case 'ICMP':
      $pro="icmp";
  }
  if($_GET['sendtype']=="Continuous")
  {
    $count=-1;
  }
  //Starting packet sending
  if(isset($_GET['start']))
  {

    while(!isset($_GET['stop'])&&$count!=0 )
    {
      $shell_command = "sendip -p ipv6 -6s ".$sip." -p ".$pro." ".$N." -6l ".$size." -v ".$dip;
      echo $shell_command;
      shell_exec($shell_command);
      $count--;
      usleep($time);
    }

  }
  ?>
  </body>
</html>
