
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration | Ace in the Hole Multisport Events</title>
  <link href="https://fonts.googleapis.com/css?family=Teko:600|Source+Sans+Pro&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <script src="script/prefixfree.min.js"></script>
  <script src="script/jquery-3.3.1.min.js"></script>
  <script src="script/slippry.min.js"></script>
  <script src="script/perfect-scrollbar.min.js"></script>
  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/generic.css">
  <link rel="stylesheet" href="style/main.css">
  <link rel="stylesheet" href="style/slippry.css">
  <link rel="stylesheet" href="style/perfect-scrollbar.css">
</head>

<body>
  <!--  Facebook JavaScript SDK-->
  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!--  Loading screen. Do not delete.-->
  <div id="loading-screen">
    <div>
      <!-- Code taken from http://tobiasahlin.com/spinkit/-->
      <div class="sk-cube-grid">
        <div class="sk-cube sk-cube1"></div>
        <div class="sk-cube sk-cube2"></div>
        <div class="sk-cube sk-cube3"></div>
        <div class="sk-cube sk-cube4"></div>
        <div class="sk-cube sk-cube5"></div>
        <div class="sk-cube sk-cube6"></div>
        <div class="sk-cube sk-cube7"></div>
        <div class="sk-cube sk-cube8"></div>
        <div class="sk-cube sk-cube9"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>

  <?php include 'header.php';?>

  <main>
    <section>
      <h1>Registration Form</h1>
      <article id="registration-page">
        <p>To register in our event, fill in the following form and click Register. </p>

        <strong>Here is the list price</strong>
        <ul>
          <li><span>Long course triathlon</span> <span>$240</span></li>
          <li><span>Olympic triathlon</span> <span>$110</span></li>
          <li><span>10K</span> <span>$50</span></li>
          <li><span>Half marathon</span> <span>$75</span></li>
          <li><span>Sprint marathon</span> <span>$90</span></li>
          <li><span>Try-a-Tri</span> <span>$65</span></li>
          <li><span>Splash and Dash - $25 or Free for kids who have adults register</span></li>
        </ul>

        <strong>Cost includes</strong>
        <ul>
          <li>Food &amp; Beer </li>
          <li>Access to the weekend’s live entertainment &amp; Fitness Expo</li>
          <li>Commemorative Finisher medal</li>
          <li>Accurate Chip Timing for competitive races</li>
          <li>Ace in the Hole MultiSport Weekend Tech Shirt</li>
            <li>Post-event party & entertainment</li><br>
            <li><i>*NOTE: Tech shirts guaranteed to pre-registered participants only.</i></li>
        </ul>

        <strong>Packet pick up</strong>
          <p>All packet pick up will occur at Why Worry Racing, 123 NW Everett, Portland OR.</p>
          <p>Packet pick up hours: Thursday 8-5, Friday 9-noon. No day of event packet pick up.</p>

      </article>
        <div id="registration-page">
        <form method="post" id="registration-form" name="registrationform" action="register-form-to-email.php">
        <p>Enter your information here</p>
          <label for="name">Your name</label>
          <input type="text" name="name" id="name">

          <label for="age">Your age</label>
          <input type="text" name="age" id="age">

          <label for="gender">Gender</label>
          <select size="1" name="gender" id="gender">
              <option>Choose Your Gender</option>
              <option value="Female">Female</option>
              <option value="Male">Male</option>
              <option value="Non-binary/Other">Non-binary/Other</option>
          </select>

          <label for="email">Your email</label>
          <input type="text" name="email" id="email">

          <label for="emergency_name">Emergency contact name</label>
          <input type="text" name="emergency_name" id="emergency_name">

          <label for="emergency_phone_number">Emergency contact phone number</label>
          <input type="text" name="emergency_phone_number" id="emergency_phone_number">

          <label for="size">Choose your T-shirt size</label>
          <select size="1" name="size" id="size">
                <option>Choose Your Size</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXl</option>
                <option value="XXXL">XXXL</option>
          </select>

          <label for="role">You would register as</label>
          <select size="1" name="role" id="role">
                <option>Choose Your Role</option>
                <option value="Athlete">Athelete</option>
                <option value="Volunteer">Volunteer</option>
          </select>

          <label for="saturday_courses">Select a course on Saturday</label>
          <select size="1" name="saturday_courses" id="saturday_courses">
                <option>Choose Your Course</option>
                <option value="Long Course Triathlon">Long Course Triathlon - 7:00AM - $240</option>
                <option value="Olympic Triathlon">Olympic Triathlon - 7:30AM - $110</option>
                <option value="10K">10K - 7:15AM - $50</option>
                <option value="Half Marathon">Half Marathon - 7:15AM - $75</option>
                <option value="N/A">N/A</option>
          </select>

          <label for="sunday_courses">Select a course on Sunday</label>
          <select size="1" name="sunday_courses" id="sunday_courses">
                <option>Choose Your Course</option>
                <option value="Sprint Triathlon">Sprint Triathlon - 8:00AM - $90</option>
                <option value="Try-a-Tri">Try-a-Tri - 8:20AM - $65</option>
                <option value="Splash n Dash">Splash n Dash - 12:00PM - </option>
                <option value="N/A">N/A</option>
                <p>* The Splash and Dash is an event for kids 12 and under. It is a 100 yard swim and a 50 meter dash. It is free for kids who have an adult register and $25 for those who do not.</p>
          </select>

          <p>To see more details of the courses, please visit <a href="course-details.php">course details page</a>.</p>

        <section>
          <p id="register-errors"></p>
        </section>
        <button id="register-form-submit" type="submit">Register</button>
      </form>
        </div>
    </section>

    <?php include 'feeds.php';?>
  </main>

  <?php include 'footer.php';?>

  <script src="script/custom.js"></script>
</body>
</html>