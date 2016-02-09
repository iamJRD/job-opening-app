<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";

    $app = new Silex\Application();

    $app->get("/", function(){
        return "
       <!DOCTYPE html>
       <html>
       <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
            <title>Post a Job Opening</title>
        </head>
        <body>
            <div class='container'>
                <h1>Post a New Job Opening</h1>
                    <form action='/view_jobs'>
                        <div class='form-group'>
                          <label for='jobTitle'> Job Title</label>
                          <input id='jobTitle' name='jobTitle' class='form-control' type='text'>
                          <label for='jobDescription'> Job Description</label>
                          <input id='jobDescription' name='jobDescription' class='form-control' type='text'>
                          <label for='contactName'> Contact Name</label>
                          <input id='contactName' name='contactName' class='form-control' type='text'>
                          <label for='contactEmail'> Contact Email</label>
                          <input id='contactEmail' name='contactEmail' class='form-control' type='text'>
                        </div>
                        <button type='submit' class='btn-success'>Submit</button>
                    </form>
            </div>
        </body>
        </html>
        ";
    });

    $app->get("/view_jobs", function() {
        $newOpening = new JobOpening($_GET['jobTitle'], $_GET['jobDescription'], $_GET['contactName'], $_GET['contactEmail']);

        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
            <title>A Job Opening!</title>
        </head>
        <body>
            <div class='container'>
                <h1>" . $newOpening->getTitle() . "</h1>
                <p>" . $newOpening->getDescription() . "</p>
                <p> Contact: " . $newOpening->getContactName() . "<br>
                at <a href='mailto:" . $newOpening->getContactEmail() . "'> this email address</a></p>
            </div>
        </body>
        </html>
          ";
    });

    return $app;
?>
