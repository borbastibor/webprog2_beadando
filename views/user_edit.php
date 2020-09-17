<div>
    <div>Felhasználó</div>
    <table>
        <form id="user_edit_form">
            <input type="hidden">
            <tr>
                <th>Családnév</th>
                <td><input type="text" id="user_familyname"></td>
            <tr>
            <tr>
                <th>Utónév</th>
                <td><input type="text" id="user_firstname"></td>
            <tr>
            <tr>
                <th>Bejelentkezési név</th>
                <td><input type="text" id="user_login"></td>
            <tr>
            <tr>
                <th>Jelszó</th>
                <td><input type="text" id="user_password"></td>
            <tr>
            <tr>
                <th>Jogosultság</th>
                <td>
                    <select id="rights_list" name="rights_list">
                        <?php
                            // TODO combobox feltöltése
                        ?>
                    </select>
                </td>
            <tr>
        </form>
    </table>
</div>