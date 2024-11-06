
const stasiunAsal = ['Malang', 'Probolinggo', 'Surabaya', 'Yogyakarta'];
const stasiunTujuan = {
    'Malang': ['Probolinggo', 'Surabaya', 'Yogyakarta'],
    'Probolinggo': ['Malang', 'Surabaya', 'Yogyakarta'],
    'Surabaya': ['Malang', 'Probolinggo', 'Yogyakarta'],
    'Yogyakarta': ['Malang', 'Probolinggo', 'Surabaya']
};

const asalSelect = document.getElementById('asal');
const tujuanSelect = document.getElementById('tujuan');

stasiunAsal.forEach(stasiun => {
    const option = document.createElement('option');
    option.value = stasiun;
    option.textContent = stasiun;
    asalSelect.appendChild(option);
});

asalSelect.addEventListener('change', function() {
    const selectedAsal = this.value;
    tujuanSelect.innerHTML = '';
    tujuanSelect.disabled = false;

    const optionDefault = document.createElement('option');
    optionDefault.value = '';
    optionDefault.textContent = 'Destination Station';
    tujuanSelect.appendChild(optionDefault);

    if (stasiunTujuan[selectedAsal]) {
        stasiunTujuan[selectedAsal].forEach(stasiun => {
            const option = document.createElement('option');
            option.value = stasiun;
            option.textContent = stasiun;
            tujuanSelect.appendChild(option);
        });
    }
});

function pesanTiket() {
    const asal = document.getElementById('asal').value;
    const tujuan = document.getElementById('tujuan').value;
    const tanggal = document.getElementById('tanggal').value;
    const kelas = document.getElementById('class').value;
    const dewasa = document.getElementById('dewasa').value;
    const infant = document.getElementById('infant').value;

    if (asal && tujuan && tanggal && kelas) {
        const tabelBody = document.getElementById('tabelbody');
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${asal}</td>
            <td>${tujuan}</td>
            <td>${kelas}</td>
            <td>${tanggal}</td>
            <td>Payment Completed</td>
        `;
        tabelBody.appendChild(newRow);
        showModal('Order Successful, Please Make Payment');
        document.getElementById('ticketForm').reset();
        tujuanSelect.disabled = true;
    } else {
        showModal('Please Complete All Data!');
    }
}
function showModal(message) {
    const modal = document.getElementById('modalAlert');
    const modalMessage = document.getElementById('modalMessage');
    modalMessage.textContent = message;
    modal.style.display = 'block';
}

document.querySelector('.close-btn').addEventListener('click', function() {
    document.getElementById('modalAlert').style.display = 'none';
});

document.getElementById('modalOkButton').addEventListener('click', function() {
    document.getElementById('modalAlert').style.display = 'none';
});

window.addEventListener('click', function(event) {
    const modal = document.getElementById('modalAlert');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});
