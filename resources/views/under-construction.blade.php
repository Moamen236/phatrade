<!-- resources/views/under-construction.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction - Coming Soon</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #f1c40f;
            --text-color: #34495e;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .construction-container {
            max-width: 800px;
            padding: 2rem;
            text-align: center;
        }

        .logo-container {
            margin-bottom: 2rem;
        }

        .logo-container img {
            max-width: 400px;
            height: auto;
            margin-bottom: 1rem;
        }

        .construction-icon {
            font-size: 4rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            animation: bounce 2s infinite;
        }

        .message-container {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        h1 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .subtitle {
            color: var(--secondary-color);
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .progress-container {
            margin: 2rem 0;
        }

        .progress {
            height: 10px;
            border-radius: 5px;
        }

        .social-links {
            margin-top: 2rem;
        }

        .social-links a {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--secondary-color);
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @media (max-width: 768px) {
            .construction-container {
                padding: 1rem;
            }
            
            .message-container {
                padding: 1.5rem;
            }
            
            .construction-icon {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="construction-container">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="img-fluid">
        </div>
        
        <div class="message-container">
            <i class="fas fa-hard-hat construction-icon"></i>
            <h1>We're Building Something Amazing!</h1>
            <p class="subtitle">Our website is under construction</p>
            <p class="lead">We're working hard to bring you an enhanced experience. Please check back soon!</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
