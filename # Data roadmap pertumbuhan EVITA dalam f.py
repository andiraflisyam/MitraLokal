# Data roadmap pertumbuhan EVITA dalam format dictionary
roadmap_data = {
    'Tahun 1 (2025)': {
        'Fase': 'Validasi dan Pilot Project Awal',
        'Target Utama': 'Mengamankan 1 klien pilot berbayar di Makassar.',
        'Indikator Kuantitatif': {
            'CSI': '>80%',
            'Interaksi Bulanan': '>5.000',
            'Penyelesaian Otomatis': '>55%',
            'ARR': 'Rp15 juta – Rp30 juta'
        },
        'Capaian Kualitatif': [
            'Terciptanya MVP yang fungsional',
            'Mendapatkan testimoni positif dari klien',
            'Pembangunan keahlian teknis tim'
        ]
    },
    'Tahun 2 (2026)': {
        'Fase': 'Pengembangan Produk dan Ekspansi Lokal',
        'Target Utama': 'Mengakuisisi tambahan 2 klien baru di Makassar, total 3 klien aktif.',
        'Indikator Kuantitatif': {
            'Klien Aktif': '3 instansi',
            'Interaksi Bulanan': '>30.000',
            'Retensi Klien': '>80%',
            'ARR': 'Rp80 juta – Rp180 juta'
        },
        'Capaian Kualitatif': [
            'Fitur produk menjadi lebih stabil dan lengkap',
            'Dimulainya integrasi API dasar dengan sistem klien',
            'Peningkatan brand awareness'
        ]
    },
    'Tahun 3 (2027)': {
        'Fase': 'Pertumbuhan Regional dan Penguatan Posisi',
        'Target Utama': 'Mencapai 5-7 klien aktif dan memulai ekspansi ke provinsi tetangga.',
        'Indikator Kuantitatif': {
            'Klien Aktif': '>6 instansi',
            'Interaksi Bulanan': '>150.000',
            'Pangsa Pasar': '3-5%',
            'ARR': 'Rp300 juta – Rp500 juta'
        },
        'Capaian Kualitatif': [
            'Diakui sebagai solusi inovatif',
            'Potensi kemitraan strategis',
            'Pengembangan fitur AI yang lebih canggih'
        ]
    }
}

# Fungsi untuk mencetak data roadmap dengan format yang rapi
def print_roadmap(roadmap_data):
    for tahun, data in roadmap_data.items():
        print(f"--- {tahun}: {data['Fase']} ---")
        print(f"  Target Utama: {data['Target Utama']}")
        print("  Indikator Kuantitatif:")
        for key, value in data['Indikator Kuantitatif'].items():
            print(f"    - {key}: {value}")
        print("  Capaian Kualitatif:")
        for capaian in data['Capaian Kualitatif']:
            print(f"    - {capaian}")
        print("\n")

# Menjalankan fungsi untuk mencetak roadmap
print_roadmap(roadmap_data)