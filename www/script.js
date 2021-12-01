
function openModal() {

    var myModal = document.getElementById('playerModal')
    var myInput = document.getElementById('myBtn')

    myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
    })

}