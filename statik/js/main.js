  function deleteRow(button) {
    var row = button.closest('tr');
    var quantityCell = row.querySelector('[data-title="Количество"]');
    var quantity = parseInt(quantityCell.innerText);
    quantity = Math.max(0, quantity - 1);
    quantityCell.innerText = quantity;
    if (quantity === 0) {
      row.remove();
    }
  }
  
function AddRow(button) {
    var row = button.closest('tr');
    var quantityCell = row.querySelector('[data-title="Количество"]');
    var quantity = parseInt(quantityCell.innerText);

    // Increment the quantity by 1
    quantity = quantity + 1;

    // Update the quantity value in the cell
    quantityCell.innerText = quantity;
	
	
	
	
}






  
  // изменения цвета сердце
   function changeColor(event) {
    var heartIcon = event.currentTarget.querySelector('.bi-heart-fill');

    if (heartIcon.style.color === 'red') {
      heartIcon.style.color = '#000000'; // Черный цвет
    } else {
      heartIcon.style.color = 'red'; // Красный цвет
    }
  } 
