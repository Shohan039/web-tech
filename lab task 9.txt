 Previous or Next buttons

PHP
<div id="results-container">
</div>
<div id="pagination-container">
  <button id="previous-button">Previous</button>
  <button id="next-button">Next</button>
</div>

CSS
#pagination-container {
  margin: 15px 0;
}

#previous-button,
#next-button {
  padding: 10px 15px;
  border-radius: 15px;
  border: 1px solid black;
  cursor: pointer;
}

#previous-button[disabled],
#next-button[disabled] {
  opacity: 0.10;
  cursor: not-allowed;
}

#results-container {
  list-style: none;
  padding: 0;
}

#result-item {
  margin: 15px;
  padding: 15px;
  border: 1px solid black;
  border-radius: 10px;
}

JS

const resultsContainer = document.querySelector('#results-container');
const previousButton = document.querySelector('#previous-button');
const nextButton = document.querySelector('#next-button');

let page = 1;

loadData(page);

function loadData(page) {
    .then(response => response.json())
    .then(data => {
      // Render data items
      resultsContainer.innerHTML = '';
      data.forEach(item => {
        const itemElement = document.createElement('li');
        itemElement.className = 'result-item';
        itemElement.textContent = item.name;
        resultsContainer.appendChild(itemElement);
      });
    });
}

previousButton.addEventListener('click', () => {
  if (page > 1) {
    page--;
    loadData(page);
  }
});


nextButton.addEventListener('click', () => {
  page++;
  loadData(page);
});

