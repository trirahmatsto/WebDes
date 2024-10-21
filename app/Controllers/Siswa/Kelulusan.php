<?php

namespace App\Controllers\Siswa;

use App\Models\Siswa_model;

class Kelulusan extends BaseController
{
    public function index()
    {
        checksiswa();
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($this->session->get('id_siswa'));

        $data = ['title' => $siswa['nama_lengkap'],
            'siswa'      => $siswa,
            'content'    => 'siswa/kelulusan/index',
        ];
        echo view('siswa/layout/wrapper', $data);
    }

    // Unduh
    public function unduh()
    {
        $m_siswa = new Siswa_model();
        $siswa   = $m_siswa->detail($this->session->get('id_siswa'));
        // Update hits
        return $this->response->download('../assets/upload/siswa/' . $siswa['skl'], null);
    }
}
