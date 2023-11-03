<?php

require_once 'Functions.php';

$fun = new Functions();


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $data = json_decode(file_get_contents("php://input"));

  if(isset($data -> operation)){

  	$operation = $data -> operation;

  	if(!empty($operation)){

  		if($operation == 'register'){

  			if(isset($data -> user ) && !empty($data -> user) && isset($data -> user -> name) 
  				&& isset($data -> user -> email) && isset($data -> user -> password)){

  				$user = $data -> user;
  				$name = $user -> name;
  				$email = $user -> email;
  				$password = $user -> password;

          if ($fun -> isEmailValid($email)) {
            
            echo $fun -> registerUser($name, $email, $password);

          } else {

            echo $fun -> getMsgInvalidEmail();
          }

  			} else {

  				echo $fun -> getMsgInvalidParam();

  			}

  		}
      ///thêm hàng hóa

      if($operation == 'thongtinvn'){

  			if(isset($data -> user1 ) && !empty($data -> user1) && isset($data -> user1 -> MaHH) && isset($data -> user1 -> MaNcc) 
        && isset($data -> user1 -> TenLh) && isset($data -> user1 -> TenHh) && isset($data -> user1 -> GiaSp) && isset($data -> user1 -> Ghichu) && isset($data -> user1 -> Soluong) 
  				){

  				$user1 = $data -> user1;
  				$MaHH = $user1 -> MaHH;
          $MaNcc = $user1 -> MaNcc;
          $MaLh = $user1 -> TenLh;
          $TenHh = $user1 -> TenHh;
          $GiaSp = $user1 -> GiaSp;
          $Ghichu = $user1 -> Ghichu;
          $Soluong = $user1 -> Soluong;

  				

          
            echo $fun -> themnhanvien($MaHH, $MaNcc, $TenLh , $TenHh, $GiaSp, $Ghichu, $Soluong);

          } 
          else {

  				echo $fun -> getMsgInvalidParam();

  			}
      }
      else if ($operation == 'sua_thongtinvn') {
        if (
            isset($data->user1) && !empty($data->user1) &&
            isset($data->user1->manv) && isset($data->user1->tennv) &&
            isset($data->user1->sdt) && isset($data->user1->diachi)
        ) {
            $user1 = $data->user1;
            $manv = $user1->manv;
            $tennv = $user1->tennv;
            $sdt = $user1->sdt;
            $diachi = $user1->diachi;
    
            echo $fun->suanhanvien($manv, $tennv, $sdt, $diachi);
        } else {
            echo $fun->getMsgInvalidParam();
        }
    }

     if ($operation == 'xoa_thongtinvn') {
      if (isset($data->user1) && !empty($data->user1) && isset($data->user1->manv)) {
          $manv = $data->user1->manv;
          echo $fun->xoanhanvien($manv);
      } else {
          echo $fun->getMsgInvalidParam();
      }
  }
  else if ($operation == 'timnhanvien2') {

    if(isset($data -> user1) && !empty($data -> user1) &&isset($data -> user1 -> manv)){

      $user1 = $data -> user1;
      $manv = $user1 -> manv;

      echo $fun -> timnhavien1($manv);

    } else {

      echo $fun -> getMsgInvalidParam();

    }
  }
  //thêm nhân viên
      if($operation == 'themnhanvien'){

  			if(isset($data -> user ) && !empty($data -> user) && isset($data -> user -> MaNv) && isset($data -> user -> TenNv) 
        && isset($data -> user -> TenDn) && isset($data -> user -> Matkhau) && isset($data -> user -> Sdt) && isset($data -> user -> Diachi) && isset($data -> user -> Chucvu) 
  				){

  				$user = $data -> user;
  				$MaNv = $user -> MaNv;
          $TenNv = $user -> TenNv;
          $TenDn = $user -> TenDn;
          $Matkhau = $user -> Matkhau;
          $Sdt = $user -> Sdt;
          $Diachi = $user -> Diachi;
          $Chucvu = $user -> Chucvu;

  				

          
            echo $fun -> themnhanvien1($MaNv, $TenNv, $TenDn , $Matkhau, $Sdt, $Diachi, $Chucvu);

          } 
          else {

  				echo $fun -> getMsgInvalidParam();

  			}
      }
      ////
      else if ($operation == 'suanhanvien1') {
        if (
            isset($data->user) && !empty($data->user) &&
            isset($data->user->MaNv) && isset($data->user->TenNv) &&
            isset($data->user->TenDn) && isset($data->user->Matkhau)&& 
            isset($data->user->Sdt)&& isset($data->user->Diachi)&& 
            isset($data->user->Chucvu)
        ) {
            $user = $data->user;
            $MaNv = $user->MaNv;
            $TenNv = $user->TenNv;
            $TenDn = $user->TenDn;
            $Matkhau = $user->Matkhau;
            $Sdt = $user->Sdt;    
            $Diachi = $user->Diachi;
            $Chucvu = $user->Chucvu;
    
            echo $fun->suanhanvien1($MaNv, $TenNv, $TenDn, $Matkhau,$Sdt,$Diachi,$Chucvu);
        } else {
            echo $fun->getMsgInvalidParam();
        }
    }

     if ($operation == 'xoanhanvien') {
      if (isset($data->user) && !empty($data->user) && isset($data->user->MaNv)) {
          $MaNv = $data->user->MaNv;
          echo $fun->xoanhanvien($MaNv);
      } else {
          echo $fun->getMsgInvalidParam();
      }
  }
  else if ($operation == 'timnhanvien') {

    if(isset($data -> user) && !empty($data -> user) &&isset($data -> user -> MaNv)){

      $user = $data -> user;
      $MaNv = $user -> MaNv;

      echo $fun -> timnhavien1($MaNv);

    } else {

      echo $fun -> getMsgInvalidParam();

    }
  }
      //thêm đồ uống
      if($operation == 'themmenu'){

  			if(isset($data -> menu ) && !empty($data -> menu) && isset($data -> menu -> MaMn) && isset($data -> menu -> TenLh) 
        && isset($data -> menu -> Giatien)
  				){

  				$menu = $data -> menu;
  				$MaMn = $menu -> MaMn;
          $TenLh = $menu -> TenLh;
          $Giatien = $menu -> Giatien;
            echo $fun -> themmenu($MaMn, $TenLh, $Giatien);
          } 
          else {

  				echo $fun -> getMsgInvalidParam();

  			}
      }else if ($operation == 'suamenu') {
        if (
            isset($data->menu) && !empty($data->menu) &&
            isset($data->menu->MaMn) && isset($data->menu->TenLh) &&
            isset($data->menu->Giatien)
        ) {
            $menu = $data->menu;
            $MaMn = $menu->MaMn;
            $TenLh = $menu->TenLh;
            $Giatien = $menu->Giatien;
    
            echo $fun->suamenu($MaMn, $TenLh, $Giatien);
        } else {
            echo $fun->getMsgInvalidParam();
        }
    }

     if ($operation == 'xoamenu') {
      if (isset($data->menu) && !empty($data->menu) && isset($data->menu->MaMn)) {
          $MaMn = $data->menu->MaMn;
          echo $fun->xoamenu($MaMn);
      } else {
          echo $fun->getMsgInvalidParam();
      }
  }
  else if ($operation == 'timmenu') {

    if(isset($data -> menu) && !empty($data -> menu) &&isset($data -> menu -> MaMn)){

      $menu = $data -> menu;
      $MaMn = $menu -> MaMn;

      echo $fun -> timnmenu($MaMn);

    } else {

      echo $fun -> getMsgInvalidParam();

    }
  }

  if ($operation == 'login') {
    if (isset($data->user) && !empty($data->user) && isset($data->user->TenDn) && isset($data->user->Matkhau)) {
        $user = $data->user;
        $TenDn = $user->TenDn;
        $Matkhau = $user->Matkhau;

        echo $fun->loginUser($TenDn, $Matkhau);
    } else {
        echo $fun->getMsgInvalidParam();
    }
}

     
      if ($operation == 'doimatkhau') {

        if(isset($data -> user ) && !empty($data -> user) && isset($data -> user -> TenDn) && isset($data -> user -> passwordcu) 
          && isset($data -> user -> passwordmoi)){

          $user = $data -> user;
          $TenDn = $user -> TenDn;
          $passwordcu = $user -> passwordcu;
          $passwordmoi = $user -> passwordmoi;

          echo $fun -> changePassword($TenDn, $passwordcu, $passwordmoi);

        } else {

          echo $fun -> getMsgInvalidParam();

        }
      }else if ($operation == 'resPass') {

        if(isset($data -> user) && !empty($data -> user) && isset($data -> user -> email) && isset($data -> user -> password) 
          && isset($data -> user -> code)){

          $user = $data -> user;
          $email = $user -> email;
          $code = $user -> code;
          $password = $user -> password;
          
          echo $fun -> resetPassword($email,$code,$password);

        } else {

          echo $fun -> getMsgInvalidParam();

        }
      }

  	}else{

  		
  		echo $fun -> getMsgParamNotEmpty();

  	}
  } else {

  		echo $fun -> getMsgInvalidParam();

  }
} else if ($_SERVER['REQUEST_METHOD'] == 'GET'){


  echo "Learn2Crack Login API";

}

