<!DOCTYPE html>
<html lang="al">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="assets/stylesform.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'component/header.php'; ?>
    <form action="submit.php" method="POST" class="post-form">
        <p class="form-title">Rrefe ose shkruaji dikujt anonim</p>
        

        <input 
            type="text" 
            name="from" 
            class="input-field" 
            placeholder="Nga: Emrin tend"
            required
        >
        
        <input 
            type="text" 
            name="to" 
            class="input-field" 
            placeholder="Per: Emri marresit"
            required
        >

        <select name="city" class="input-field" required>
    <option value="">Qyteti</option>
    <option value="Planeti Toke">Planeti Toke</option>
    <option value="Tirana">Tirana</option>
    <option value="Durrës">Durrës</option>
    <option value="Vlorë">Vlorë</option>
    <option value="Shkodër">Shkodër</option>
    <option value="Fier">Fier</option>
    <option value="Elbasan">Elbasan</option>
    <option value="Korçë">Korçë</option>
    <option value="Lezhë">Lezhë</option>
    <option value="Përmet">Përmet</option>
    <option value="Berat">Berat</option>
    <option value="Kavajë">Kavajë</option>
    <option value="Kamëz">Kamëz</option>
    <option value="Sarandë">Sarandë</option>
    <option value="Gjirokastër">Gjirokastër</option>
    <option value="Rrëshen">Rrëshen</option>
    <option value="Mati">Mati</option>
    <option value="Pogradec">Pogradec</option>
    <option value="Vau i Dejës">Vau i Dejës</option>
    <option value="Bulqizë">Bulqizë</option>
    <option value="Cakran">Cakran</option>
    <option value="Krujë">Krujë</option>
    <option value="Tropojë">Tropojë</option>
    <option value="Shijak">Shijak</option>
    <option value="Kukës">Kukës</option>
    <option value="Himarë">Himarë</option>
    <option value="Peja">Peja</option>
    <option value="Mitrovica">Mitrovica</option>
    <option value="Gjakova">Gjakova</option>
    <option value="Ferizaj">Ferizaj</option>
    <option value="Prizren">Prizren</option>
    <option value="Gjilan">Gjilan</option>
    <option value="Vushtrri">Vushtrri</option>
    <option value="Rahovec">Rahovec</option>
    <option value="Kamenica">Kamenica</option>
    <option value="Shtime">Shtime</option>
    <option value="Fushë Kosovë">Fushë Kosovë</option>
    <option value="Istog">Istog</option>
    <option value="Zubin Potok">Zubin Potok</option>
    <option value="Klina">Klina</option>
    <option value="Novobërdë">Novobërdë</option>
    <option value="Gracanica">Gracanica</option>
    <option value="Lipjan">Lipjan</option>
    <option value="Malishevë">Malishevë</option>
    <option value="Podujevë">Podujevë</option>
    <option value="Deçan">Deçan</option>
    <option value="Obiliq">Obiliq</option>
</select>

        
        <textarea 
            name="message" 
            class="text-area" 
            placeholder="Teksti"
            required
        ></textarea>

        <button type="submit" class="submit-button">Publiko</button>
    </form>
</body>
</html>
