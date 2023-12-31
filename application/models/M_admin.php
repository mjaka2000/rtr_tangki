<?php

class M_admin extends CI_Model
{

  ####################################
  // CRUD
  ####################################

  public function insert($tabel, $data)
  {
    $this->db->insert($tabel, $data);
  }

  public function select($tabel)
  {
    $query = $this->db->get($tabel);
    return $query->result();
  }

  public function update($tabel, $data, $where)
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }

  public function delete($tabel, $where)
  {
    $this->db->where($where);
    $this->db->delete($tabel);
  }

  ####################################
  //! Old Query 
  ####################################
  public function numrows($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->get();
    return $query->num_rows();
  }

  public function get_data($tabel, $where)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($where)
      ->get();
    return $query->result();
  }
  ####################################
  //* New Query
  ####################################

  public function update_password($tabel, $where, $data) //* Update password
  {
    $this->db->where($where);
    $this->db->update($tabel, $data);
  }


  // public function get_data_avatar($tabel, $idusername)
  // {
  //   $query = $this->db->select('tb_avatar.*, tb_user.id AS id_user')
  //     ->join('tb_user', 'tb_avatar.id_user = tb_user.id')
  //     ->from('tb_avatar')
  //     ->get();
  //   return $query->result();
  // }
  public function get_data_avatar($tabel, $username)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where('username', $username)
      ->get();
    return $query->result();
  }

  public function update_avatar($where, $data)
  {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update('tb_avatar');
  }

  public function get_surat_tangki($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')
      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }


  public function filter_nopol_surat($tabel, $nopol)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = ' . $tabel . '.id_tangki')

      ->where_in('tb_tangki.nopol', $nopol)

      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }




  public function get_seri_ban($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)

      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_seri_ban.id_tangki')
      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }

  public function nopol_seri_ban($nopol)
  {
    // $nopol = $this->db->escape($nopol);
    $query = $this->db->select()
      ->from('tb_seri_ban')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_seri_ban.id_tangki')
      ->where_in('tb_tangki.nopol', $nopol)
      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }
  public function get_supir_tangki($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      // ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = ')


      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }

  public function get_sp_tangki($tabel)
  {
    $query = $this->db->select('*')
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      // ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = ')


      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }




  public function select_service_masuk($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')



      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }

  public function get_service_masuk($tabel, $where)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->where($where)


      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }


  public function select_perbaikan($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)

      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->order_by('tgl_perbaikan', 'asc')



      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }

  public function get_perbaikan($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      // ->where($where)

      // ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')

      ->get();
    return $query->result();
  }


  public function get_perbaikan_edit($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      // ->where($where)

      // ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')

      ->get();
    return $query->result();
  }

  ###############################
  public function select_perbaikanbulan1tahun($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)

      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->order_by('tgl_perbaikan', 'asc')



      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }



  ####################################
  //* Pengeluaran 
  ####################################
  public function select_pengeluaran($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_pengeluaran.id_tangki', 'left')

      ->get();
    return $query->result();
  }

  public function pengeluaran_periode($tabel, $bulan, $tahun, $nopol)
  {
    $bulan = $this->db->escape($bulan);
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);


    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_pengeluaran.id_tangki', 'left')

      ->where('MONTH (tanggal) =' . $bulan . ' AND YEAR (tanggal) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)
      // ->where('YEAR (tanggal_masuk)' . $tahun)
      // ->order_by('tanggal_masuk', 'asc')
      ->get();
    return $query->result();
  }

  public function sum_pengeluaranPeriode($tabel, $bulan, $tahun, $nopol)
  {
    $bulan = $this->db->escape($bulan);
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);
    $query = $this->db->select_sum('biaya_pengeluaran')
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_pengeluaran.id_tangki', 'left')
      ->where('MONTH (tanggal) =' . $bulan . ' AND YEAR (tanggal) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)
      ->get();
    return $query->result();
  }

  public function sum_pengeluaran($tabel)
  {
    $query = $this->db->select_sum('biaya_pengeluaran')
      ->from($tabel)
      ->get();
    return $query->result();
  }
  ####################################
  //* End Pengeluaran 
  ####################################


  public function get_exp_surat($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      // ->where($where)

      // ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      // ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = tb_exp_surat.id_tangki')
      // ->join('table_surat_tangki', 'table_surat_tangki.id_surat = tb_exp_surat.id_surat')
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')


      ->get();
    return $query->result();
  }

  public function ambil_exp_surat($tabel, $where)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($where)

      // ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      // ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = tb_exp_surat.id_tangki')
      ->join('table_surat_tangki', 'table_surat_tangki.id_surat = tb_exp_surat.id_surat')
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')


      ->get();
    return $query->result();
  }

  public function tabel_exp_surat($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      // ->where($where)

      // ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      // ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = tb_exp_surat.id_tangki')
      ->join('table_surat_tangki', 'table_surat_tangki.id_surat = tb_exp_surat.id_surat')
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')


      ->get();
    return $query->result();
  }


  ####################################
  //* Perbaikan
  ####################################


  public function perbaikan_periode($tabel, $bulan, $tahun, $nopol)
  {
    $bulan = $this->db->escape($bulan);
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);

    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')

      ->where('MONTH (tb_perbaikan.tgl_perbaikan) =' . $bulan)
      ->where('YEAR (tb_perbaikan.tgl_perbaikan) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)
      ->order_by('tgl_perbaikan', 'asc')
      ->get();
    return $query->result();
  }

  public function sum_perbaikan_periode($tabel, $bulan, $tahun, $nopol)
  {
    $bulan = $this->db->escape($bulan);
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);

    $query = $this->db->select_sum('biaya_perbaikan')
      ->from($tabel)
      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')

      ->where('MONTH (tb_perbaikan.tgl_perbaikan) =' . $bulan)
      ->where('YEAR (tb_perbaikan.tgl_perbaikan) =' . $tahun)

      ->where_in('tb_tangki.nopol', $nopol)


      ->get();
    return $query->result();
  }

  public function sum_perbaikan($tabel)
  {
    $query = $this->db->select_sum('biaya_perbaikan')
      ->from($tabel)
      ->get();
    return $query->result();
  }


  ##########################
  public function perbaikan_bulan1tahun($tabel, $tahun, $nopol)
  {
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);

    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')

      ->where('YEAR (tb_perbaikan.tgl_perbaikan) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)
      // ->where('YEAR (tanggal_masuk)' . $tahun)
      ->order_by('tgl_perbaikan', 'asc')
      ->get();
    return $query->result();
  }

  public function sum_perbaikan_bulan1tahun($tabel, $tahun, $nopol)
  {
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);

    $query = $this->db->select_sum('biaya_perbaikan')
      ->from($tabel)
      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')

      ->where('YEAR (tgl_perbaikan) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)

      ->get();
    return $query->result();
  }

  // public function perbaikan_bulan1tahun_bln($tabel, $bulan, $tahun, $nopol)
  // {
  //   // $bulan = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des');
  //   // $bulan = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
  //   // $bulan = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
  //   $bulan = $this->db->escape($bulan);
  //   $tahun = $this->db->escape($tahun);
  //   // $nopol = $this->db->escape($nopol);

  //   for ($i = 0; $i <= 11; $i++) {
  //     $query = $this->db->select('MONTH (tgl_perbaikan) =' . $bulan[$i]);
  //   }
  //   // $query = $this->db->select('MONTH (tgl_perbaikan) =' . $bulan);
  //   $this->db->from($tabel)
  //     ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
  //     ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
  //     ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
  //     ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki');
  //   // ->where('id_perbaikan');
  //   // for ($i = 0; $i <= 11; $i++) {

  //   //   $query = $this->db->where_not_in('MONTH (tgl_perbaikan) =' . $bulan[$i]);
  //   // $query = $this->db->group_by('MONTH (tgl_perbaikan) =' . $bulan[$i]);
  //   // }
  //   // $query = $this->db->where('MONTH (tgl_perbaikan) =' . $bulan);
  //   $query = $this->db->where('YEAR (tgl_perbaikan) =' . $tahun)
  //     ->where_in('tb_tangki.nopol', $nopol)
  //     // ->group_by('tb_perbaikan.id_perbaikan')
  //     // ->where('YEAR (tanggal_masuk)' . $tahun)
  //     ->order_by('tgl_perbaikan', 'asc')
  //     ->get();
  //   return $query->result();
  // }

  public function perbaikan_bulan1tahun_tgl($tabel, $bulan, $tahun, $nopol)
  {
    // $bulan = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des');
    // $bulan = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    $bulan = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
    $bulan = $this->db->escape($bulan);
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);

    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki');
    // ->where('id_perbaikan');
    // for ($i = 0; $i <= 11; $i++) {

    //   $query = $this->db->where_not_in('MONTH (tgl_perbaikan) =' . $bulan[$i]);
    // $query = $this->db->group_by('MONTH (tgl_perbaikan) =' . $bulan[$i]);
    // }
    // $query = $this->db->where('MONTH (tgl_perbaikan) =' . $bulan);
    $query = $this->db->where('YEAR (tgl_perbaikan) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)
      // ->group_by('tb_perbaikan.id_perbaikan')
      // ->where('YEAR (tanggal_masuk)' . $tahun)
      ->order_by('tgl_perbaikan', 'asc')
      ->get();
    return $query->result();
  }

  public function sum_perbaikan_bulan1tahun_tgl($tabel, $bulan, $tahun, $nopol)
  {
    // $bulan = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des');
    // $bulan = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    $bulan = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
    $bulan = $this->db->escape($bulan);
    $tahun = $this->db->escape($tahun);
    // $nopol = $this->db->escape($nopol);

    $query = $this->db->select_sum('biaya_perbaikan')
      ->from($tabel)
      ->join('tb_service_masuk', 'tb_service_masuk.id_service_masuk = tb_perbaikan.id_service_masuk')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_service_masuk.id_supir_tangki')
      ->join('tb_bengkel', 'tb_bengkel.id_bengkel = tb_service_masuk.id_bengkel')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki');
    // for ($i = 0; $i <= 11; $i++) {

    //   $query = $this->db->where_not_in('MONTH (tgl_perbaikan) =' . $bulan[$i]);
    // $query = $this->db->group_by('MONTH (tgl_perbaikan) =' . $bulan[$i]);
    // }
    // $query = $this->db->where('MONTH (tb_perbaikan.tgl_perbaikan) =' . $bulan);
    $query = $this->db->where('YEAR (tgl_perbaikan) =' . $tahun)
      ->where_in('tb_tangki.nopol', $nopol)
      // ->group_by('tb_perbaikan.id_perbaikan')


      ->get();
    return $query->result();
  }


  public function notif_exp_surat($tabel, $tgl)
  {

    $query = $this->db->select()
      ->from($tabel)
      // ->join('tb_genset', 'tb_genset.id_genset = tb_unit_keluar.id_genset')
      // ->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_unit_keluar.id_pelanggan')
      // ->where('status =', 1)
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')

      ->where('DATEDIFF(DATE_SUB(tanggal_expired, INTERVAL 1 DAY), "' . $tgl . '") <', 7)
      // ->where($where)
      ->get();
    return $query->result();
  }

  public function notif_exp_surat1($tabel, $tgl, $where)
  {

    $query = $this->db->select()
      ->from($tabel)
      // ->join('tb_genset', 'tb_genset.id_genset = tb_unit_keluar.id_genset')
      // ->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_unit_keluar.id_pelanggan')
      // ->where('status =', 1)
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')

      ->where('DATEDIFF(DATE_SUB(tanggal_expired, INTERVAL 1 DAY), "' . $tgl . '") <', 7)
      ->where($where)
      ->get();
    return $query->result();
  }

  public function notif_status_perbaikan($tabel, $where)
  {

    $query = $this->db->select()
      ->from($tabel)
      // ->join('tb_genset', 'tb_genset.id_genset = tb_unit_keluar.id_genset')
      // ->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_unit_keluar.id_pelanggan')
      // ->where('status =', 1)
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')

      // ->where('DATEDIFF(DATE_SUB(tanggal_expired, INTERVAL 1 DAY), "' . $tgl . '") <', 7)
      ->where($where)
      ->get();
    return $query->result();
  }

  public function notif_angka_exp($tabel, $tgl)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')
      // ->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan = tb_unit_keluar.id_pelanggan')
      // ->where('status =', 1)
      ->where('DATEDIFF(DATE_SUB(tanggal_expired, INTERVAL 1 DAY), "' . $tgl . '") <', 14)

      ->get();
    return $query->num_rows();
  }

  // END NOTIF
  public function get_angkutan($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      // ->where($where)

      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_angkutan.id_supir_tangki')
      ->join('tb_tujuan', 'tb_tujuan.id_tujuan = tb_angkutan.id_tujuan')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = tb_angkutan.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')


      ->get();
    return $query->result();
  }



  public function get_edit_angkutan($tabel, $where)
  {
    $query = $this->db->select()
      ->from($tabel)
      ->where($where)

      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_angkutan.id_supir_tangki')
      ->join('tb_tujuan', 'tb_tujuan.id_tujuan = tb_angkutan.id_tujuan')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')


      ->get();
    return $query->result();
  }


  //filter angkutan
  public function angkutan_periode($tgl_awal, $tgl_akhir, $nopol)
  {
    // 
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $query = $this->db->select()
      ->from('tb_angkutan')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_angkutan.id_supir_tangki')
      ->join('tb_tujuan', 'tb_tujuan.id_tujuan = tb_angkutan.id_tujuan')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      ->where('DATE (tgl_berangkat) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir)
      // ->where('tb_supir_tangki.id_tangki', $nopol)
      ->where_in('tb_tangki.nopol', $nopol)
      ->order_by('tgl_berangkat', 'asc')



      ->get();



    return $query->result();
  }

  public function sum_angkutan($tabel)
  {
    $query = $this->db->select_sum('kilometer_pp')
      ->from($tabel)
      // ->where($where)

      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_angkutan.id_supir_tangki')
      ->join('tb_tujuan', 'tb_tujuan.id_tujuan = tb_angkutan.id_tujuan')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = tb_angkutan.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      // ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')


      ->get();
    return $query->result();
  }


  public function hitung_kilo($tgl_awal, $tgl_akhir, $nopol)
  {
    // 
    $tgl_awal = $this->db->escape($tgl_awal);
    $tgl_akhir = $this->db->escape($tgl_akhir);
    $query = $this->db->select_sum('kilometer_pp')
      ->from('tb_angkutan')
      ->join('tb_supir_tangki', 'tb_supir_tangki.id_supir_tangki = tb_angkutan.id_supir_tangki')
      ->join('tb_tujuan', 'tb_tujuan.id_tujuan = tb_angkutan.id_tujuan')
      ->join('tb_tangki', 'tb_tangki.id_tangki = tb_supir_tangki.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      ->where('DATE (tgl_berangkat) BETWEEN ' . $tgl_awal . ' AND ' . $tgl_akhir)
      // ->where('tb_supir_tangki.id_tangki', $nopol)
      ->where_in('tb_tangki.nopol', $nopol)
      ->order_by('tgl_berangkat', 'asc')

      ->get();

    return $query->result();
  }



  public function sum_biaya_exp($tabel)
  {
    $query = $this->db->select_sum('perkiraan_biaya')
      ->from($tabel)
      ->get();
    return $query->result();
  }


  public function get_email($tabel)
  {
    $query = $this->db->select()
      ->from($tabel)
      // ->join('tb_tangki', 'tb_tangki.id_tangki = table_surat_tangki.id_tangki')
      ->join('tb_supir', 'tb_supir.id_supir = tb_supir_tangki.id_supir')
      // ->join('tb_sparepart', 'tb_sparepart.id_sparepart = tb_serv_genset.id_sparepart')

      ->get();
    return $query->result();
  }
}
