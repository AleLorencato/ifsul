package org.tsi.alexandre_tads.anuncio;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

import java.util.UUID;

@RepositoryRestResource(exported = false)
public interface AnuncioRepository extends JpaRepository<Anuncio, UUID> {
}
