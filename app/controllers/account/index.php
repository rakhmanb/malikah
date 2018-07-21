<?php

  function _index()
  {
    if(isset($_SESSION["Username"]))
    {
      //$data['body'][]=View::do_fetch(VIEW_PATH.'account/index.php');
      //View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
      header("Location: http://localhost:5000/Manage/Index");
    }
    else
    {
      postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'account');
    }
  }

 ?>
