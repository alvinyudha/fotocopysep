<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) { //jika belum masuk session maka kembali ke hal auth
        redirect('auth');
    } else { //jika sudah masuk session maka 
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1); //panggil ci ambil uri urutan pertama pada url setelah masuk session

        $queryMenu = $ci->db->get_where('tb_user_menu', ['menu' => $menu])->row_array();
        @$menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('tb_user_accessmenu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 0) {
            redirect('auth/blocked');
        }
    }
}
function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $result = $ci->db->get_where('tb_user_accessmenu', [
        'role_id' => $role_id,
        'menu_id' => $menu_id
    ]);

    if ($result->num_rows() > 0) { //jika result barisnya lebih besar dari 0 maka access menu akan di check list
        return "checked='checked'";
    }
}
