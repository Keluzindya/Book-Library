<!-- this is the sign up/ register for an account form section-->
<div class="container-fluid d-flex justify-content-center" style="padding: 20px;">
    <div class="form-container" style="width: 70%; max-width: 800px; min-width: 400px; border: 1px solid #ccc; background-color:gray; padding: 20px; border-radius: 8px; text-align: center;">
        <h3 style="margin-top: -30px; display: inline-block; color: black; padding: 0 10px;">
            Register for an Account
        </h3>
        <form method="post" action="index.php?action=enrollment">
            <!-- First Name -->
        <div class="row" style="padding: 5px; margin: 5px;">
            <div class="col" >
            <input type="text" class="form-control" placeholder="First name" name="f_name" value="">
            <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['f_name_error'])) { echo $data['f_name_error']; } ?></p></span>
        </div>
        <!-- Last Name -->
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name" name="l_name" value="">
                <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['l_name_error'])) { echo $data['l_name_error']; } ?></p></span>
            </div>
        </div>
        <div class="row" style="padding: 5px; margin: 5px;">
            <!-- Email One -->
            <div class="col">
            <input type="email" class="form-control" placeholder="Email" name="email_one" value="">
            <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['email_one_error'])) { echo $data['email_one_error']; } ?></p></span>
        </div>
        <!-- Email two (which is Verify Email) -->
            <div class="col">
                <input type="email" class="form-control" placeholder="Verify Email" name="email_two" value="">
                <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['email_two_error'])) { echo $data['email_two_error']; } ?></p></span>
                <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['email_error'])) { echo $data['email_error']; } ?></p></span>
            </div>
        </div>
        <div class="row" style="padding: 5px; margin: 5px;">
            <!-- Password one -->
            <div class="col">
            <input type="password" class="form-control" placeholder="Password" name="password_one" value="">
            <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['password_one_error'])) { echo $data['password_one_error']; } ?></p></span>
        </div>
        <!-- Password two (which is Verify Password ) -->
            <div class="col">
                <input type="password" class="form-control" placeholder="Verify Password" name="password_two" value="">
                <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['password_two_error'])) { echo $data['password_two_error']; } ?></p></span>
                <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['password_match_error'])) { echo $data['password_match_error']; } ?></p></span>
            </div>
        </div>
        <div class="row" style="padding: 5px; margin: 5px;">
            <!-- User home Address -->
            <div class="col">
            <input type="text" class="form-control" placeholder="Address" name="address" value="">
            <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['address_error'])) { echo $data['address_error']; } ?></p></span>
        </div>
        <!-- User Home City -->
            <div class="col">
                <input type="text" class="form-control" placeholder="City" name="city" value="">
                <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['city_error'])) { echo $data['city_error']; } ?></p></span>
            </div>
        </div>
        <br>
        <!-- Submit Button and reset button -->
        <div class="row justify-content-center" style="padding: 5px; margin: 5px;" >
            <div class="d-flex justify-content-center align-items-center">
                <input type="submit" class="btn me-2" style="background-color: blue; color: white;" value="Submit" name="submit">
                <input type="reset" class="btn" style="background-color: blue; color: white;" value="Clear Form" name="reset">
            </div>
        </div>

        
        </form>

    </div>
</div>

    