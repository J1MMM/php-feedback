
    <?php include './include/header.php' ?><!-- Header -->

    <?php  
        $name = $email = $body = '';
        $err_name = $err_email = $err_body = '';
        //Validation
        if(isset($_POST['submit'])){
            //validate name
            if(empty($_POST['name'])){
                $err_name = 'Name is required';
            }else{
                $err_name = '';
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            //validate email
            if(empty($_POST['email'])){
                $err_email = 'Email is required';
            }else{
                $err_email = '';
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            //validate body
            if(empty($_POST['body'])){
                $err_body = 'Body is required';
            }else{
                $err_body = '';
                $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            
            if( empty($err_name) && empty($err_email) && empty($err_body)){
                $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

                if(mysqli_query($connect, $sql)){
                    header('Location: feedback.php');
                }else{
                    echo mysqli_error($connect);
                }
            }else{

            }
        }
    ?>

    <main class="d-flex flex-column align-items-center">
        <img src="./images/feedback-logo.png" alt="" style="width: 10rem" class="mt-4">
            <h3 class="mt-3">Feedback</h3>
            <p class="mt-0">Leave feedback for Traversy Media</p>
        </main>
        <form 
            action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" 
            method="POST" 
            class="w-25 mt-5"
            novalidate>
            <div class="form-floating">
                <input 
                    type="text" 
                    class="form-control <?php echo $err_name ? 'is-invalid' : null ?>" 
                    placeholder="name" 
                    name="name"
                    required>
                <label for="name">Name</label>
                <div class="invalid-feedback">
                    <?php echo $err_name; ?>
                </div>
            </div>
            <div class="form-floating mt-4">
                <input 
                    type="email" 
                    class="form-control <?php echo $err_email ? 'is-invalid' : null ?>" 
                    placeholder="email" 
                    name="email"
                    required
                    >
                <label for="email">Email</label>
                <div class="invalid-feedback">
                    <?php echo $err_email; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="form-label mt-2">Feedback</label>
                <textarea 
                    name="body" 
                    placeholder="Enter your feedback"
                    class="form-control fs-6 <?php echo $err_body ? 'is-invalid' : null ?>" 
                    style="resize: none;"
                    required></textarea>
                    <div class="invalid-feedback">
                        <?php echo $err_body; ?>
                    </div>
            </div>

            <input 
                class="form-control btn btn-dark mt-3" 
                type="submit" 
                value="Submit"
                name="submit"
                >
        </form>

        <?php include './include/footer.php' ?><!-- Footer -->