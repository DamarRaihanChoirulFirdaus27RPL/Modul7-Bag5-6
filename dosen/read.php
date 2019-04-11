<?php

session_start();
if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}

include '../connect.php';

$query = "SELECT * FROM dosen";
$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>
<body>
    <form action="Search.php" method="get">
    <input type="search" name="cari" placeholder="Masukkan pencarian ... ">
    <input type="submit" value="Cari">
    </form>
    <table border='1'>
    <h2>Data Dosen</h2>
    <tr>
        <th>No.</th>
        <th>Nama Dosen</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php 
        if($num > 0)
        {
            $no = 1;
            while($data = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $data['nama_dosen'] . "</td>";
                echo "<td>" . $data['telp'] . "</td>";
                echo "<td><a href='form-update.php?id=" . $data['id'] ."'>Edit</a>";
                echo "<td><a href='delete.php?id=" . $data['id'] ."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Hapus</a></td>";
                echo "</tr>";
                $no++;
            }
        }
        else
        {
            echo "<td colspan='3'>Tidak ada data</td>";
        }
    ?>
    </table>
    <br>
    <a href="../login/logout.php"><button>Logout</button></a>