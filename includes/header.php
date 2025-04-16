<div class="topnav"> 
    <a class="active" href="index.php">Home</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Admin</a>
    <a href="dbcalls/winkelwagen.php">🛒 Winkelwagen</a>

    <!-- Zoekformulier naast de navigatie -->
    <form class="search-form" action="search.php" method="GET">
        <input type="text" name="query" placeholder="Zoek gerechten..." required>
        <button type="submit">Zoeken</button>
    </form>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #EDE8D0;
        font-family: Arial, sans-serif;
    }

    /* Navigatiebalk */
    .topnav {
        display: flex;
        justify-content: space-between; /* Verspreid de items */
        align-items: center;
        background-color: #333;
        padding: 10px 20px;
    }

    .topnav a {
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #4CAF50;
    }

    /* Zoekformulier naast de navigatie */
    .search-form {
        display: flex;
        align-items: center;
    }

    .search-form input[type="text"] {
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 250px;
        max-width: 100%;
        margin-right: 10px;
    }

    .search-form button {
        padding: 8px 16px;
        font-size: 14px;
        border: none;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .search-form button:hover {
        background-color: #45a049;
    }

    /* Zoekbeschrijving onder het zoekformulier */
    .search-description {
        text-align: center;
        font-size: 16px;
        margin-top: 10px;
        color: #333;
    }

    /* Winkelwagen info */
    .cart-info {
        text-align: center;
        margin-top: 20px;
        font-size: 18px;
    }

    /* Soep kaarten */
    .soep-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 0 5%;
        gap: 20px;
    }

    .menu-item-box {
        display: flex;
        align-items: center;
        width: 45%;
        margin-bottom: 40px;
        background-color: white;
        border: 2px solid black;
        border-radius: 10px;
        padding: 20px;
        text-align: left;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .menu-item-box img {
        width: 150px;
        height: auto;
        margin-right: 20px;
    }

    .menu-item-box h2,
    .menu-item-box p {
        margin: 0;
        padding: 0;
    }

    .menu-item-box button {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        color: #4CAF50;
        font-size: 16px;
        font-weight: bold;
    }

    /* Mobile responsiveness */
    @media screen and (max-width: 600px) {
        .topnav {
            flex-direction: column;
            align-items: flex-start;
            padding: 10px;
        }

        .search-form {
            width: 100%;
            margin-top: 10px;
        }

        .search-form input[type="text"] {
            width: 100%;
            margin-bottom: 10px;
        }

        .menu-item-box {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .menu-item-box img {
            margin-bottom: 10px;
        }
    }
</style>
