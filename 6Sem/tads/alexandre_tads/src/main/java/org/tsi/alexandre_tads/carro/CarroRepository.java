package org.tsi.alexandre_tads.carro;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.UUID;

public interface CarroRepository extends JpaRepository<Carro, UUID> {
}
