<?php
    $con = new mysqli('localhost', 'root', '', 'cse');

    $id = 0;

    if(isset($_POST['bttn_sign'])) {
        $check = "SELECT COUNT(id) FROM users;";
        $result = mysqli_query($con, $check);
        $row = mysqli_fetch_assoc($result);
        $reqiured_id = $row['COUNT(id)'] + 1;
        $username = $_POST['user-sign'];
        $password = $_POST['pass-pass'];
        $full_name = $_POST['full_name'];
        $email = $_POST['mail'];
        $query = "INSERT INTO users VALUES ($reqiured_id, '$username', '$password', '$full_name', '$email');";
        $result = mysqli_query($con, $query);
        $con->close();
    }

    if(isset($_POST['btn_log'])) {
        $username = $_POST['useruser'];
        $password = $_POST['passpass'];
        $con = new mysqli('localhost', 'root', '', 'cse');
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password';";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $con->close();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Management</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png">
</head>
<script>
    console.log("ID: " + <?php echo $id; ?>);
    let rbt = document.querySelector("#bttn");
    rbt.addEventListener("click", () => {
        passData(<?php echo $id; ?>);
    });
</script>
<body>
    <nav>
        <div class="navbar">
            <i class='bx bx-menu menu'></i>
            <a href="#" class="title">Railway Management</a>
        </div>
        <div class="sidebar">
            <div class="navbar">
                <i class='bx bx-menu menu'></i>
                <a href="#" class="title">Railway Management</a>
            </div>
            <div class="content">
                <ul class="lists">
                    <li class="list">
                        <a href="#" class="link"><i class='bx bx-home-alt icon'></i>Home</a>
                    </li>
                    <li class="list">
                        <a href="#" class="link"><i class='bx bx-list-ul icon'></i>Train-List</a>
                    </li>
                    <li class="list">
                        <a href="schedules.php" class="link"><i class='bx bx-align-left icon'></i>Schedules</a>
                    </li>
                    <li class="list">
                        <a href="#" class="link"><i class='bx bxs-discount icon'></i>Book a Ticket</a>
                    </li>
                    <li class="list">
                      <a href="#" class="link">
                          <i class='bx bx-transfer-alt icon'></i>Ticket Exchange
                      </a>
                  </li>
                    <li class="list">
                      <a href="#" class="link">
                          <i class='bx bx-bell icon'></i>Noticeboard
                      </a>
                  </li>
                </ul>
            </div>
        </div>
        <form class="form" action="" method="post">
          <div class="close-user">&times;</div>
          <h1>Log In (USER)</h1>
          <div class="content">
              <div class="username">
                  <label for="user" class="type">Username: </label>
                  <input type="text" class="input" id="user" name="useruser" placeholder="Enter Username">
              </div>
              <div class="password">
                  <label for="pass" class="type">Password: </label>
                  <div id="icon">
                      <input type="password" class="input" id="pass" name="passpass" placeholder="Enter Password">
                      <img class="eye-hide" id="hide" src="eye-hide.png" alt="eye">
                      <img class="eye-show-off" id="show" src="eye-show.png" alt="eye">
                  </div>
              </div>
              <div class="check">
                  <label for="check">
                      <input type="checkbox" id="check">
                      <span class="msg">Remember password</span>
                  </label>
              </div>
              <div class="btn">
                  <button type="submit" id="btn_log" name="btn_log">Log In</button>
              </div>
              <div class="lin">
                  <span id="forget">Forget Password?</span>
              </div>
              <div class="link-ad">
                  <span id="msg">Not an account?</span>
                  <span id="signup">Sign Up</span>
              </div>
          </div>
        </form>
      <div class="form-admin">
        <div class="close-admin">&times;</div>
        <h1>Log In (ADMIN)</h1>
        <h4 style="text-align: center; color: red; font-style: italic; background-color:cyan ; margin: 0px 30px;">Form is only for Admin Management!</h4>
        <div class="content">
            <div class="username">
                <label for="user-admin" class="type">Username: </label>
                <input type="text" class="input" id="user-admin" placeholder="Enter Username">
            </div>
            <div class="password">
                <label for="pass-admin" class="type">Password: </label>
                <div id="icon">
                    <input type="password" class="input" id="pass-admin" placeholder="Enter Password">
                    <img class="eye-hide" id="hide-admin" src="eye-hide.png" alt="eye">
                    <img class="eye-show-off" id="show-admin" src="eye-show.png" alt="eye">
                </div>
            </div>
            <div class="check">
                <label for="check-admin">
                    <input type="checkbox" id="check-admin">
                    <span class="msg">Remember password</span>
                </label>
            </div>
            <div class="btn">
                <button id="bttn-admin">Log In</button>
            </div>
            <div class="lin">
                <span id="forget">Forget Password?</span>
            </div>
            <div class="link-ad">
                <span id="msg">Not an account?</span>
                <span id="signup">Sign Up</span>
            </div>
        </div>
    </div>
    <form class="signup-form" action="" method="post">
        <div class="close-sign-form">&times;</div>
        <h1>Sign Up</h1>
        <div class="content">
            <div class="full-name">
                <label for="name" class="type">Full Name: </label>
                <input type="text" class="input" id="name" name="full_name" placeholder="Enter Full-name">
            </div>
            <div class="Email">
                <label for="mail" class="type">E-mail: </label>
                <input type="email" class="input" id="mail" name="mail" placeholder="Enter E-mail">
            </div>
            <div class="phone">
                <label for="phone" class="type">Mobile No.: </label>
                <input type="text" class="input" id="phone" placeholder="Enter Mobile No.">
            </div>
            <div class="username">
                <label for="user-sign" class="type">Username: </label>
                <input type="text" class="input" id="user-sign" name="user-sign" placeholder="Enter Username">
            </div>
            <div class="password">
                <label for="pass-pass" class="type">Password: </label>
                <div id="icon">
                    <input type="password" class="input" id="pass-pass" name="pass-pass" placeholder="Enter Password">
                    <img class="eye-hide" id="hide-pass" src="eye-hide.png" alt="eye">
                    <img class="eye-show-off" id="show-pass" src="eye-show.png" alt="eye">
                </div>
            </div>
            <div class="re-password">
                <label for="re-pass-repass" class="type">Confirm Password: </label>
                <div id="icon">
                    <input type="password" class="input" id="re-pass-repass" placeholder="Enter Password">
                    <img class="eye-hide" id="hide-repass" src="eye-hide.png" alt="eye">
                    <img class="eye-show-off" id="show-repass" src="eye-show.png" alt="eye">
                </div>
            </div>
            <div class="gender">
                <span class="gen">Gender: </span>
                <input type="radio" id="male" name="gender">
                <label for="male" class="radio">Male</label>
                <input type="radio" id="female" name="gender">
                <label for="female" class="radio">Female</label>
                <input type="radio" id="other" name="gender">
                <label for="other" class="radio">Other</label>
            </div>
            <div class="dob">
                <label for="dob" id="db">Date Of Birth:</label>
                <select name="date" id="dob">
					<option value="date">Date</option>
					<option value="1">01</option>
					<option value="2">02</option>
					<option value="3">03</option>
					<option value="4">04</option>
					<option value="5">05</option>
					<option value="6">06</option>
					<option value="7">07</option>
					<option value="8">08</option>
					<option value="9">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<select name="month">
					<option value="month">Month</option>
					<option value="jan">January</option>
					<option value="feb">February</option>
					<option value="mar">March</option>
					<option value="apr">April</option>
					<option value="may">May</option>
					<option value="jun">June</option>
					<option value="jul">July</option>
					<option value="aug">August</option>
					<option value="sep">September</option>
					<option value="oct">October</option>
					<option value="nov">November</option>
					<option value="dec">December</option>
				</select>
				<select name="year">
					<option value="year">Year</option>
					<option value="2024">2024</option>
					<option value="2023">2023</option>
					<option value="2022">2022</option>
					<option value="2021">2021</option>
					<option value="2020">2020</option>
					<option value="2019">2019</option>
					<option value="2018">2018</option>
					<option value="2017">2017</option>
					<option value="2016">2016</option>
					<option value="2017">2015</option>
					<option value="2014">2014</option>
					<option value="2013">2013</option>
					<option value="2012">2012</option>
					<option value="2011">2011</option>
					<option value="2010">2010</option>
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
					<option value="2005">2005</option>
					<option value="2004">2004</option>
					<option value="2003">2003</option>
					<option value="2002">2002</option>
					<option value="2001">2001</option>
					<option value="2000">2000</option>
					<option value="1999">1999</option>
					<option value="1998">1998</option>
					<option value="1997">1997</option>
					<option value="1996">1996</option>
					<option value="1995">1995</option>
					<option value="1994">1994</option>
				</select>
            </div>
            <div class="use">
                <span id="a_u">I am an:</span>
                <input type="radio" name="a_u" id="us">
                <label for="us" class="rad">User</label>
                <input type="radio" name="a_u" id="ad">
                <label for="ad" class="rad" id="adm">Admin</label>
            </div>
            <div class="check">
                <label for="check-sign">
                    <input type="checkbox" id="check-sign">
                    <span class="msg">I read and agree with <a href="#" class="terms">Terms and Conditions</a></span>
                </label>
            </div>
            <div class="btn">
                <button id="bttn" type="submit" name="bttn_sign">Sign Up</button>
            </div>
            <div class="link-ad">
                <span id="msg">Have an account?</span>
                <span id="signup">Log In</span>
            </div>
        </div>
    </form>
        <div class="pro">
            <ul class="lists">
              <li class="list">
                <span class="log">Log In</span>
                  <ul class="loglist">
                    <li class="loglists">
                      <span class="user">User</span>
                    </li>
                    <li class="loglists">
                      <span class="admin">Admin</span>
                    </li>
                  </ul>
              </li>
              <li class="list">
                <span class="sign">Sign Up</span>
              </li>
            </ul>
          </div>
          <div class="profile-off">
            <ul class="pLists">
                <li class="pList">
                    <span id="profile">Profile</span>
                    <div class="proSubLists">
                        <ul class="pSubLists">
                            <li class="pSubList">
                                <span class="pTopic" id="vPro">View Profile</span>
                            </li>
                            <li class="pSubList">
                                <span class="pTopic" id="ePro">Edit Profile</span>
                            </li>
                            <li class="pSubList" id="pSubList">
                                <span class="pTopic" id="logout">Log Out</span>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
          </div>
    </nav>
    <section class="over"></section>
    <div class="bdy">This is the main body! <button type="submit" id="cng_btn">Change Pro!</button> </div>
    <footer>
      <div class="footitem">
          <ul class="footlists">
              <li class="footlist">
                  <a href="#" class="goto" id="about-us">About Us</a>
              </li>
              <li class="footlist">
                  <a href="#" class="goto" id="contact-us">Contact Us</a>
              </li>
              <li class="footlist">
                  <a href="#" class="goto" id="terms">Terms and Conditions</a>
              </li>
              <li class="footlist">
                  <a href="#" class="goto" id="policy">Privacy Policy</a>
              </li>
          </ul>
      </div>
      <div class="right">Copyright © 2024 Railway Management All Rights Reserved.</div>
  </footer>
</body>
<script src="script.js">
    console.log("ID: ", <?php echo $id; ?>);
</script>
</html>