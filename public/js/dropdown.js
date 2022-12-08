function toggleDisplay(elem){
	const curDisplayStyle = elem.style.display;			
				
	if (curDisplayStyle === 'none' || curDisplayStyle === ''){
		elem.style.display = 'block';
	}
	else{
		elem.style.display = 'none';
	}
}

function toggleDrop(element) {
	var dropdown = element.parentNode;
	const selected = dropdown.querySelector('.dropdown');
	toggleDisplay(selected);
  }