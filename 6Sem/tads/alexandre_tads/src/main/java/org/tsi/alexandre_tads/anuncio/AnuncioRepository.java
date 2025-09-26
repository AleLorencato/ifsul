package org.tsi.alexandre_tads.anuncio;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.UUID;

public interface AnuncioRepository extends JpaRepository<Anuncio, UUID> {
}
