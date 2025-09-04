package org.tsi.alexandre_tads.repository;
import org.springframework.data.jpa.repository.JpaRepository;
import org.tsi.alexandre_tads.model.Anuncio;
import java.util.UUID;

public interface AnuncioRepository extends JpaRepository<Anuncio, UUID> {
}
