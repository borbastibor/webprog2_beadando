<div class="w3-container w3-padding-large">
    <div class="w3-container w3-card-4" style="padding:0%;">
        <div class="w3-container w3-khaki w3-center">
            <h6>Játék</h6>    
        </div>
        <div style="padding:20px;">
            <canvas id="gameCanvas" disabled></canvas>
            <label for="gravity" id="labelgrav">Gravitáció erőssége:</label>
            <input type="number" id="gravity" size="5"  min="0" max="1" step="0.1" value="0.6">
            <label for="ballnumber" id="labelballs">Labdák száma:</label>
            <input type="number" id="ballnumber" size="5" min="1" max="50" step="1" value="1">
            <label for="ballsize" id="labelsize">Labdák mérete:</label>
            <input type="number" id="ballsize" size="5" min="1" max="50" step="1" value="20">
            <button id="btn">Indítás</button>
        </div>
    </div>
</div>