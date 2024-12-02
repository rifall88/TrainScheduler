const stasiunAsal = ['Malang Station', 'Probolinggo Station', 'Surabaya Station', 'Yogyakarta Station'];
const stasiunTujuan = {
    'Malang Station': ['Probolinggo Station', 'Surabaya Station', 'Yogyakarta Station'],
    'Probolinggo Station': ['Malang Station', 'Surabaya Station', 'Yogyakarta Station'],
    'Surabaya Station': ['Malang Station', 'Probolinggo Station', 'Yogyakarta Station'],
    'Yogyakarta Station': ['Malang Station', 'Probolinggo Station', 'Surabaya Station']
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
    tujuanSelect.disabled = !selectedAsal;

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
