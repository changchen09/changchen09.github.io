<?php
echo password_hash('givemepassword', PASSWORD_DEFAULT, ['cost' => 13]);