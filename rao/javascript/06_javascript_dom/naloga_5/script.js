const heightInput = document.getElementById('height-input');
const weightInput = document.getElementById('weight-input');
const addButton = document.getElementById('add-button');
const table = document.getElementById('table');

function calculateBMI(height, weight) {
  return Math.round((weight / Math.pow(height, 2)) * 10) / 10;
}

addButton.addEventListener('click', () => {
  const bmi = calculateBMI(heightInput.value, weightInput.value);

  const tr = document.createElement('tr');
  if (bmi < 16 || bmi >= 30) {
    tr.style.backgroundColor = 'red';
  }

  const heightTd = document.createElement('td');
  heightTd.appendChild(document.createTextNode(heightInput.value));
  tr.appendChild(heightTd);

  const weightTd = document.createElement('td');
  weightTd.appendChild(document.createTextNode(weightInput.value));
  tr.appendChild(weightTd);

  const bmiTd = document.createElement('td');
  bmiTd.appendChild(document.createTextNode(bmi));
  tr.appendChild(bmiTd);

  table.appendChild(tr);
});
