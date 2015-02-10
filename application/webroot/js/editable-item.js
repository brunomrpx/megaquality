var EditableItem = function(properties) {
    var element = properties.element || null;
    var body = document.querySelector('body');

    element.addEventListener('click', makeEditable);
    addDocumentEvents();

    function getEditingElement() {
        return document.querySelector('.editable-item.selected-item');
    }

    function hasItemInEdition() {
        var editingItem = getEditingElement(); 
        return (typeof editingItem != 'undefined');
    }

    function removeEditable(element) {
        $(element).show();
        $(element).next('input').detach();
        $(element).next('span').detach();
        $(element).removeClass('selected-item');
    }

    function removeDocumentEvents() {
        $(document).unbind();
    }

    function addDocumentEvents() {
        $(document).unbind().on('click', function(event) {
            var selectedElement = getEditingElement(),
                targetElement = event.target,
                targetIsEditableItem = $(targetElement).hasClass('editable-item'),
                targetTagName = $(targetElement).prop('tagName').toLowerCase();

            if (hasItemInEdition() && !targetIsEditableItem && targetTagName !== 'input' && targetTagName !== 'button') {
                removeEditable(selectedElement);
            }
        });
    }

    function makeEditable() {
        var element = this,
            content = element.innerHTML,
            id = element.getAttribute('data-id');
            type = element.getAttribute('data-type'),
            input = '<input type="text" value="' + content  + '" class="form-control edited-content">' +
                    '<span class="input-group-btn">' +
                        '<button class="btn btn-primary save-button" type="button">Salvar</button>' +
                    '</span>';
        
        if (hasItemInEdition()) {
            removeEditable(getEditingElement()); 
        }

        $(element).addClass('selected-item');
        $(element).after(input);
        
        var saveButton = document.querySelector(".save-button");
        saveButton.addEventListener('click', function() {
            var editedContentInput = document.querySelector(".edited-content"),
                url = '../../' + type + '/edit/' + id;

            editedContentInput.disabled = 'disabled';
            saveButton.disabled = 'disabled';
            body.style.pointerEvents = 'none';
            removeDocumentEvents();

            $.post(url, { editedContent: editedContentInput.value })
            .done(function(result) {			
                var inserted = (result == 1);
                if (inserted) {
                    element.innerHTML = editedContentInput.value;
                    setTimeout(function() {
                        removeEditable(element);
                        body.style.pointerEvents = 'auto';
                        addDocumentEvents();
                    }, 2000);
                }
            });
        });

        $(this).hide();
    }
}

