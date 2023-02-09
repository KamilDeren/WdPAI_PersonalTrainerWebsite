const search = document.querySelector('input[placeholder="Wyszukaj trening"]');
const trainingsSearch = document.querySelector(".selector");
const tableHeader = "<tr><th>Tytuł</th><th>Poziom</th><th>Godzina</th><th>Gdzie</th><th>Trener</th><th>Zapisz się!</th></tr>";

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (trainings) {
            trainingsSearch.innerHTML = tableHeader;
            loadTrainings(trainings)
        });
    }
});

function loadTrainings(trainings) {
    trainings.forEach(training => {
        console.log(training);
        createTraining(training);
    });
}

function createTraining(training) {
    const template = document.querySelector("#training-template");
    const clone = template.content.cloneNode(true);

    const title = clone.querySelector("td:nth-child(1)");
    title.innerHTML = training.title;
    const level = clone.querySelector("td:nth-child(2)");
    level.innerHTML = training.level;
    const date = clone.querySelector("td:nth-child(3)");
    date.innerHTML = training.date;
    const room = clone.querySelector("td:nth-child(4)");
    room.innerHTML = training.room;
    const runby = clone.querySelector("td:nth-child(5)");
    runby.innerHTML = training.run_by;

    trainingsSearch.appendChild(clone);
}