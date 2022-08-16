
const myModal = document.getElementById('editModal')
const btnTarefa = document.getElementById('inputTarefa')

myModal.addEventListener('shown.bs.modal', (e) => {
    let idTask = e.currentTarget.getAttribute('data-bs-id_task');
    let deskTask = e.currentTarget.getAttribute('data-bs-desc_tarefa');
    console.log(e);
  btnTarefa.focus()
})


