<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Eventos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0a3d62, #3c6382);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 15px;
        }

        .container {
            background: #fff;
            max-width: 650px;
            width: 100%;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        h1 {
            text-align: center;
            color: #0a3d62;
            margin-bottom: 25px;
        }

        h2 {
            margin: 20px 0 15px;
            color: #3c6382;
            font-size: 20px;
            border-bottom: 2px solid #dcdde1;
            padding-bottom: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #0a3d62;
            margin-bottom: 6px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            background-color: #f9f9f9;
            transition: 0.2s ease;
        }

        input:focus, textarea:focus {
            border-color: #3c6382;
            background-color: #ffffff;
            box-shadow: 0 0 6px rgba(60, 99, 130, 0.4);
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #3c6382, #0a3d62);
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #0a3d62, #3c6382);
        }

        #listaEvento {
            margin-top: 20px;
            padding: 15px;
            background: #f1f2f6;
            border-radius: 10px;
        }

        .evento {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            margin-bottom: 8px;
            background: #fff;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }

        .evento span {
            font-size: 16px;
            font-weight: 500;
            color: #2c3e50;
        }

        .btnDelete {
            background: #c0392b;
            color: #fff;
            border: none;
            width: 28px;
            height: 28px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #mensagemSemEvento {
            color: #666;
            font-style: italic;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Registro de Eventos</h1>

        <!-- Registro -->
        <div>
            <h2>Novo Evento</h2>
            <div class="form-group">
                <label for="dataEvento">Data:</label>
                <input type="date" id="dataEvento">
            </div>

            <div class="form-group">
                <label for="descricaoEvento">Descrição:</label>
                <textarea id="descricaoEvento" rows="3" placeholder="Ex: Aniversário da Maria, Reunião de equipe..."></textarea>
            </div>

            <button onclick="addEvent()">Adicionar Evento</button>
        </div>

        <!-- Lista -->
        <div id="listaEvento">
            <h2>Eventos Agendados</h2>
            <p id="mensagemSemEvento">Nenhum evento agendado ainda.</p>
        </div>
    </div>

    <script>
    let events = JSON.parse(localStorage.getItem("events")) || [];

    // Carregar eventos ao abrir a página
    window.onload = () => {
        if (events.length > 0) {
            renderEvents();
        }
    };

    function addEvent() {
        const dateInput = document.getElementById('dataEvento');
        const descriptionInput = document.getElementById('descricaoEvento');
        const date = dateInput.value;
        const description = descriptionInput.value.trim();

        if (date === "" || description === "") {
            alert("Por favor, preencha a data e a descrição.");
            return;
        }

        // Valida se a data é no passado
        const today = new Date().toISOString().split("T")[0];
        if (date < today) {
            alert("Não é possível cadastrar eventos em datas passadas.");
            return;
        }

        events.push({ date, description });

        // Ordenar por data
        events.sort((a, b) => a.date.localeCompare(b.date));

        // Salvar no localStorage
        localStorage.setItem("events", JSON.stringify(events));

        // Atualizar a lista
        renderEvents();

        dateInput.value = "";
        descriptionInput.value = "";
    }

    function renderEvents() {
        const eventsList = document.getElementById('listaEvento');
        eventsList.innerHTML = "<h2>Eventos Agendados</h2>";

        if (events.length === 0) {
            const msg = document.createElement("p");
            msg.id = "mensagemSemEvento";
            msg.textContent = "Nenhum evento agendado ainda.";
            eventsList.appendChild(msg);
            return;
        }

        // Botão excluir todos
        const btnExcluirTodos = document.createElement("button");
        btnExcluirTodos.textContent = "Excluir Todos";
        btnExcluirTodos.style.marginBottom = "15px";
        btnExcluirTodos.onclick = () => {
            if (confirm("Tem certeza que deseja excluir todos os eventos?")) {
                events = [];
                localStorage.removeItem("events");
                renderEvents();
            }
        };
        eventsList.appendChild(btnExcluirTodos);

        // Renderizar cada evento
        events.forEach(ev => {
            const div = document.createElement("div");
            div.className = "evento";

            const span = document.createElement("span");
            span.textContent = `${ev.date} - ${ev.description}`;

            const btnDelete = document.createElement("button");
            btnDelete.className = "btnDelete";
            btnDelete.textContent = "X";
            btnDelete.title = "Excluir este evento";
            btnDelete.onclick = () => {
                events = events.filter(e => !(e.date === ev.date && e.description === ev.description));
                localStorage.setItem("events", JSON.stringify(events));
                renderEvents();
            };

            div.appendChild(span);
            div.appendChild(btnDelete);
            eventsList.appendChild(div);
        });
    }
    </script>
</body>
</html>
