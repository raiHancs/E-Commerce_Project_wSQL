<?php
    session_start();
    session_destroy();
    header("Location:adminSign-in.html");
