<div class="flex-grow-1 ">
    <div class="container mt-5 mb-5 bg-light">
        <div class="text-center p-3">
            <h2>Pokedex</h2>
        </div>
        <?php

        echo '<div class="row">';


        foreach ($data['pokedex'] as $pokemon) {
            echo '
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 shadow-sm bg-light">
                            <!-- Imagen principal del Pokémon -->
                            <img src="./imagenes/' . htmlspecialchars($pokemon["imagen"]) . '.png" class="card-img-top img-fluid" style="height: 200px; object-fit: contain;" alt="' . htmlspecialchars($pokemon["nombre"]) . '">
                            
                            <div class="card-body d-flex flex-column">
                                <!-- Información del Pokémon -->
                                <h5 class="card-title">' . htmlspecialchars($pokemon["nombre"]) . '</h5>
                                <p class="card-text">' . htmlspecialchars($pokemon["pokemon_descripcion"]) . '</p>
                                
                                <!-- Imagen del tipo del Pokémon -->
                                <img src="./imagenes/' . htmlspecialchars($pokemon["tipo_descripcion"]) . '.png" class="img-fluid mt-auto" style="height: 50px; width: 50px; object-fit: contain;" alt="' . htmlspecialchars($pokemon["tipo_descripcion"]) . '">
                            </div>
                        </div>
                    </div>';
        }

        echo '</div>'; // Cierra la fila

        ?>

    </div>
</div>