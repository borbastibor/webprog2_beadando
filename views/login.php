<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4">
        <table class="w3-table">
            <tr>
                <td style="width:50%;">
                    <div class="w3-container w3-khaki w3-center"><h4>Bejelentkezés</h4></div>
                    <form id="loginForm">
                    <p>
                        <label>Felhasználónév:</label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" id="log_username" placeholder="felhasználónév..." required>
                    </p>
                    <p>
                        <label>Jelszó:</label>
                        <input class="w3-input w3-border" type="password" id="log_pswd" placeholder="jelszó..." required>
                    </p>
                    </form>
                    <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_login">Bejelentkezés</button>
                    <div id="login_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
                </td>
                <td style="width:50%;">
                    <div class="w3-container w3-khaki w3-center"><h4>Regisztráció</h4></div>
                    <form id="registrationForm">
                        <p>
                            <label>Családi név:</label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" id="reg_lastname" placeholder="családi név..." required>
                        </p>
                        <p>
                            <label>Keresztnév:</label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" id="reg_firstname" placeholder="keresztnév..." required>
                        </p>
                        <p>
                            <label>Felhasználónév:</label>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" id="reg_username" placeholder="felhasználónév..." required>
                        </p>
                        <p>
                            <label>Jelszó:</label>
                            <input class="w3-input w3-border" type="password" id="reg_pswd" placeholder="jelszó..." required>
                        </p>
                        <p>
                            <label>Jelszó megerősítés:</label>
                            <input class="w3-input w3-border" type="password" id="reg_pswd_reentry" placeholder="jelszó megerősítés..." required>
                        </p>
                    </form>
                    <button class="w3-button w3-block w3-green w3-section w3-padding" id="btn_register">Regisztráció</button>
                    <div id="register_message_label" class="w3-panel w3-pale-red w3-leftbar w3-rightbar w3-border-red" style="display:none;"></div>
                </td>
            </tr>
        </table>
        
    </div>
</div>