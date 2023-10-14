<?php
include "AES.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AES Encryption Tool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('security.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn-success {
            background-color: #28a745;
            font-weight: bold;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .footer {
            text-align: center;
            color: white;
            margin-top: 20px;
            padding: 10px;
        }

        .info-box {
            background-color: #343a40;
            color: white;
            border-radius: 5px;
            padding: 15px;
            margin-top: 20px;
            text-align: center;
        }

        .info-box i {
            font-size: 36px;
        }


        .names {
        margin-top: 10px;
        }

        .names p {
        margin: 5px 0;
        }

        .result-box {
        background-color: #007BFF;
        color: white;
        padding: 10px;
        margin-top: 20px;
        border-radius: 5px;
        text-align: center;
        }

        .result-box strong {
        font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-4 offset-lg-4 offset-md-2">
                <div class="card card-default">
                    <div class="card-header">
                        AES Encryption Tool
                    </div>
                    <div class="card-body">
                        <div class="logo">
                             <img src="aes.jpg" alt="Logo AES" style="width: 150px; height: 150px; margin-center: 20px;">
                        </div>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="form-group">
                                <label for="text">Text :</label>
                                <input type="text" name="text" id="text" class="form-control" value="<?php if(isset($_POST['text'])) echo $_POST['text']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="key">Key :</label>
                                <input type="text" name="key" id="key" class="form-control" value="<?php if(isset($_POST['key'])) echo $_POST['key']; ?>">
                            </div>
                            <div class="form-group">
                                 <label for="type">Type :</label>
                                 <select name="type" id="type" class="form-control">
                                     <option value="1" <?php if(isset($_POST['type']) && $_POST['type'] == '1') echo 'selected'; ?>>Encrypt</option>
                                     <option value="2" <?php if(isset($_POST['type']) && $_POST['type'] == '2') echo 'selected'; ?>>Decrypt</option>
                                 </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success btn-block">Process</button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {
                            $type = $_POST['type'];
                            $key = $_POST['key'];
                            $text = $_POST['text'];
                            $blockSize = 256;
                            switch ($type) {
                                case '1':
                                    $aes = new AES($text, $key, $blockSize);
                                    $encryptedText = $aes->encrypt($text);
                                    echo '<div class="result-box">';
                                    echo "Encrypted Result: <strong>" . $encryptedText . "</strong>";
                                    echo '</div>';
                                    break;
                                case '2':
                                    $aes = new AES($text, $key, $blockSize);
                                    $decryptedText = $aes->decrypt();
                                    echo '<div class="result-box">';
                                    echo "Decrypted Result: <strong>" . $decryptedText . "</strong>";
                                    echo '</div>';
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="info-box">
                    <i class="fas fa-code"></i>
                    <p>This is an AES encryption tool, Let's Try it.</p>
                    <div class="names">
                        <p>Created By: SI-7B</p>
                        <p>Muhammad Jiddan Gumilang</p>
                        <p>Irfan Nur Rizki</p>
                        <p>Dwi Oktaviani Arifin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date('Y'); ?> Jiddan,Via,Irfan
    </div>
</body>
</html>