


  const exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const idTask = button.getAttribute('data-bs-whatever-id');
    const descTask = button.getAttribute('data-bs-whatever-desc');
    
    const modalTitle = exampleModal.querySelector('.modal-title');

    const modalBodyInput = exampleModal.querySelector('.modal-body input');
    const modalBodyInputId = exampleModal.querySelector('.hiddenId');
    modalBodyInputId.value = idTask
    //console.log(idTask);
    modalTitle.textContent = `ID da Tarefa: ${idTask}`

    modalBodyInput.value = descTask
  });

  