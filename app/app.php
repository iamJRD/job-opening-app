<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/JobOpening.php";
    require_once __DIR__."/../src/ContactInfo.php";

    session_start();
    if(empty($_SESSION['list_of_jobs'])){
        $_SESSION['list_of_jobs'] = array();
    }

    $app = new Silex\Application();

    $app->get("/", function(){

        $output = "";

        $all_jobs = JobOpening::getAll();

        if (!empty($all_jobs)){
            $output .="
                <h1>Here Are Jobs!</h1>"

            foreach ($all_jobs as $job) {
                $output .= "<div class='container'>
                    <h1>" . $title . "</h1>
                    <p>" . $description . "</p>
                    <p> Contact: </p>
                    <ul>
                        <li>Email Contact: <a href='mailto:" . $currentContact->getContactEmail() . "'>" . $currentContact->getContactName() . "</a></li>
                        <li>Phone Contact: " . $currentContact->getPhoneNumber() . "</li>
                </div>
            }
        }

        foreach (JobOpening::getAll() as $job) {
            $output .= "<div class='container'>
                <h1>" . $job->getTitle() . "</h1>
                <p>" . $job->getDescription() . "</p>
                <p> Contact: </p>
                <ul>
                    <li>Email Contact: <a href='mailto:" . $currentContact->getContactEmail() . "'>" . $currentContact->getContactName() . "</a></li>
                    <li>Phone Contact: " . $currentContact->getPhoneNumber() . "</li>
            </div>";
        }
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
                            <input id='jobTitle' name='jobTitle' class='form-control' type='text' required>
                            <label for='jobDescription'> Job Description</label>
                            <input id='jobDescription' name='jobDescription' class='form-control' type='text' required>
                            <label for='contactName'> Contact Name</label>
                            <input id='contactName' name='contactName' class='form-control' type='text' required>
                            <label for='contactEmail'> Contact Email</label>
                            <input id='contactEmail' name='contactEmail' class='form-control' type='email' required>
                            <label for='phoneNumber'> Contact Phone Number</label>
                            <input id='phoneNumber' name='phoneNumber' class='form-control' type='tel' required>
                        </div>
                        <button type='submit' class='btn-success'>Submit</button>
                    </form>
            </div>
        </body>
        </html>
        ";
    });

    $app->get("/view_jobs", function() {
        $newOpening = new JobOpening($_GET['jobTitle'], $_GET['jobDescription'], new ContactInfo($_GET['contactName'], $_GET['contactEmail'], $_GET['phoneNumber']));

        $title = $newOpening->getTitle();
        $description = $newOpening->getDescription();
        $currentContact = $newOpening->getContactInfo();

        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' integrity='sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7' crossorigin='anonymous'>
            <title>A Job Opening!</title>
        </head>
        <body>
            <div class='container'>
                <h1>" . $title . "</h1>
                <p>" . $description . "</p>
                <p> Contact: </p>
                <ul>
                    <li>Email Contact: <a href='mailto:" . $currentContact->getContactEmail() . "'>" . $currentContact->getContactName() . "</a></li>
                    <li>Phone Contact: " . $currentContact->getPhoneNumber() . "</li>
            </div>
        </body>
        </html>
          ";
    });

    return $app;
?>
