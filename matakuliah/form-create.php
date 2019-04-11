<?php

include '../connect.php';

$query = "SELECT id, nama_dosen FROM dosen";
$result = mysqli_query($connect,$query);

?>
<h1>Tambah Data Matakuliah</h1>
<form action="create.php" method="POST">
        <table>
            <tr>
                <td><label>Kode</label></td>
                <td>:</td>
                <td><input type="text" name="kode"></td>
            </tr>
            <tr>
                <td><label>Matakuliah</label></td>
                <td>:</td>
                <td><input type="text" name="nama_matkul"></td>
            </tr>
            <tr>
                <td><label>SKS</label></td>
                <td>:</td>
                <td><input type="text" name="sks"></td>
            </tr>
            <tr>
                <td><label>Semester</label></td>
                <td>:</td>
                <td><input type="text" name="semester"></td>
            </tr>
            <tr>
            <td>Dosen</td>
            <td>:</td>
            <td>
            <select name ="id" id="nama_dosen">
            <option value ="NULL">--Pilih salah satu--</option>

            <?php 
                while ($data = mysqli_fetch_assoc($result)){
                    ?>
                    <option value ="<?php echo $data ['id']; ?>">
                    <?php echo $data['nama_dosen']; ?>
                    </option>
                    <?php
                }
                ?>
                </select>
            </td>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit">Simpan</td>
            </tr>          
        </tr>
        </table>
    </form>