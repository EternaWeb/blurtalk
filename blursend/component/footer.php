<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        footer {
            background-color:rgb(26, 24, 48);
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            width: 100%;
            border-radius: 15px;
            padding-top: 20px;
            margin-top: 20px;
        }

        nav {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        nav a {
            color: #9ca3af;
            text-decoration: none;
            font-size: 16px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            transition: color 0.2s ease;
        }

        nav a:hover {
            color: #ffffff;
        }

        .logo {
            width: 80px;
            height: auto;
        }

        .copyright {
            color: #6b7280;
            font-size: 14px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
    </style>
</head>
<body>
    <footer>
        <nav>
            <a href="#explore">Explore</a>
            <a href="#about">Rreth Blur</a>
            <a href="#create">Krijo Postim</a>
        </nav>
        
        <img src="Untitled (93).png" alt="Blur Logo" class="logo">
        
        <span class="copyright">2035 Blur Project by Ani</span>
    </footer>
</body>
</html>