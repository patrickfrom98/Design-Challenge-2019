<?php
session_start();

echo "<footer><div class='wrapper'><div class='box ";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "Admin") {
        echo "col-4-1fr";
    } else {
        echo "col-3-1fr";
    }
}

echo "'>
      <div class='footer-column'>
          <h1>Footer Section 1</h1>
          <br>
          <ul>
              <li><a href='#'>Link 1</a></li>
              <li><a href='#'>Link 2</a></li>
              <li><a href='#'>Link 3</a></li>
              <li><a href='#'>Link 4</a></li>
          </ul>
      </div>
      <div class='footer-column'>
          <h1>Footer Section 2</h1>
          <br>
          <ul>
              <li><a href='#'>Link 1</a></li>
              <li><a href='#'>Link 2</a></li>
              <li><a href='#'>Link 3</a></li>
              <li><a href='#'>Link 4</a></li>
          </ul>
      </div>
      <div class='footer-column'>
          <h1>Footer Section 3</h1>
          <br>
          <ul>
              <li><a href='#'>Link 1</a></li>
              <li><a href='#'>Link 2</a></li>
              <li><a href='#'>Link 3</a></li>
              <li><a href='#'>Link 4</a></li>
          </ul>
      </div>";

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == "Admin") {
        echo "<div class='footer-column'>
                  <h1>Admin Settings</h1>
                  <br>
                  <ul>
                      <li><a href='#'>Change Passwords</a></li>
                      <li><a href='#'>Change Themes</a></li>
                      <li><a href='#'>Chage User Accounts</a></li>
                      <li><a href='#'>Add User</a></li>
                  </ul></div>";
    }
}

echo "</div></div></footer>";
