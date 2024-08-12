<?php include ('conn/conn.php'); ?>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: birthdaylogin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="image-gallery-app/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        /* Your existing styles here */
        .sidebar {
            background: #301c2a;
        }

        .event-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .event-item {
            flex: 1 1 300px;
            max-width: 120px;
            height: 120px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .event-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }

        .event-item input {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .modal-content img {
            width: 100%;
            height: auto;
        }
        
        .card:nth-child(1) {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 100%;
        }
       
         .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 300px;
        }
        .card h2 {
            font-size: 2.5em;
            color: #a3087a;
            margin: 0;
        }
        .card p {
            font-size: 0.8em;
            color: #333;
        }
        .icon {
            font-size: 3em;
            color: #a3087a;
            margin-bottom: 10px;
        }
        .confetti {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .confetti i {
            font-size: 2em;
            color: #a3087a;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.html">
                <img src="../assets/img/logo.png" alt="Logo"/>
            </a>
        </nav>
        <h2>50<sup style="color:#a3087a">th </sup>Kemi’s Birthday <span style="color:#a3087a">Anniversary</span></h2>
        <h4><?php echo htmlspecialchars($_SESSION['username']); ?></h4>
    </header>
    <div class="container">
        <?php include "endpoint/side.php";?>
        <div class="main-content">
                     <div class="event-grid">
            <div class="card">
                <h2> Thanksgiving Pictures</h2>
                <h4>Happy 50th Birthday, Kemi!</h4>
                <p>Wishing you joy, love, and happiness on this special day!</p>
                <div class="confetti">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-heart"></i>
                    <i class="fas fa-gift"></i>
                </div>
            </div>
            <div class="card">
                <h2> Pictures</h2>
                <p>check out the Thanksgiving Pictures here!</p>
                <div class="icon">
                    <i class="fas fa-smile"></i>
                </div>
            </div>
            <div class="card">
                <h2>Slide!</h2>
                <p>check out the Thanksgiving Slide here!</p>
                <div class="icon">
                    <i class="fas fa-glass-cheers"></i>
                </div>
            </div>
            <div class="card">
                <h2>Video</h2>
                <p>check out the Thanksgiving Video here!</p>
                <div class="icon">
                    <i class="fas fa-birthday-cake"></i>
                </div>
            </div>
        </div>
        </div>
    </div>
   
</body>

</html>
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>