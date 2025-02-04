const apiKey = "83972124-7788-432e-b935-361ed0b4ab3c"; // Ваш API-ключ

searchButton.addEventListener("click", async (e) => {
    e.preventDefault();

    const from = inputs[0].value.trim();
    const to = inputs[1].value.trim();
    const date = inputs[2].value.trim();

    if (!from || !to || !date) {
        alert("Пожалуйста, заполните все поля!");
        return;
    }

    try {
        const url = `https://api.rasp.yandex.net/v3.0/search/?apikey=${apiKey}&format=json&from=${encodeURIComponent(from)}&to=${encodeURIComponent(to)}&date=${encodeURIComponent(date)}&lang=ru_RU`;
        const response = await fetch(url);

        if (!response.ok) {
            throw new Error("Не удалось получить данные");
        }

        const resultData = await response.json();
        resultsContainer.innerHTML = generateResultHTML(resultData);
    } catch (error) {
        console.error("Ошибка:", error.message);
        alert("Произошла ошибка при загрузке данных. Попробуйте позже.");
    }
});
