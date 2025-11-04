document.addEventListener("DOMContentLoaded", async function () {
    const API_SYMBOLS =
        "https://api.exchangeratesapi.io/v1/latest?access_key=689d6718a7bc5b8a0ff57b2935bacd93";
    const API_HISTORICO = "/api/historico";
    const API_SALVAR = "/api/conversoes";
    const token = localStorage.getItem("access_token");

    let resultadoAtual = null;
    let paginaAtual = 1;
    const porPagina = 10;

    const moedaOrigem = document.getElementById("moedaOrigem");
    const moedaDestino = document.getElementById("moedaDestino");
    const valorInput = document.getElementById("valor");
    const resultadoDiv = document.getElementById("resultadoConversao");
    const tabelaBody = document.getElementById("tabelaHistorico");
    const paginacao = document.getElementById("paginacao");

    // Conversão
    let taxas = {}; // Salvar aqui o resultado da API de rates

    // Após carregar as moedas e taxas da API
    const res = await fetch(API_SYMBOLS);
    const data = await res.json();

    const moedas = Object.keys(data.rates).sort();

    moedas.forEach((code) => {
        const option = new Option(code, code);
        moedaOrigem.appendChild(option.cloneNode(true));
        moedaDestino.appendChild(option.cloneNode(true));
    });
    taxas = data.rates;

    // Ao clicar em converter
    document.getElementById("converterBtn").addEventListener("click", () => {
        const de = moedaOrigem.value;
        const para = moedaDestino.value;
        const valor = parseFloat(valorInput.value);

        if (!de || !para || isNaN(valor)) return alert("Campos inválidos");

        const taxaDe = taxas[de];
        const taxaPara = taxas[para];

        if (!taxaDe || !taxaPara) return alert("Moeda não encontrada");

        const convertido = (valor / taxaDe) * taxaPara;
        const taxaFinal = convertido / valor;

        resultadoAtual = {
            moeda_origem: de,
            moeda_destino: para,
            valor,
            convertido
        };

        resultadoDiv.value = convertido.toFixed(2);
    });

    // Salvar conversão
    document.getElementById("salvarBtn").addEventListener("click", async () => {
        if (!resultadoAtual) return alert("Nenhuma conversão realizada ainda.");

        try {
            const res = await fetch(API_SALVAR, {
                method: "POST",
                headers: {
                    Authorization: `Bearer ${token}`,
                    Accept: "application/json",
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(resultadoAtual),
            });

            if (!res.ok) throw new Error();

            alert("Conversão salva com sucesso!");
            carregarHistorico();
        } catch (err) {
            alert("Erro ao salvar conversão");
        }
    });

    // Paginação
    function renderTabela(dados) {
        tabelaBody.innerHTML = "";
        dados.forEach((item) => {
            tabelaBody.innerHTML += `
        <tr>
          <td>${item.moeda_origem}</td>
          <td>$ ${item.valor.toFixed(2)}</td> 
          <td>PARA</td> 
          <td>${item.moeda_destino}</td>
          <td>$ ${item.convertido.toFixed()}</td> 
        </tr>
      `;
        });
    }

    function renderPaginacao(total, porPagina, paginaAtual) {
        const totalPaginas = Math.ceil(total / porPagina);
        paginacao.innerHTML = "";
        for (let i = 1; i <= totalPaginas; i++) {
            const li = document.createElement("li");
            li.className = `page-item ${i === paginaAtual ? "active" : ""}`;
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener("click", () => {
                paginaAtual = i;
                carregarHistorico();
            });
            paginacao.appendChild(li);
        }
    }

    async function carregarHistorico() {
        try {
            const res = await fetch(API_HISTORICO, {
                headers: {
                    Authorization: `Bearer ${token}`,
                    Accept: "application/json",
                },
            });

            const data = await res.json();
            const inicio = (paginaAtual - 1) * porPagina;
            const fim = inicio + porPagina;
            const dadosPagina = data.slice(inicio, fim);

            renderTabela(dadosPagina);
            renderPaginacao(data.length, porPagina, paginaAtual);
        } catch (err) {
            alert("Erro ao carregar histórico.");
        }
    }

    // Carrega histórico assim que abrir a página
    carregarHistorico();
});
