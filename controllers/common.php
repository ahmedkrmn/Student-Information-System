<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php
  function safeGet($name, $default = null){
    return (isset($_REQUEST[$name]))?$_REQUEST[$name]:$default;
  }
?>