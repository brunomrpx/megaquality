function Item(properties) {		
	var id = properties.id || null,
		element = properties.element || null,
		projectId = properties.projectId || null,
		status = null; 		
	
	element.addEventListener('click', save);	
	
	function save() {

		console.log(element);
		status = element.checked.toString();		
		
		var url = '../../items/update_status/' + id;

		$(element).hide();
		$(element).next().toggleClass('hide');
		
		$.post(url,  { status: status, projectId: projectId })
		 .done(function(inserted) {			
			setTimeout(function() {
				$(element).next().toggleClass('hide');
				$(element).show();
			}, 1000);			
		 });
	}	
}