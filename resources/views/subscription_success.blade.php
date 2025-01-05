<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Success</title>
    <link rel="icon" type="image/png" href="{{asset('assets/icon.png')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Reset some default browser styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background:  linear-gradient(105deg, rgba(91,104,235,1) 0%, rgba(40,225,253,1) 100%);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 2s ease-out;
        }

        .alert {
            margin-bottom: 1.5rem;
        }

        h4 {
            font-size: 2rem;
            margin-bottom: 1rem;
            animation: bounceIn 1s;
        }

        p {
            font-size: 1.2rem;
            animation: slideInUp 1.5s;
        }

        .spinner {
            margin: 1.5rem auto;
            width: 50px;
            height: 50px;
            border: 6px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes bounceIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-success">
            <i class="fas fa-check-circle fa-3x" style="color: #4CAF50;"></i>
            <h4>Subscription Created Successfully!</h4>
            <p>You will be redirected to your dashboard in <strong>5 seconds</strong>...</p>
        </div>
        <div class="spinner"></div>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ route('dashboard') }}";
        }, 7000);
    </script>
</body>
</html>
