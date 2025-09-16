<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0d47a1, #1976d2);
            color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            color: #333;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-3px);
        }

        h1 {
            text-align: center;
            color: #1565c0;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #1565c0;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #90caf9;
            border-radius: 6px;
            box-sizing: border-box;
            background-color: #f0f8ff;
            color: #333;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus {
            border-color: #1565c0;
            box-shadow: 0 0 6px rgba(21, 101, 192, 0.5);
            outline: none;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin: 15px 0;
            font-size: 0.95rem;
            color: #333;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #1565c0;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        button:hover {
            background-color: #0d47a1;
        }

        button:active {
            transform: scale(0.98);
        }

        @media (max-width: 480px) {
            .container {
                padding: 25px;
            }
            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <main>
        <section class="container">
            <h1>Cadastro de Usuário</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="usuario">Usuário:</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="lembretes" name="lembretes">
                    <label for="lembretes">Receber e-mail de lembretes</label>
                </div>
                <button type="submit">Próximo</button>
            </form>
        </section>
    </main>
</body>
</html>
