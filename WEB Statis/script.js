function showSection(sectionId) {
    const sections = ['biodata', 'pendidikan', 'kontak'];
    sections.forEach(id => {
        document.getElementById(id).style.display = (id === sectionId) ? 'block' : 'none';
    });
    // Update active menu
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    if (sectionId === 'biodata') {
        document.querySelector('.nav-link[href="#"]').classList.add('active');
    } else if (sectionId === 'pendidikan') {
        document.querySelectorAll('.nav-link')[1].classList.add('active');
    } else if (sectionId === 'kontak') {
        document.querySelectorAll('.nav-link')[2].classList.add('active');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Load data jika ada di localStorage
    const saved = localStorage.getItem('biodata');
    if (saved) {
        showBiodata(JSON.parse(saved));
    }

    const form = document.getElementById('biodataForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const data = {
                nama: document.getElementById('nama').value,
                ttl: document.getElementById('ttl').value,
                jk: document.getElementById('jk').value,
                alamat: document.getElementById('alamat').value
            };
            localStorage.setItem('biodata', JSON.stringify(data));
            showBiodata(data);
        });
    }

    // Pendidikan
    const pendidikanSaved = localStorage.getItem('pendidikan');
    if (pendidikanSaved) {
        showPendidikan(JSON.parse(pendidikanSaved));
    }
    const pendidikanForm = document.getElementById('pendidikanForm');
    if (pendidikanForm) {
        pendidikanForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const data = {
                sd: document.getElementById('sd').value,
                smp: document.getElementById('smp').value,
                sma: document.getElementById('sma').value,
                kuliah: document.getElementById('kuliah').value
            };
            localStorage.setItem('pendidikan', JSON.stringify(data));
            showPendidikan(data);
        });
    }

    // Kontak
    const kontakSaved = localStorage.getItem('kontak');
    if (kontakSaved) {
        showKontak(JSON.parse(kontakSaved));
    }
    const kontakForm = document.getElementById('kontakForm');
    if (kontakForm) {
        kontakForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const data = {
                email: document.getElementById('email').value,
                telepon: document.getElementById('telepon').value
            };
            localStorage.setItem('kontak', JSON.stringify(data));
            showKontak(data);
        });
    }
});

function showBiodata(data) {
    document.getElementById('dispNama').textContent = data.nama;
    document.getElementById('dispTtl').textContent = data.ttl;
    document.getElementById('dispJk').textContent = data.jk;
    document.getElementById('dispAlamat').textContent = data.alamat;
    document.getElementById('biodataDisplay').style.display = 'block';
}

function showPendidikan(data) {
    document.getElementById('dispSd').textContent = data.sd;
    document.getElementById('dispSmp').textContent = data.smp;
    document.getElementById('dispSma').textContent = data.sma;
    document.getElementById('dispKuliah').textContent = data.kuliah;
    document.getElementById('pendidikanDisplay').style.display = 'block';
}

function showKontak(data) {
    document.getElementById('dispEmail').textContent = data.email;
    document.getElementById('dispTelepon').textContent = data.telepon;
    document.getElementById('kontakDisplay').style.display = 'block';
}
